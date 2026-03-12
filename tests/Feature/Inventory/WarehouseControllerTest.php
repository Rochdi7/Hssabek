<?php

namespace Tests\Feature\Inventory;

use Database\Factories\WarehouseFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class WarehouseControllerTest extends TestCase
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

    public function test_index_lists_warehouses(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.inventory.warehouses.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.inventory.warehouses.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_warehouse(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.inventory.warehouses.store'), [
                'name' => 'Entrepot Principal',
                'code' => 'WH-01',
                'is_active' => true,
            ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('warehouses', [
            'name' => 'Entrepot Principal',
            'code' => 'WH-01',
            'tenant_id' => $this->tenant->id,
        ]);
    }

    public function test_destroy_deletes_warehouse(): void
    {
        $warehouse = WarehouseFactory::new()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.inventory.warehouses.destroy', $warehouse));

        $response->assertRedirect();
    }
}
