<?php

namespace App\Services\Purchases;

use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\GoodsReceiptItem;
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
                'status' => 'received',
                'received_at' => $validated['received_at'] ?? now(),
                'reference_number' => $validated['reference_number'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'created_by' => auth()->id(),
            ]);

            foreach ($items as $i => $item) {
                GoodsReceiptItem::create([
                    'goods_receipt_id' => $receipt->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'position' => $i,
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
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'position' => $i,
                ]);
            }

            return $receipt->fresh('items');
        });
    }
}
