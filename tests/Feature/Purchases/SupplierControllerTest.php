<?php

namespace Tests\Feature\Purchases;

use Database\Factories\SupplierFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class SupplierControllerTest extends TestCase
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

    public function test_index_lists_suppliers(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.purchases.suppliers.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.purchases.suppliers.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_supplier(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.purchases.suppliers.store'), [
                'name' => 'Fournisseur Test',
                'email' => 'fournisseur@test.com',
                'phone' => '+212600000000',
                'status' => 'active',
            ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('suppliers', [
            'name' => 'Fournisseur Test',
            'email' => 'fournisseur@test.com',
            'tenant_id' => $this->tenant->id,
        ]);
    }

    public function test_show_displays_supplier(): void
    {
        $supplier = SupplierFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.purchases.suppliers.show', $supplier));

        $response->assertStatus(200);
    }

    public function test_destroy_deletes_supplier(): void
    {
        $supplier = SupplierFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.purchases.suppliers.destroy', $supplier));

        $response->assertRedirect();
    }
}
