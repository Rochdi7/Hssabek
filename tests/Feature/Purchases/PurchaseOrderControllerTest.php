<?php

namespace Tests\Feature\Purchases;

use Database\Factories\PurchaseOrderFactory;
use Database\Factories\SupplierFactory;
use Database\Factories\WarehouseFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class PurchaseOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
        $domain = $this->tenant->domains()->where('is_primary', true)->value('domain');
        URL::forceRootUrl('http://' . $domain);
    }

    public function test_index_lists_purchase_orders(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.purchases.purchase-orders.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.purchases.purchase-orders.create'));

        $response->assertStatus(200);
    }

    public function test_show_displays_purchase_order(): void
    {
        $supplier = SupplierFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $warehouse = WarehouseFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $purchaseOrder = PurchaseOrderFactory::new()->create([
            'tenant_id' => $this->tenant->id,
            'supplier_id' => $supplier->id,
            'warehouse_id' => $warehouse->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.purchases.purchase-orders.show', $purchaseOrder));

        $response->assertStatus(200);
    }

    public function test_destroy_deletes_purchase_order(): void
    {
        $supplier = SupplierFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $warehouse = WarehouseFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $purchaseOrder = PurchaseOrderFactory::new()->create([
            'tenant_id' => $this->tenant->id,
            'supplier_id' => $supplier->id,
            'warehouse_id' => $warehouse->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.purchases.purchase-orders.destroy', $purchaseOrder));

        $response->assertRedirect();
    }
}
