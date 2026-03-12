<?php

namespace App\Services\Purchases;

use App\Models\Inventory\ProductStock;
use App\Models\Inventory\StockMovement;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\GoodsReceiptItem;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\PurchaseOrderItem;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class GoodsReceiptService
{
    public function __construct(
        private readonly DocumentNumberService $docService,
    ) {}

    public function create(array $validated): GoodsReceipt
    {
        return DB::transaction(function () use ($validated) {
            $items = $validated['items'] ?? [];

            $receipt = GoodsReceipt::create([
                'purchase_order_id' => $validated['purchase_order_id'] ?? null,
                'warehouse_id' => $validated['warehouse_id'],
                'number' => $this->docService->next('goods_receipt'),
                'status' => 'draft',
                'received_at' => $validated['received_at'] ?? now(),
                'reference_number' => $validated['reference_number'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'created_by' => auth()->id(),
            ]);

            foreach ($items as $i => $item) {
                GoodsReceiptItem::create([
                    'goods_receipt_id' => $receipt->id,
                    'product_id'       => $item['product_id'],
                    'quantity'         => $item['quantity'],
                    'unit_cost'        => $item['unit_cost'] ?? 0,
                    'tax_rate'         => $item['tax_rate'] ?? 0,
                    'tax_group_id'     => $item['tax_group_id'] ?? null,
                    'line_total'       => $item['line_total'] ?? 0,
                    'position'         => $i,
                ]);
            }

            return $receipt->load('items');
        });
    }

    public function update(GoodsReceipt $receipt, array $validated): GoodsReceipt
    {
        return DB::transaction(function () use ($receipt, $validated) {
            $items = $validated['items'] ?? [];

            $receipt->update([
                'purchase_order_id' => $validated['purchase_order_id'] ?? $receipt->purchase_order_id,
                'warehouse_id' => $validated['warehouse_id'] ?? $receipt->warehouse_id,
                'received_at' => $validated['received_at'] ?? $receipt->received_at,
                'reference_number' => $validated['reference_number'] ?? $receipt->reference_number,
                'notes' => $validated['notes'] ?? $receipt->notes,
            ]);

            $receipt->items()->delete();
            foreach ($items as $i => $item) {
                GoodsReceiptItem::create([
                    'goods_receipt_id' => $receipt->id,
                    'product_id'       => $item['product_id'],
                    'quantity'         => $item['quantity'],
                    'unit_cost'        => $item['unit_cost'] ?? 0,
                    'tax_rate'         => $item['tax_rate'] ?? 0,
                    'tax_group_id'     => $item['tax_group_id'] ?? null,
                    'line_total'       => $item['line_total'] ?? 0,
                    'position'         => $i,
                ]);
            }

            return $receipt->fresh('items');
        });
    }

    /**
     * Confirm a draft goods receipt: update stock, create movements, update PO status.
     */
    public function confirm(GoodsReceipt $receipt): GoodsReceipt
    {
        if ($receipt->status !== 'draft') {
            throw new \LogicException('Seules les réceptions en brouillon peuvent être confirmées.');
        }

        return DB::transaction(function () use ($receipt) {
            $receipt->load('items');

            foreach ($receipt->items as $item) {
                // Increment product stock in the warehouse
                $stock = ProductStock::firstOrNew([
                    'tenant_id'    => $receipt->tenant_id,
                    'warehouse_id' => $receipt->warehouse_id,
                    'product_id'   => $item->product_id,
                ]);
                $stock->quantity_on_hand = ($stock->quantity_on_hand ?? 0) + $item->quantity;
                $stock->save();

                // Create stock movement (audit trail)
                StockMovement::create([
                    'warehouse_id'   => $receipt->warehouse_id,
                    'product_id'     => $item->product_id,
                    'movement_type'  => 'purchase_in',
                    'quantity'       => $item->quantity,
                    'unit_cost'      => $item->unit_cost,
                    'reference_type' => GoodsReceipt::class,
                    'reference_id'   => $receipt->id,
                    'note'           => 'Réception confirmée : ' . $receipt->number,
                    'moved_at'       => $receipt->received_at ?? now(),
                    'created_by'     => auth()->id(),
                ]);

                // Update PO item received_quantity if linked
                if ($item->purchase_order_item_id) {
                    $poItem = PurchaseOrderItem::find($item->purchase_order_item_id);
                    if ($poItem) {
                        $poItem->increment('received_quantity', $item->quantity);
                    }
                }
            }

            // Update purchase order status if linked
            if ($receipt->purchase_order_id) {
                $this->updatePurchaseOrderStatus($receipt->purchase_order_id);
            }

            // Mark receipt as received
            $receipt->update(['status' => 'received']);

            return $receipt->fresh('items');
        });
    }

    private function updatePurchaseOrderStatus(string $purchaseOrderId): void
    {
        $po = PurchaseOrder::with('items')->find($purchaseOrderId);
        if (!$po || $po->items->isEmpty()) {
            return;
        }

        $allReceived = true;
        $anyReceived = false;

        foreach ($po->items as $poItem) {
            if ($poItem->received_quantity >= $poItem->quantity) {
                $anyReceived = true;
            } else {
                $allReceived = false;
                if ($poItem->received_quantity > 0) {
                    $anyReceived = true;
                }
            }
        }

        if ($allReceived) {
            $po->update(['status' => 'received']);
        } elseif ($anyReceived) {
            $po->update(['status' => 'partially_received']);
        }
    }
}
