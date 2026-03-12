<?php

namespace App\Services\Purchases;

use App\Models\Inventory\Warehouse;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\GoodsReceiptItem;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\PurchaseOrderItem;
use App\Services\Sales\TaxCalculationService;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class PurchaseOrderService
{
    public function __construct(
        private readonly TaxCalculationService $taxService,
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): PurchaseOrder
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];

            // Map unit_cost → unit_price for TaxCalculationService compatibility
            $mappedItems = array_map(fn($item) => array_merge($item, [
                'unit_price' => $item['unit_cost'],
            ]), $items);

            $totals = $this->taxService->calculateDocument($mappedItems);

            $warehouseId = $validated['warehouse_id']
                ?? Warehouse::where('is_default', true)->value('id')
                ?? Warehouse::where('is_active', true)->value('id');

            $po = PurchaseOrder::create([
                'supplier_id'    => $validated['supplier_id'],
                'warehouse_id'   => $warehouseId,
                'number'         => $this->docService->next('purchase_order'),
                'order_date'     => $validated['order_date'],
                'expected_date'  => $validated['expected_date'] ?? null,
                'status'         => 'draft',
                'subtotal'       => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total'      => $totals['tax_total'],
                'total'          => $totals['total'],
                'notes'          => $validated['notes'] ?? null,
                'terms'          => $validated['terms'] ?? null,
            ]);

            foreach ($totals['calculated_items'] as $item) {
                PurchaseOrderItem::create([
                    'purchase_order_id' => $po->id,
                    'product_id'       => $item['product_id'] ?? null,
                    'label'            => $item['label'],
                    'description'      => $item['description'] ?? null,
                    'quantity'         => $item['quantity'],
                    'unit_cost'        => $item['unit_cost'],
                    'discount_type'    => $item['discount_type'] ?? 'none',
                    'discount_value'   => $item['discount_value'],
                    'tax_rate'         => $item['tax_rate'],
                    'tax_group_id'     => $item['tax_group_id'] ?? null,
                    'line_subtotal'    => $item['line_subtotal'],
                    'line_tax'         => $item['line_tax'],
                    'line_total'       => $item['line_total'],
                    'position'         => $item['position'],
                ]);
            }

            return $po->load('items');
        });
    }

    public function update(PurchaseOrder $po, array $validated): PurchaseOrder
    {
        if ($po->status !== 'draft') {
            throw new \DomainException('Seuls les bons de commande en brouillon peuvent être modifiés.');
        }

        return DB::transaction(function () use ($po, $validated) {
            $items = $validated['items'] ?? [];

            $mappedItems = array_map(fn($item) => array_merge($item, [
                'unit_price' => $item['unit_cost'],
            ]), $items);

            $totals = $this->taxService->calculateDocument($mappedItems);

            $po->items()->delete();

            foreach ($totals['calculated_items'] as $item) {
                PurchaseOrderItem::create([
                    'purchase_order_id' => $po->id,
                    'product_id'       => $item['product_id'] ?? null,
                    'label'            => $item['label'],
                    'description'      => $item['description'] ?? null,
                    'quantity'         => $item['quantity'],
                    'unit_cost'        => $item['unit_cost'],
                    'discount_type'    => $item['discount_type'] ?? 'none',
                    'discount_value'   => $item['discount_value'],
                    'tax_rate'         => $item['tax_rate'],
                    'tax_group_id'     => $item['tax_group_id'] ?? null,
                    'line_subtotal'    => $item['line_subtotal'],
                    'line_tax'         => $item['line_tax'],
                    'line_total'       => $item['line_total'],
                    'position'         => $item['position'],
                ]);
            }

            $po->update([
                'supplier_id'    => $validated['supplier_id'],
                'warehouse_id'   => $validated['warehouse_id'] ?? $po->warehouse_id,
                'order_date'     => $validated['order_date'],
                'expected_date'  => $validated['expected_date'] ?? null,
                'subtotal'       => $totals['subtotal'],
                'discount_total' => $totals['discount_total'],
                'tax_total'      => $totals['tax_total'],
                'total'          => $totals['total'],
                'notes'          => $validated['notes'] ?? null,
                'terms'          => $validated['terms'] ?? null,
            ]);

            return $po->fresh('items');
        });
    }

    public function transition(PurchaseOrder $po, string $newStatus): void
    {
        $allowed = [
            'draft'              => ['sent', 'confirmed', 'cancelled'],
            'sent'               => ['confirmed', 'cancelled'],
            'confirmed'          => ['partially_received', 'received', 'cancelled'],
            'partially_received' => ['received'],
            'received'           => [],
            'cancelled'          => [],
        ];

        $permitted = $allowed[$po->status] ?? [];
        if (!in_array($newStatus, $permitted)) {
            throw new \DomainException(
                "Transition de statut invalide : {$po->status} → {$newStatus}"
            );
        }

        $po->update(['status' => $newStatus]);
    }

    public function receive(PurchaseOrder $po): GoodsReceipt
    {
        return DB::transaction(function () use ($po) {
            $receipt = GoodsReceipt::create([
                'purchase_order_id' => $po->id,
                'warehouse_id'      => $po->warehouse_id,
                'number'            => $this->docService->next('goods_receipt'),
                'status'            => 'received',
                'received_at'       => now(),
                'created_by'        => auth()->id(),
            ]);

            foreach ($po->items as $item) {
                $qtyToReceive = $item->quantity - $item->received_quantity;
                if ($qtyToReceive <= 0) {
                    continue;
                }

                GoodsReceiptItem::create([
                    'goods_receipt_id'       => $receipt->id,
                    'purchase_order_item_id' => $item->id,
                    'product_id'             => $item->product_id,
                    'quantity'               => $qtyToReceive,
                    'unit_cost'              => $item->unit_cost,
                    'tax_rate'               => $item->tax_rate,
                    'tax_group_id'           => $item->tax_group_id,
                    'line_total'             => $item->line_total,
                ]);

                $item->update(['received_quantity' => $item->quantity]);
            }

            $po->update(['status' => 'received']);

            return $receipt;
        });
    }
}
