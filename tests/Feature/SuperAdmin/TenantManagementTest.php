<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Tenancy\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a super admin user (tenant_id = null).
     */
    private function createSuperAdmin(): User
    {
        return User::factory()->create([
            'tenant_id' => null,
            'status' => 'active',
        ]);
    }

    public function test_list_tenants(): void
    {
        $admin = $this->createSuperAdmin();

        // Create some tenants
        Tenant::create([
            'name' => 'Tenant Alpha',
            'slug' => 'tenant-alpha',
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);
        Tenant::create([
            'name' => 'Tenant Beta',
            'slug' => 'tenant-beta',
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);

        $response = $this->actingAs($admin)->get(route('sa.tenants.index'));

        $response->assertStatus(200);
    }

    public function test_suspend_tenant(): void
    {
        $admin = $this->createSuperAdmin();

        $tenant = Tenant::create([
            'name' => 'Tenant Suspend',
            'slug' => 'tenant-suspend',
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);

        $response = $this->actingAs($admin)->post(route('sa.tenants.suspend', $tenant));

        $response->assertRedirect(route('sa.tenants.index'));

        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'status' => 'suspended',
        ]);
    }

    public function test_activate_tenant(): void
    {
        $admin = $this->createSuperAdmin();

        $tenant = Tenant::create([
            'name' => 'Tenant Activate',
            'slug' => 'tenant-activate',
            'status' => 'suspended',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);

        $response = $this->actingAs($admin)->post(route('sa.tenants.activate', $tenant));

        $response->assertRedirect(route('sa.tenants.index'));

        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'status' => 'active',
        ]);
    }
}
