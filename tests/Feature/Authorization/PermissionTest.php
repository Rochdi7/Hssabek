<?php

namespace Tests\Feature\Authorization;

use App\Models\CRM\Customer;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    private function setUpTenantWithAdmin(): array
    {
        $data = $this->createTenantWithAdmin();
        TenantContext::set($data['tenant']);

        return $data;
    }

    public function test_admin_can_access_all_crud_operations(): void
    {
        $data = $this->setUpTenantWithAdmin();

        $this->actingAs($data['user']);

        $response = $this->get(route('bo.crm.customers.index'));
        $response->assertStatus(200);
    }

    public function test_viewer_cannot_create_invoice(): void
    {
        $data = $this->setUpTenantWithAdmin();
        $tenant = $data['tenant'];

        $viewer = \App\Models\User::factory()->create([
            'tenant_id' => $tenant->id,
            'status' => 'active',
        ]);
        $viewer->assignRole('viewer');

        $customer = Customer::create([
            'name' => 'Test Cust', 'email' => 'c@test.com', 'type' => 'company', 'status' => 'active',
        ]);

        $this->actingAs($viewer);

        $response = $this->post(route('bo.sales.invoices.store'), [
            'customer_id' => $customer->id,
            'issue_date' => now()->toDateString(),
            'due_date' => now()->addDays(30)->toDateString(),
            'items' => [['label' => 'Item', 'quantity' => 1, 'unit_price' => 100, 'tax_rate' => 20]],
        ]);

        $response->assertStatus(403);
    }

    public function test_viewer_cannot_delete_customer(): void
    {
        $data = $this->setUpTenantWithAdmin();
        $tenant = $data['tenant'];

        $viewer = \App\Models\User::factory()->create([
            'tenant_id' => $tenant->id,
            'status' => 'active',
        ]);
        $viewer->assignRole('viewer');

        $customer = Customer::create([
            'name' => 'To Delete', 'email' => 'del@test.com', 'type' => 'company', 'status' => 'active',
        ]);

        $this->actingAs($viewer);

        $response = $this->delete(route('bo.crm.customers.destroy', $customer));
        $response->assertStatus(403);
    }

    public function test_user_without_permission_gets_403(): void
    {
        $data = $this->setUpTenantWithAdmin();
        $tenant = $data['tenant'];

        $noRoleUser = \App\Models\User::factory()->create([
            'tenant_id' => $tenant->id,
            'status' => 'active',
        ]);

        $this->actingAs($noRoleUser);

        $response = $this->get(route('bo.crm.customers.index'));
        $response->assertStatus(403);
    }

    public function test_user_can_only_see_own_tenant_data(): void
    {
        $dataA = $this->createTenantWithAdmin();
        $dataB = $this->createTenantWithAdmin();

        // Create customer in tenant B
        TenantContext::set($dataB['tenant']);
        Customer::create([
            'name' => 'B Customer', 'email' => 'b@cust.com', 'type' => 'company', 'status' => 'active',
        ]);

        // Switch to tenant A and verify no customers visible
        TenantContext::set($dataA['tenant']);
        $this->actingAs($dataA['user']);

        $customers = Customer::all();
        $this->assertCount(0, $customers);
    }
}
