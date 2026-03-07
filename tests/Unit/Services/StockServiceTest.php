<?php

namespace Tests\Unit\Services;

use App\Models\Catalog\Product;
use App\Models\Inventory\StockMovement;
use App\Models\Inventory\StockTransfer;
use App\Models\Inventory\StockTransferItem;
use App\Models\Inventory\Warehouse;
use App\Services\Inventory\StockService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StockServiceTest extends TestCase
{
    use RefreshDatabase;

    private StockService $service;
    private Warehouse $warehouse;
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        $this->warehouse = Warehouse::create([
            'name' => 'Main Warehouse',
            'code' => 'WH-MAIN',
            'is_default' => true,
            'is_active' => true,
        ]);

        $this->product = Product::create([
            'item_type' => 'product',
            'name' => 'Test Product',
            'code' => 'TST-001',
            'slug' => 'test-product',
            'selling_price' => 100,
            'purchase_price' => 50,
            'track_inventory' => true,
            'quantity' => 0,
            'is_active' => true,
        ]);

        $this->service = new StockService();
    }

    public function test_stock_in_increases_quantity(): void
    {
        $stock = $this->service->adjust(
            $this->product->id,
            10,
            'stock_in',
            'Initial stock',
            $this->warehouse->id,
        );

        $this->assertEquals(10, (float) $stock->quantity_on_hand);
    }

    public function test_stock_out_decreases_quantity(): void
    {
        // First add stock
        $this->service->adjust($this->product->id, 20, 'stock_in', '', $this->warehouse->id);

        // Then remove stock
        $stock = $this->service->adjust($this->product->id, 5, 'stock_out', '', $this->warehouse->id);

        $this->assertEquals(15, (float) $stock->quantity_on_hand);
    }

    public function test_insufficient_stock_throws_exception(): void
    {
        // Add only 3 units
        $this->service->adjust($this->product->id, 3, 'stock_in', '', $this->warehouse->id);

        $this->expectException(\DomainException::class);

        // Try to remove 10 units
        $this->service->adjust($this->product->id, 10, 'stock_out', '', $this->warehouse->id);
    }

    public function test_transfer_between_warehouses(): void
    {
        $warehouseB = Warehouse::create([
            'name' => 'Secondary',
            'code' => 'WH-SEC',
            'is_default' => false,
            'is_active' => true,
        ]);

        // Add stock to source warehouse
        $this->service->adjust($this->product->id, 50, 'stock_in', '', $this->warehouse->id);

        // Create transfer
        $transfer = StockTransfer::create([
            'from_warehouse_id' => $this->warehouse->id,
            'to_warehouse_id' => $warehouseB->id,
            'number' => 'TRF-001',
            'status' => 'draft',
        ]);

        StockTransferItem::create([
            'stock_transfer_id' => $transfer->id,
            'product_id' => $this->product->id,
            'quantity' => 20,
        ]);

        $transfer->load('items');

        $this->service->transfer($transfer);

        // Check source warehouse
        $sourceStock = \App\Models\Inventory\ProductStock::where('product_id', $this->product->id)
            ->where('warehouse_id', $this->warehouse->id)
            ->first();

        $this->assertEquals(30, (float) $sourceStock->quantity_on_hand);

        // Check destination warehouse
        $destStock = \App\Models\Inventory\ProductStock::where('product_id', $this->product->id)
            ->where('warehouse_id', $warehouseB->id)
            ->first();

        $this->assertEquals(20, (float) $destStock->quantity_on_hand);
    }

    public function test_stock_movement_creates_audit_record(): void
    {
        $this->service->adjust(
            $this->product->id,
            15,
            'stock_in',
            'Restocking',
            $this->warehouse->id,
        );

        $movement = StockMovement::where('product_id', $this->product->id)->first();

        $this->assertNotNull($movement);
        $this->assertEquals('stock_in', $movement->movement_type);
        $this->assertEquals(15, (float) $movement->quantity);
        $this->assertEquals($this->warehouse->id, $movement->warehouse_id);
    }
}
