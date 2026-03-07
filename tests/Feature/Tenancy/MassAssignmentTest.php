<?php

namespace Tests\Feature\Tenancy;

use App\Models\CRM\Customer;
use App\Models\Tenancy\Tenant;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MassAssignmentTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        TenantContext::forget();
        parent::tearDown();
    }

    protected function createTenant(string $slug = null): Tenant
    {
        return Tenant::create([
            'name'             => 'Tenant ' . $slug,
            'slug'             => $slug,
            'status'           => 'active',
            'timezone'         => 'UTC',
            'default_currency' => 'USD',
            'has_free_trial'   => false,
        ]);
    }

    /**
     * tenant_id must not be mass-assignable — the BelongsToTenant trait
     * must always fill it from TenantContext, ignoring any injected value.
     */
    public function test_tenant_id_cannot_be_injected_via_mass_assignment(): void
    {
        $tenantA = $this->createTenant('ma-a');
        $tenantB = $this->createTenant('ma-b');

        // Set context to tenant A
        TenantContext::set($tenantA);

        // Attempt to inject tenant B's ID through mass assignment
        $customer = Customer::create([
            'name'      => 'Injection Test',
            'tenant_id' => $tenantB->id, // ← attempted injection
            'email'     => 'inject@test.com',
            'type'      => 'individual',
            'status'    => 'active',
        ]);

        // The record must belong to tenant A, not tenant B
        $this->assertEquals(
            $tenantA->id,
            $customer->tenant_id,
            'tenant_id must be filled from TenantContext, not from mass assignment.'
        );
        $this->assertNotEquals(
            $tenantB->id,
            $customer->tenant_id
        );
    }

    /**
     * tenant_id must not appear in any model $fillable array.
     */
    public function test_tenant_id_not_in_customer_fillable(): void
    {
        $model = new Customer();
        $this->assertNotContains('tenant_id', $model->getFillable());
    }
}
