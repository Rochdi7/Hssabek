<?php

namespace Tests\Feature\Catalog;

use App\Models\Catalog\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tenant;
    private $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        ['tenant' => $this->tenant, 'user' => $this->adminUser] = $this->createTenantWithAdmin();
    }

    public function test_index_lists_products(): void
    {
        Product::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.catalog.products.index'));

        $response->assertStatus(200);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.catalog.products.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_product(): void
    {
        $data = [
            'name' => 'Produit de Test',
            'code' => 'PRD-TEST-001',
            'item_type' => 'product',
            'selling_price' => 150.00,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.catalog.products.store'), $data);

        $response->assertRedirect(route('bo.catalog.products.index'));
        $this->assertDatabaseHas('products', [
            'tenant_id' => $this->tenant->id,
            'name' => 'Produit de Test',
            'code' => 'PRD-TEST-001',
        ]);
    }

    public function test_store_validates_required_fields(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.catalog.products.store'), []);

        $response->assertSessionHasErrors(['name', 'item_type', 'selling_price', 'code']);
    }

    public function test_edit_shows_form(): void
    {
        $product = Product::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.catalog.products.edit', $product));

        $response->assertStatus(200);
    }

    public function test_update_modifies_product(): void
    {
        $product = Product::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.catalog.products.update', $product), [
                'name' => 'Produit Modifie',
                'item_type' => 'product',
                'selling_price' => 200.00,
                'code' => $product->code,
            ]);

        $response->assertRedirect(route('bo.catalog.products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Produit Modifie',
        ]);
    }

    public function test_destroy_deletes_product(): void
    {
        $product = Product::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.catalog.products.destroy', $product));

        $response->assertRedirect(route('bo.catalog.products.index'));
        // Product uses SoftDeletes
        $this->assertSoftDeleted('products', [
            'id' => $product->id,
        ]);
    }
}
