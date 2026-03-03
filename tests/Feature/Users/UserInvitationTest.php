<?php

namespace Tests\Feature\Users;

use App\Jobs\SendUserInvitationJob;
use App\Models\System\UserInvitation;
use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantDomain;
use App\Models\Tenancy\TenantSetting;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserInvitationTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;
    private User $adminUser;
    private Role $memberRole;

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
        $createPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.users.create',
            'guard_name' => 'web',
        ]);
        $editPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.users.edit',
            'guard_name' => 'web',
        ]);

        // Admin role
        $adminRole = Role::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'admin',
            'guard_name' => 'web',
        ]);
        $adminRole->givePermissionTo([$viewPerm, $createPerm, $editPerm]);

        // Member role (for invitations)
        $this->memberRole = Role::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'member',
            'guard_name' => 'web',
        ]);

        $this->adminUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);
        $this->adminUser->assignRole($adminRole);

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

    // ──────────── Store Invitation ────────────

    public function test_admin_can_send_invitation(): void
    {
        Queue::fake();

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.invite.store'), [
                'email'   => 'newuser@example.com',
                'role_id' => $this->memberRole->id,
            ]);

        $response->assertRedirect(route('bo.users.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('user_invitations', [
            'email'     => 'newuser@example.com',
            'role_id'   => $this->memberRole->id,
            'tenant_id' => $this->tenant->id,
        ]);

        Queue::assertPushed(SendUserInvitationJob::class);
    }

    public function test_cannot_invite_existing_user(): void
    {
        TenantContext::set($this->tenant);
        User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'email'     => 'existing@example.com',
            'status'    => 'active',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.invite.store'), [
                'email'   => 'existing@example.com',
                'role_id' => $this->memberRole->id,
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_new_invitation_cancels_old_pending_one(): void
    {
        Queue::fake();

        TenantContext::set($this->tenant);
        $oldInvitation = UserInvitation::create([
            'email'      => 'duplicate@example.com',
            'role_id'    => $this->memberRole->id,
            'token'      => Str::random(64),
            'expires_at' => now()->addDays(7),
            'created_by' => $this->adminUser->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->post(route('bo.users.invite.store'), [
                'email'   => 'duplicate@example.com',
                'role_id' => $this->memberRole->id,
            ]);

        $response->assertRedirect(route('bo.users.index'));

        // Old invitation should be deleted
        $this->assertDatabaseMissing('user_invitations', [
            'id' => $oldInvitation->id,
        ]);

        // New invitation should exist
        $this->assertDatabaseHas('user_invitations', [
            'email'     => 'duplicate@example.com',
            'tenant_id' => $this->tenant->id,
        ]);
    }

    // ──────────── Destroy Invitation ────────────

    public function test_admin_can_cancel_invitation(): void
    {
        TenantContext::set($this->tenant);
        $invitation = UserInvitation::create([
            'email'      => 'cancel@example.com',
            'role_id'    => $this->memberRole->id,
            'token'      => Str::random(64),
            'expires_at' => now()->addDays(7),
            'created_by' => $this->adminUser->id,
        ]);

        $response = $this->actingAs($this->adminUser)
            ->withTenantHost()
            ->delete(route('bo.users.invite.destroy', $invitation));

        $response->assertRedirect(route('bo.users.index'));
        $this->assertDatabaseMissing('user_invitations', [
            'id' => $invitation->id,
        ]);
    }

    // ──────────── Accept Invitation ────────────

    public function test_valid_token_shows_accept_form(): void
    {
        TenantContext::set($this->tenant);
        $invitation = UserInvitation::create([
            'email'      => 'accept@example.com',
            'role_id'    => $this->memberRole->id,
            'token'      => 'valid-token-123',
            'expires_at' => now()->addDays(7),
            'created_by' => $this->adminUser->id,
        ]);
        TenantContext::forget();

        $response = $this->get(route('bo.invitation.accept', 'valid-token-123'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.users.accept-invitation');
        $response->assertViewHas('invitation');
    }

    public function test_expired_token_returns_404(): void
    {
        TenantContext::set($this->tenant);
        UserInvitation::create([
            'email'      => 'expired@example.com',
            'role_id'    => $this->memberRole->id,
            'token'      => 'expired-token-123',
            'expires_at' => now()->subDay(),
            'created_by' => $this->adminUser->id,
        ]);
        TenantContext::forget();

        $response = $this->get(route('bo.invitation.accept', 'expired-token-123'));

        $response->assertStatus(404);
    }

    public function test_already_accepted_token_returns_404(): void
    {
        TenantContext::set($this->tenant);
        UserInvitation::create([
            'email'       => 'accepted@example.com',
            'role_id'     => $this->memberRole->id,
            'token'       => 'used-token-123',
            'expires_at'  => now()->addDays(7),
            'accepted_at' => now(),
            'created_by'  => $this->adminUser->id,
        ]);
        TenantContext::forget();

        $response = $this->get(route('bo.invitation.accept', 'used-token-123'));

        $response->assertStatus(404);
    }

    public function test_accept_store_creates_user_and_logs_in(): void
    {
        TenantContext::set($this->tenant);
        $invitation = UserInvitation::create([
            'email'      => 'newmember@example.com',
            'role_id'    => $this->memberRole->id,
            'token'      => 'accept-store-token',
            'expires_at' => now()->addDays(7),
            'created_by' => $this->adminUser->id,
        ]);
        TenantContext::forget();

        $response = $this->post(route('bo.invitation.accept.store', 'accept-store-token'), [
            'name'                  => 'New Member',
            'password'              => 'securepassword',
            'password_confirmation' => 'securepassword',
        ]);

        $response->assertRedirect(route('bo.dashboard'));

        // User created with correct tenant
        $this->assertDatabaseHas('users', [
            'email'     => 'newmember@example.com',
            'name'      => 'New Member',
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);

        // Invitation marked as accepted
        $invitation->refresh();
        $this->assertNotNull($invitation->accepted_at);

        // User is logged in
        $this->assertAuthenticated();
    }

    public function test_accept_store_validates_password(): void
    {
        TenantContext::set($this->tenant);
        UserInvitation::create([
            'email'      => 'validate@example.com',
            'role_id'    => $this->memberRole->id,
            'token'      => 'validate-token',
            'expires_at' => now()->addDays(7),
            'created_by' => $this->adminUser->id,
        ]);
        TenantContext::forget();

        $response = $this->post(route('bo.invitation.accept.store', 'validate-token'), [
            'name'                  => 'Tester',
            'password'              => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
