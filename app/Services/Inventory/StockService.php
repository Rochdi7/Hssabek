<?php

namespace App\Services\Inventory;

use App\Models\Catalog\Product;
use App\Models\Inventory\ProductStock;
use App\Models\Inventory\StockMovement;
use App\Models\Inventory\StockTransfer;
use App\Models\Inventory\StockTransferItem;
use App\Models\Inventory\Warehouse;
use Illuminate\Support\Facades\DB;

class StockService
{
    /**
     * Adjust stock for a product in a warehouse.
     * movement_type must match the enum in the migration.
     * Creates a StockMovement record for every change.
     */
    public function adjust(
        string  $productId,
        float   $quantity,
        string  $movementType,
        string  $note = '',
        ?string $warehouseId = null,
        ?string $referenceType = null,
        ?string $referenceId = null,
    ): ProductStock {
        return DB::transaction(function () use ($productId, $quantity, $movementType, $note, $warehouseId, $referenceType, $referenceId) {

            $warehouse = $warehouseId
                ? Warehouse::findOrFail($warehouseId)
                : Warehouse::where('is_default', true)->firstOrFail();

            $stock = ProductStock::lockForUpdate()->firstOrCreate(
                ['product_id' => $productId, 'warehouse_id' => $warehouse->id],
                ['quantity_on_hand' => 0, 'quantity_reserved' => 0, 'reorder_point' => null, 'reorder_quantity' => null]
            );

            $product = Product::findOrFail($productId);

            // Determine delta based on movement type
            $isOutgoing = in_array($movementType, ['stock_out', 'adjustment_out', 'transfer_out', 'return_out', 'sale_out', 'reserve']);
            $delta = $isOutgoing ? -abs($quantity) : abs($quantity);

            // Over-sell prevention — never allow negative stock in any warehouse
            if ($isOutgoing && $stock->quantity_on_hand < abs($quantity)) {
                throw new \DomainException(
                    "Stock insuffisant pour \"{$product->name}\". "
                    . "Disponible: {$stock->quantity_on_hand}, Demandé: " . abs($quantity)
                );
            }

            $stock->increment('quantity_on_hand', $delta);

            // Sync the product's quantity column with total across all warehouses
            $product->update([
                'quantity' => ProductStock::where('product_id', $productId)->sum('quantity_on_hand'),
            ]);

            StockMovement::create([
                'product_id'     => $productId,
                'warehouse_id'   => $warehouse->id,
                'movement_type'  => $movementType,
                'quantity'       => abs($quantity),
                'reference_type' => $referenceType,
                'reference_id'   => $referenceId,
                'note'           => $note,
                'moved_at'       => now(),
                'created_by'     => auth()->id(),
            ]);

            return $stock->fresh();
        });
    }

    /**
     * Execute a stock transfer between two warehouses.
     * Deducts from source, adds to destination, atomically.
     */
    public function transfer(StockTransfer $transfer): void
    {
        DB::transaction(function () use ($transfer) {
            foreach ($transfer->items as $item) {
                // Deduct from source
                $this->adjust(
                    $item->product_id,
                    (float) $item->quantity,
                    'transfer_out',
                    "Transfert #{$transfer->number}",
                    $transfer->from_warehouse_id,
                    StockTransfer::class,
                    $transfer->id,
                );

                // Add to destination
                $this->adjust(
                    $item->product_id,
                    (float) $item->quantity,
                    'transfer_in',
                    "Transfert #{$transfer->number}",
                    $transfer->to_warehouse_id,
                    StockTransfer::class,
                    $transfer->id,
                );
            }

            $transfer->update([
                'status'      => 'received',
                'shipped_at'  => $transfer->shipped_at ?? now(),
                'received_at' => now(),
            ]);
        });
    }
}
