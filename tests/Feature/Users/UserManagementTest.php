<?php

namespace Tests\Feature\Users;

use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantDomain;
use App\Models\Tenancy\TenantSetting;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;
    private User $adminUser;
    private Role $adminRole;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::create([
            'name'             => 'Test Company',
            'slug'             => 'test-company',
            'status'           => 'active',
            'timezone'         => 'UTC',
            'default_currency' => 'MAD',
            'has_free_trial'   => false,
        ]);

        TenantDomain::create([
            'tenant_id'  => $this->tenant->id,
            'domain'     => 'test-company.localhost',
            'is_primary' => true,
        ]);

        TenantSetting::withoutGlobalScopes()->create([
            'tenant_id' => $this->tenant->id,
        ]);

        TenantContext::set($this->tenant);

        // Create permissions
        $viewPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.users.view',
            'guard_name' => 'web',
        ]);
        $editPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.users.edit',
            'guard_name' => 'web',
        ]);
        $createPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.users.create',
            'guard_name' => 'web',
        ]);

        // Create admin role with all permissions
        $this->adminRole = Role::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'admin',
            'guard_name' => 'web',
        ]);
        $this->adminRole->givePermissionTo([$viewPerm, $editPerm, $createPerm]);

        // Create admin user
        $this->adminUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);
        $this->adminUser->assignRole($this->adminRole);

        // Clear permission cache after setup
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    protected function tearDown(): void
    {
        TenantContext::forget();
        parent::tearDown();
    }

    private function withTenantHost(): static
    {
        return $this->withHeader('HOST', 'test-company.localhost');
    }

    // ──────────── Index ────────────

    public function test_admin_can_view_users_list(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->get(route('bo.users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.users.index');
        $response->assertViewHas('users');
        $response->assertViewHas('pendingInvitations');
    }

    public function test_user_without_permission_cannot_view_users(): void
    {
        TenantContext::set($this->tenant);
        $basicUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);

        $response = $this->actingAs($basicUser)
            ->withTenantHost()
            ->get(route('bo.users.index'));

        $response->assertStatus(403);
    }

    public function test_users_list_supports_search(): void
    {
        TenantContext::set($this->tenant);
        User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'name'      => 'John Doe',
            'email'     => 'john@test.com',
            'status'    => 'active',
        ]);
        User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'name'      => 'Jane Smith',
            'email'     => 'jane@test.com',
            'status'    => 'active',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->get(route('bo.users.index', ['search' => 'John']));

        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertDontSee('Jane Smith');
    }

    // ──────────── Edit / Update ────────────

    public function test_admin_can_edit_user(): void
    {
        TenantContext::set($this->tenant);
        $user = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->get(route('bo.users.edit', $user));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.users.edit');
    }

    public function test_admin_can_update_user(): void
    {
        TenantContext::set($this->tenant);
        $user = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->put(route('bo.users.update', $user), [
                'name'  => 'Updated Name',
                'phone' => '+212600000000',
                'roles' => [$this->adminRole->id],
            ]);

        $response->assertRedirect(route('bo.users.index'));
        $this->assertDatabaseHas('users', [
            'id'    => $user->id,
            'name'  => 'Updated Name',
            'phone' => '+212600000000',
        ]);
    }

    // ──────────── Activate / Deactivate ────────────

    public function test_admin_can_activate_user(): void
    {
        TenantContext::set($this->tenant);
        $user = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'blocked',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.activate', $user));

        $response->assertRedirect(route('bo.users.index'));
        $this->assertDatabaseHas('users', [
            'id'     => $user->id,
            'status' => 'active',
        ]);
    }

    public function test_admin_can_deactivate_another_user(): void
    {
        TenantContext::set($this->tenant);
        $user = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.deactivate', $user));

        $response->assertRedirect(route('bo.users.index'));
        $this->assertDatabaseHas('users', [
            'id'     => $user->id,
            'status' => 'blocked',
        ]);
    }

    public function test_admin_cannot_deactivate_self(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.deactivate', $this->adminUser));

        $response->assertStatus(403);
    }

    // ──────────── Cross-Tenant Isolation ────────────

    public function test_cannot_edit_user_from_another_tenant(): void
    {
        $otherTenant = Tenant::create([
            'name'             => 'Other Company',
            'slug'             => 'other-company',
            'status'           => 'active',
            'timezone'         => 'UTC',
            'default_currency' => 'MAD',
            'has_free_trial'   => false,
        ]);

        // Create user directly with the other tenant_id (bypass BelongsToTenant)
        $otherUser = new User();
        $otherUser->tenant_id = $otherTenant->id;
        $otherUser->name = 'Other User';
        $otherUser->email = 'other@test.com';
        $otherUser->password = bcrypt('password');
        $otherUser->status = 'active';
        $otherUser->save();

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->get(route('bo.users.edit', $otherUser));

        $response->assertStatus(403);
    }

    public function test_cannot_activate_user_from_another_tenant(): void
    {
        $otherTenant = Tenant::create([
            'name'             => 'Other Company 2',
            'slug'             => 'other-company-2',
            'status'           => 'active',
            'timezone'         => 'UTC',
            'default_currency' => 'MAD',
            'has_free_trial'   => false,
        ]);

        $otherUser = new User();
        $otherUser->tenant_id = $otherTenant->id;
        $otherUser->name = 'Other User 2';
        $otherUser->email = 'other2@test.com';
        $otherUser->password = bcrypt('password');
        $otherUser->status = 'blocked';
        $otherUser->save();

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.activate', $otherUser));

        $response->assertStatus(403);
    }
}
