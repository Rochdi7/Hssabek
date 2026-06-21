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

    public function test_store_defaults_discount_value_to_zero_when_discount_type_is_none(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.catalog.products.store'), [
                'name' => 'Produit remise zero',
                'code' => 'PRD-DISCOUNT-000',
                'item_type' => 'product',
                'selling_price' => 99.99,
                'discount_type' => 'none',
            ]);

        $response->assertRedirect(route('bo.catalog.products.index'));

        $product = Product::query()->where('code', 'PRD-DISCOUNT-000')->firstOrFail();

        $this->assertSame('none', $product->discount_type);
        $this->assertSame(0.0, (float) $product->discount_value);
    }

    public function test_store_defaults_optional_numeric_fields_without_sql_error(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.catalog.products.store'), [
                'name' => 'Produit numeriques vides',
                'code' => 'PRD-EMPTY-NUM-000',
                'item_type' => 'product',
                'selling_price' => 120,
                'purchase_price' => '',
                'quantity' => '',
                'discount_type' => 'none',
                'discount_value' => '',
            ]);

        $response->assertRedirect(route('bo.catalog.products.index'));

        $product = Product::query()->where('code', 'PRD-EMPTY-NUM-000')->firstOrFail();

        $this->assertSame(0.0, (float) $product->purchase_price);
        $this->assertSame(0.0, (float) $product->quantity);
        $this->assertSame(0.0, (float) $product->discount_value);
    }

    public function test_store_validates_required_fields(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.catalog.products.store'), []);

        $response->assertSessionHasErrors(['name', 'item_type', 'selling_price', 'code']);
    }

    public function test_validation_failure_redirects_back_with_errors_and_session_message(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->from(route('bo.catalog.products.create'))
            ->post(route('bo.catalog.products.store'), []);

        $response->assertRedirect(route('bo.catalog.products.create'));
        $response->assertSessionHasErrors(['name', 'item_type', 'selling_price', 'code']);
        $response->assertSessionHas('error');
    }

    public function test_store_returns_json_validation_error_for_ajax_requests(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->postJson(route('bo.catalog.products.store'), []);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
            ])
            ->assertJsonStructure([
                'success',
                'message',
                'errors' => ['name', 'item_type', 'selling_price', 'code'],
            ]);
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
