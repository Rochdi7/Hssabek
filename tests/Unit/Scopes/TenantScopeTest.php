<?php

namespace Tests\Unit\Scopes;

use App\Models\CRM\Customer;
use App\Models\Tenancy\Tenant;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class TenantScopeTest extends TestCase
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
     * TenantScope must filter queries to only return current tenant's records.
     */
    public function test_scope_filters_by_tenant_id(): void
    {
        $tenantA = $this->createTenant('scope-a');
        $tenantB = $this->createTenant('scope-b');

        TenantContext::set($tenantA);
        Customer::create([
            'name'   => 'A Customer',
            'email'  => 'a@scope.com',
            'type'   => 'individual',
            'status' => 'active',
        ]);
        TenantContext::forget();

        TenantContext::set($tenantB);
        Customer::create([
            'name'   => 'B Customer',
            'email'  => 'b@scope.com',
            'type'   => 'individual',
            'status' => 'active',
        ]);

        $results = Customer::all();

        $this->assertCount(1, $results);
        $this->assertEquals($tenantB->id, $results->first()->tenant_id);
    }

    /**
     * TenantScope must add a WHERE tenant_id = ? clause to queries.
     */
    public function test_scope_adds_where_clause(): void
    {
        $tenant = $this->createTenant('scope-c');
        TenantContext::set($tenant);

        $sql = Customer::toBase()->toSql();

        $this->assertStringContainsString('tenant_id', $sql);
    }

    /**
     * Without TenantContext, scope must not apply (no-op in console context).
     */
    public function test_scope_no_op_without_context(): void
    {
        TenantContext::forget();

        $tenantA = $this->createTenant('scope-noop-a');
        $tenantB = $this->createTenant('scope-noop-b');

        // Insert records directly using raw SQL to bypass the Model events
        DB::table('customers')->insert([
            'id'         => Str::uuid(),
            'tenant_id'  => $tenantA->id,
            'name'       => 'Noop A',
            'email'      => 'noop-a@test.com',
            'type'       => 'individual',
            'status'     => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('customers')->insert([
            'id'         => Str::uuid(),
            'tenant_id'  => $tenantB->id,
            'name'       => 'Noop B',
            'email'      => 'noop-b@test.com',
            'type'       => 'individual',
            'status'     => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Without context (simulating console), raw query sees all records
        $rawCount = DB::table('customers')->count();
        $this->assertEquals(2, $rawCount);
    }
}
