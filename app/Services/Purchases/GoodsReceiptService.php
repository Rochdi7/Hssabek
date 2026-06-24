<?php

namespace App\Services\Purchases;

use App\Models\Inventory\StockMovement;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\GoodsReceiptItem;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\PurchaseOrderItem;
use App\Services\Inventory\StockService;
use App\Services\System\DocumentNumberService;
use Illuminate\Support\Facades\DB;

class GoodsReceiptService
{
    public function __construct(
        private readonly DocumentNumberService $docService,
        private readonly StockService $stockService,
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

            $this->syncItems($receipt, $items);

            return $receipt->load('items');
        });
    }

    public function update(GoodsReceipt $receipt, array $validated): GoodsReceipt
    {
        if ($receipt->status !== 'draft') {
            throw new \LogicException('Seules les réceptions en brouillon peuvent être modifiées.');
        }

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
            $this->syncItems($receipt, $items);

            return $receipt->fresh('items');
        });
    }

    /**
     * Persist receipt lines, resolving each line back to its PO item (when the
     * receipt is linked to a PO) so received-quantity tracking works on confirm.
     */
    private function syncItems(GoodsReceipt $receipt, array $items): void
    {
        $poItemsByProduct = collect();
        if ($receipt->purchase_order_id) {
            $poItemsByProduct = PurchaseOrderItem::where('purchase_order_id', $receipt->purchase_order_id)
                ->get()
                ->keyBy('product_id');
        }

        foreach ($items as $i => $item) {
            $poItemId = $item['purchase_order_item_id']
                ?? optional($poItemsByProduct->get($item['product_id']))->id;

            $unitCost  = (float) ($item['unit_cost'] ?? 0);
            $quantity  = (float) $item['quantity'];
            $taxRate   = (float) ($item['tax_rate'] ?? 0);
            $lineTotal = round($quantity * $unitCost * (1 + $taxRate / 100), 2);

            GoodsReceiptItem::create([
                'goods_receipt_id'       => $receipt->id,
                'purchase_order_item_id' => $poItemId,
                'product_id'             => $item['product_id'],
                'quantity'               => $quantity,
                'unit_cost'              => $unitCost,
                'tax_rate'               => $taxRate,
                'tax_group_id'           => $item['tax_group_id'] ?? null,
                'line_total'             => $lineTotal,
                'position'               => $i,
            ]);
        }
    }

    /**
     * Confirm a draft goods receipt: move stock, create movements, update PO status.
     * Idempotent — a receipt that is already 'received' is returned untouched, and
     * a per-line movement guard prevents double stock additions.
     */
    public function confirm(GoodsReceipt $receipt): GoodsReceipt
    {
        if ($receipt->status === 'received') {
            return $receipt->fresh('items');
        }

        if ($receipt->status !== 'draft') {
            throw new \LogicException('Seules les réceptions en brouillon peuvent être confirmées.');
        }

        return DB::transaction(function () use ($receipt) {
            $receipt->load('items');

            foreach ($receipt->items as $item) {
                // Guard against double stock additions if confirm runs twice.
                $alreadyMoved = StockMovement::where('reference_type', GoodsReceipt::class)
                    ->where('reference_id', $receipt->id)
                    ->where('product_id', $item->product_id)
                    ->where('movement_type', 'purchase_in')
                    ->exists();

                if ($alreadyMoved) {
                    continue;
                }

                // Single source of truth for stock: locks the row, syncs the
                // product's total quantity, and writes the StockMovement.
                $this->stockService->adjust(
                    $item->product_id,
                    (float) $item->quantity,
                    'purchase_in',
                    'Réception confirmée : ' . $receipt->number,
                    $receipt->warehouse_id,
                    GoodsReceipt::class,
                    $receipt->id,
                );

                if ($item->purchase_order_item_id) {
                    $poItem = PurchaseOrderItem::find($item->purchase_order_item_id);
                    if ($poItem) {
                        $poItem->increment('received_quantity', $item->quantity);
                    }
                }
            }

            // Auto-derive PO status from quantities — never set manually.
            if ($receipt->purchase_order_id) {
                $po = PurchaseOrder::with('items')->find($receipt->purchase_order_id);
                $po?->recalculateStatus();
            }

            $receipt->update(['status' => 'received']);

            return $receipt->fresh('items');
        });
    }
}
