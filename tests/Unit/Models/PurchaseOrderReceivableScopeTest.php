<?php

namespace Tests\Unit\Models;

use App\Models\Inventory\Warehouse;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\Supplier;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * A PO can still receive goods unless fully received or cancelled.
 * The status-enum migration remaps legacy 'draft'/'sent' → 'active', so
 * 'active' must be receivable (it was the bug: the dropdown excluded it).
 */
class PurchaseOrderReceivableScopeTest extends TestCase
{
    use RefreshDatabase;

    private Supplier $supplier;
    private Warehouse $warehouse;

    protected function setUp(): void
    {
        parent::setUp();
        TenantContext::set($this->createTenant());

        $this->supplier = Supplier::create([
            'name' => 'PO Supplier',
            'email' => 'po-supplier@test.com',
            'status' => 'active',
        ]);

        $this->warehouse = Warehouse::factory()->create();
    }

    private function makePO(string $status): PurchaseOrder
    {
        return PurchaseOrder::create([
            'supplier_id' => $this->supplier->id,
            'warehouse_id' => $this->warehouse->id,
            'number' => 'PO-' . fake()->unique()->numerify('######'),
            'status' => $status,
            'order_date' => now()->toDateString(),
            'subtotal' => 100, 'discount_total' => 0, 'tax_total' => 0, 'total' => 100,
        ]);
    }

    public function test_receivable_scope_includes_open_pos_and_excludes_closed(): void
    {
        $active    = $this->makePO('active');
        $legacyDraft = $this->makePO('draft');
        $confirmed = $this->makePO('confirmed');
        $partial   = $this->makePO('partially_received');
        $received  = $this->makePO('received');
        $cancelled = $this->makePO('cancelled');

        $ids = PurchaseOrder::receivable()->pluck('id')->all();

        $this->assertContains($active->id, $ids);
        $this->assertContains($legacyDraft->id, $ids);
        $this->assertContains($confirmed->id, $ids);
        $this->assertContains($partial->id, $ids);
        $this->assertNotContains($received->id, $ids);
        $this->assertNotContains($cancelled->id, $ids);
    }
}
