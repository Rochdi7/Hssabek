<?php

namespace Tests\Feature\Purchases;

use App\Models\Inventory\ProductStock;
use App\Models\Inventory\StockMovement;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\PurchaseOrder;
use App\Services\Purchases\GoodsReceiptService;
use App\Services\Purchases\PurchaseOrderService;
use Database\Factories\ProductFactory;
use Database\Factories\PurchaseOrderFactory;
use Database\Factories\PurchaseOrderItemFactory;
use Database\Factories\SupplierFactory;
use Database\Factories\WarehouseFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoodsReceiptStockTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
        $this->actingAs($this->adminUser);
    }

    /** Build a PO with a single line of $ordered units of one product. */
    private function makePo(float $ordered = 1000, float $received = 0): array
    {
        $supplier = SupplierFactory::new()->create(['tenant_id' => $this->tenant->id]);
        $warehouse = WarehouseFactory::new()->create(['tenant_id' => $this->tenant->id, 'is_active' => true]);
        $product = ProductFactory::new()->create(['tenant_id' => $this->tenant->id]);

        $po = PurchaseOrderFactory::new()->create([
            'tenant_id'    => $this->tenant->id,
            'supplier_id'  => $supplier->id,
            'warehouse_id' => $warehouse->id,
            'status'       => PurchaseOrder::STATUS_ACTIVE,
        ]);

        $item = PurchaseOrderItemFactory::new()->create([
            'tenant_id'         => $this->tenant->id,
            'purchase_order_id' => $po->id,
            'product_id'        => $product->id,
            'quantity'          => $ordered,
            'received_quantity' => $received,
        ]);

        return compact('supplier', 'warehouse', 'product', 'po', 'item');
    }

    private function service(): GoodsReceiptService
    {
        return app(GoodsReceiptService::class);
    }

    private function stockOnHand(string $warehouseId, string $productId): float
    {
        return (float) (ProductStock::where('warehouse_id', $warehouseId)
            ->where('product_id', $productId)
            ->value('quantity_on_hand') ?? 0);
    }

    public function test_po_line_reports_full_remaining_before_any_receipt(): void
    {
        ['item' => $item] = $this->makePo(1000);

        $remaining = (float) $item->quantity - (float) $item->received_quantity;
        $this->assertSame(1000.0, $remaining);
    }

    public function test_draft_receipt_does_not_move_stock(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [[
                'product_id'             => $p->id,
                'purchase_order_item_id' => $item->id,
                'quantity'               => 30,
            ]],
        ]);

        $this->assertSame(0.0, $this->stockOnHand($w->id, $p->id));
        $this->assertSame(0, StockMovement::where('product_id', $p->id)->count());
    }

    public function test_confirm_receipt_moves_stock(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);

        $this->service()->confirm($receipt);

        $this->assertSame(30.0, $this->stockOnHand($w->id, $p->id));
    }

    public function test_confirm_creates_purchase_in_movement(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);
        $this->service()->confirm($receipt);

        $movement = StockMovement::where('reference_type', GoodsReceipt::class)
            ->where('reference_id', $receipt->id)
            ->where('product_id', $p->id)
            ->first();

        $this->assertNotNull($movement);
        $this->assertSame('purchase_in', $movement->movement_type);
        $this->assertSame('30.000', (string) $movement->quantity);
    }

    public function test_confirm_updates_po_received_quantity(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);
        $this->service()->confirm($receipt);

        $this->assertSame(30.0, (float) $item->fresh()->received_quantity);
    }

    public function test_remaining_decreases_after_first_receipt(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);
        $this->service()->confirm($receipt);

        $fresh = $item->fresh();
        $remaining = (float) $fresh->quantity - (float) $fresh->received_quantity;
        $this->assertSame(970.0, $remaining);
    }

    public function test_over_receive_is_blocked_by_request_rule(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        // Remaining is 1000; receiving 1001 must fail validation.
        $response = $this->post(route('bo.purchases.goods-receipts.store'), [
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'received_at'       => now()->format('d-m-Y'),
            'items'             => [[
                'product_id'             => $p->id,
                'purchase_order_item_id' => $item->id,
                'quantity'               => 1001,
            ]],
        ]);

        $response->assertSessionHasErrors('items.0.quantity');
        $this->assertSame(0, GoodsReceipt::count());
    }

    public function test_multiple_receipts_accumulate(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        foreach ([30, 200] as $qty) {
            $r = $this->service()->create([
                'purchase_order_id' => $po->id,
                'warehouse_id'      => $w->id,
                'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => $qty]],
            ]);
            $this->service()->confirm($r);
        }

        $this->assertSame(230.0, $this->stockOnHand($w->id, $p->id));
        $this->assertSame(230.0, (float) $item->fresh()->received_quantity);
    }

    public function test_po_becomes_partially_received(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $r = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);
        $this->service()->confirm($r);

        $this->assertSame(PurchaseOrder::STATUS_PARTIALLY_RECEIVED, $po->fresh()->status);
    }

    public function test_po_becomes_received_only_when_fully_received(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $r = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 1000]],
        ]);
        $this->service()->confirm($r);

        $this->assertSame(PurchaseOrder::STATUS_RECEIVED, $po->fresh()->status);
    }

    public function test_double_confirm_does_not_duplicate_stock(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);

        $this->service()->confirm($receipt);
        // Second confirm: status is already 'received' → must be a no-op.
        $this->service()->confirm($receipt->fresh());

        $this->assertSame(30.0, $this->stockOnHand($w->id, $p->id));
        $this->assertSame(1, StockMovement::where('reference_id', $receipt->id)
            ->where('product_id', $p->id)->count());
        $this->assertSame(30.0, (float) $item->fresh()->received_quantity);
    }

    public function test_warehouse_stock_history_records_movement(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);
        $this->service()->confirm($receipt);

        $this->assertSame(1, StockMovement::where('warehouse_id', $w->id)
            ->where('movement_type', 'purchase_in')->count());
    }

    public function test_product_total_quantity_history_updated(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        $receipt = $this->service()->create([
            'purchase_order_id' => $po->id,
            'warehouse_id'      => $w->id,
            'items'             => [['product_id' => $p->id, 'purchase_order_item_id' => $item->id, 'quantity' => 30]],
        ]);
        $this->service()->confirm($receipt);

        // StockService syncs the product's total quantity across warehouses.
        $this->assertSame(30.0, (float) $p->fresh()->quantity);
    }

    public function test_one_click_receive_moves_stock_and_completes_po(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(1000);

        app(PurchaseOrderService::class)->receive($po->fresh()->load('items'));

        $this->assertSame(1000.0, $this->stockOnHand($w->id, $p->id));
        $this->assertSame(1000.0, (float) $item->fresh()->received_quantity);
        $this->assertSame(PurchaseOrder::STATUS_RECEIVED, $po->fresh()->status);
        $this->assertSame(1, StockMovement::where('product_id', $p->id)
            ->where('movement_type', 'purchase_in')->count());
    }

    // ---- Automatic PO completion (derive status from quantities) ----

    /** Build a 2-line PO: Product A (1000) + Product B (500). */
    private function makeTwoLinePo(): array
    {
        $supplier = SupplierFactory::new()->create(['tenant_id' => $this->tenant->id]);
        $warehouse = WarehouseFactory::new()->create(['tenant_id' => $this->tenant->id, 'is_active' => true]);
        $productA = ProductFactory::new()->create(['tenant_id' => $this->tenant->id]);
        $productB = ProductFactory::new()->create(['tenant_id' => $this->tenant->id]);

        $po = PurchaseOrderFactory::new()->create([
            'tenant_id'    => $this->tenant->id,
            'supplier_id'  => $supplier->id,
            'warehouse_id' => $warehouse->id,
            'status'       => PurchaseOrder::STATUS_ACTIVE,
        ]);

        $itemA = PurchaseOrderItemFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'purchase_order_id' => $po->id,
            'product_id' => $productA->id, 'quantity' => 1000, 'received_quantity' => 0, 'position' => 1,
        ]);
        $itemB = PurchaseOrderItemFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'purchase_order_id' => $po->id,
            'product_id' => $productB->id, 'quantity' => 500, 'received_quantity' => 0, 'position' => 2,
        ]);

        return compact('warehouse', 'productA', 'productB', 'po', 'itemA', 'itemB');
    }

    private function confirmReceipt(string $poId, string $warehouseId, array $lines): void
    {
        $receipt = $this->service()->create([
            'purchase_order_id' => $poId,
            'warehouse_id'      => $warehouseId,
            'items'             => $lines,
        ]);
        $this->service()->confirm($receipt);
    }

    public function test_multiline_partial_receipt_sets_partially_received(): void
    {
        ['warehouse' => $w, 'productA' => $a, 'productB' => $b, 'po' => $po, 'itemA' => $ia, 'itemB' => $ib]
            = $this->makeTwoLinePo();

        // A fully received (1000), B partially (300) → remaining exists.
        $this->confirmReceipt($po->id, $w->id, [
            ['product_id' => $a->id, 'purchase_order_item_id' => $ia->id, 'quantity' => 1000],
            ['product_id' => $b->id, 'purchase_order_item_id' => $ib->id, 'quantity' => 300],
        ]);

        $this->assertSame(PurchaseOrder::STATUS_PARTIALLY_RECEIVED, $po->fresh()->status);
    }

    public function test_multiline_completes_received_when_all_lines_done(): void
    {
        ['warehouse' => $w, 'productA' => $a, 'productB' => $b, 'po' => $po, 'itemA' => $ia, 'itemB' => $ib]
            = $this->makeTwoLinePo();

        $this->confirmReceipt($po->id, $w->id, [
            ['product_id' => $a->id, 'purchase_order_item_id' => $ia->id, 'quantity' => 1000],
            ['product_id' => $b->id, 'purchase_order_item_id' => $ib->id, 'quantity' => 300],
        ]);
        $this->assertSame(PurchaseOrder::STATUS_PARTIALLY_RECEIVED, $po->fresh()->status);

        // Receive the remaining 200 of B → every line complete → auto received.
        $this->confirmReceipt($po->id, $w->id, [
            ['product_id' => $b->id, 'purchase_order_item_id' => $ib->id, 'quantity' => 200],
        ]);

        $this->assertSame(PurchaseOrder::STATUS_RECEIVED, $po->fresh()->status);
        $this->assertSame(500.0, (float) $ib->fresh()->received_quantity);
    }

    public function test_recalculate_status_derives_from_quantities_alone(): void
    {
        ['po' => $po, 'itemA' => $ia, 'itemB' => $ib] = $this->makeTwoLinePo();

        // Stored status is stale ('received') but quantities are 0 → must demote.
        $po->update(['status' => PurchaseOrder::STATUS_RECEIVED]);

        $derived = $po->fresh()->recalculateStatus();

        $this->assertSame(PurchaseOrder::STATUS_ACTIVE, $derived);
        $this->assertSame(PurchaseOrder::STATUS_ACTIVE, $po->fresh()->status);
    }

    public function test_one_click_receive_auto_closes_multiline_po(): void
    {
        ['po' => $po] = $this->makeTwoLinePo();

        app(PurchaseOrderService::class)->receive($po->fresh()->load('items'));

        $this->assertSame(PurchaseOrder::STATUS_RECEIVED, $po->fresh()->status);
    }

    public function test_manual_change_status_to_received_is_rejected(): void
    {
        ['po' => $po] = $this->makeTwoLinePo();

        $response = $this->post(route('bo.purchases.purchase-orders.change-status', $po), [
            'status' => 'received',
        ]);

        $response->assertSessionHas('error');
        // Quantities are still 0, so the PO must NOT be marked received.
        $this->assertSame(PurchaseOrder::STATUS_ACTIVE, $po->fresh()->normalizedStatus());
    }

    public function test_po_lines_endpoint_returns_products_and_quantities(): void
    {
        ['warehouse' => $w, 'product' => $p, 'po' => $po, 'item' => $item] = $this->makePo(100);

        $response = $this->getJson(route('bo.purchases.goods-receipts.po-lines', $po));

        $response->assertOk()
            ->assertJsonPath('warehouse_id', $w->id)
            ->assertJsonPath('has_product_lines', true)
            ->assertJsonPath('lines.0.product_id', $p->id)
            ->assertJsonPath('lines.0.ordered', 100)
            ->assertJsonPath('lines.0.received', 0)
            ->assertJsonPath('lines.0.remaining', 100)
            ->assertJsonPath('lines.0.purchase_order_item_id', $item->id);
    }

    public function test_po_lines_endpoint_excludes_label_only_lines(): void
    {
        $supplier = SupplierFactory::new()->create(['tenant_id' => $this->tenant->id]);
        $warehouse = WarehouseFactory::new()->create(['tenant_id' => $this->tenant->id, 'is_active' => true]);

        $po = PurchaseOrderFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'supplier_id' => $supplier->id,
            'warehouse_id' => $warehouse->id, 'status' => PurchaseOrder::STATUS_ACTIVE,
        ]);

        // Free-text label line with no catalog product (product_id = null).
        PurchaseOrderItemFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'purchase_order_id' => $po->id,
            'product_id' => null, 'label' => 'gg', 'quantity' => 100, 'received_quantity' => 0,
        ]);

        $response = $this->getJson(route('bo.purchases.goods-receipts.po-lines', $po));

        $response->assertOk()
            ->assertJsonPath('has_product_lines', false)
            ->assertJsonCount(0, 'lines');
    }

    public function test_one_click_receive_skips_label_only_lines(): void
    {
        $supplier = SupplierFactory::new()->create(['tenant_id' => $this->tenant->id]);
        $warehouse = WarehouseFactory::new()->create(['tenant_id' => $this->tenant->id, 'is_active' => true]);
        $product = ProductFactory::new()->create(['tenant_id' => $this->tenant->id]);

        $po = PurchaseOrderFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'supplier_id' => $supplier->id,
            'warehouse_id' => $warehouse->id, 'status' => PurchaseOrder::STATUS_ACTIVE,
        ]);

        $productItem = PurchaseOrderItemFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'purchase_order_id' => $po->id,
            'product_id' => $product->id, 'quantity' => 40, 'received_quantity' => 0, 'position' => 1,
        ]);
        PurchaseOrderItemFactory::new()->create([
            'tenant_id' => $this->tenant->id, 'purchase_order_id' => $po->id,
            'product_id' => null, 'label' => 'gg', 'quantity' => 100, 'received_quantity' => 0, 'position' => 2,
        ]);

        // Must not crash on the label line; product line stocked normally.
        app(PurchaseOrderService::class)->receive($po->fresh()->load('items'));

        $this->assertSame(40.0, $this->stockOnHand($warehouse->id, $product->id));
        $this->assertSame(40.0, (float) $productItem->fresh()->received_quantity);
        $this->assertSame(1, StockMovement::where('movement_type', 'purchase_in')->count());
    }
}
