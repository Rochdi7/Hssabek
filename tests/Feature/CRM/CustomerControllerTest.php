<?php

namespace Tests\Feature\CRM;

use App\Models\CRM\Customer;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
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

    public function test_index_lists_customers(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.crm.customers.index'));

        $response->assertStatus(200);
        $response->assertSee($customer->name);
    }

    public function test_create_shows_form(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.crm.customers.create'));

        $response->assertStatus(200);
    }

    public function test_store_creates_customer(): void
    {
        $data = [
            'name' => 'Client Test SARL',
            'email' => 'client@test.com',
            'phone' => '+212600000000',
            'type' => 'individual',
            'status' => 'active',
        ];

        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.crm.customers.store'), $data);

        $response->assertRedirect(route('bo.crm.customers.index'));
        $this->assertDatabaseHas('customers', [
            'tenant_id' => $this->tenant->id,
            'name' => 'Client Test SARL',
            'email' => 'client@test.com',
        ]);
    }

    public function test_store_validates_required_fields(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->post(route('bo.crm.customers.store'), []);

        $response->assertSessionHasErrors(['name', 'type', 'status']);
    }

    public function test_edit_shows_form_with_data(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.crm.customers.edit', $customer));

        $response->assertStatus(200);
        $response->assertSee($customer->name);
    }

    public function test_update_modifies_customer(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.crm.customers.update', $customer), [
                'name' => 'Nouveau Nom',
                'type' => 'company',
                'status' => 'active',
            ]);

        $response->assertRedirect(route('bo.crm.customers.index'));
        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'name' => 'Nouveau Nom',
        ]);
    }

    public function test_destroy_soft_deletes_customer(): void
    {
        $customer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete(route('bo.crm.customers.destroy', $customer));

        $response->assertRedirect(route('bo.crm.customers.index'));
        $this->assertSoftDeleted('customers', [
            'id' => $customer->id,
        ]);
    }

    public function test_tenant_isolation(): void
    {
        // Create a customer for the current tenant
        $ownCustomer = Customer::factory()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        // Create a second tenant and a customer belonging to it
        $otherTenant = $this->createTenant('other');
        TenantContext::set($otherTenant);
        $otherCustomer = Customer::factory()->create([
            'tenant_id' => $otherTenant->id,
        ]);

        // Switch back to the original tenant
        TenantContext::set($this->tenant);

        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.crm.customers.index'));

        $response->assertStatus(200);
        $response->assertSee($ownCustomer->name);
        $response->assertDontSee($otherCustomer->name);
    }
}
