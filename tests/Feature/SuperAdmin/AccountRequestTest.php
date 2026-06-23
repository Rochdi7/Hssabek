<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Billing\Plan;
use App\Models\System\AccountRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountRequestTest extends TestCase
{
    use RefreshDatabase;

    private function createSuperAdmin(): User
    {
        return User::factory()->create([
            'tenant_id' => null,
            'status'    => 'active',
        ]);
    }

    private function makePendingRequest(array $overrides = []): AccountRequest
    {
        return AccountRequest::create(array_merge([
            'company_name'  => 'SARL Test Entreprise',
            'company_email' => 'contact@test-entreprise.com',
            'contact_name'  => 'Ahmed Tazi',
            'contact_email' => 'ahmed.tazi@test-entreprise.com',
            'ip_address'    => '127.0.0.1',
        ], $overrides));
    }

    private function getActivePlan(): Plan
    {
        return Plan::firstOrCreate(
            ['code' => 'test-plan'],
            ['name' => 'Test Plan', 'interval' => 'month', 'price' => 0, 'currency' => 'MAD', 'is_active' => true]
        );
    }

    // ─── Frontoffice public form ─────────────────────────────────────────────

    public function test_account_request_form_is_accessible(): void
    {
        $response = $this->get(route('request-account'));
        $response->assertStatus(200);
    }

    public function test_valid_account_request_is_stored(): void
    {
        $response = $this->post(route('request-account.send'), [
            'company_name'  => 'Société ABC',
            'company_email' => 'info@societe-abc.com',
            'contact_name'  => 'Youssef Alami',
            'contact_email' => 'youssef@societe-abc.com',
        ]);

        $response->assertRedirect(route('request-account'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('account_requests', [
            'company_email' => 'info@societe-abc.com',
            'status'        => 'pending',
        ]);
    }

    public function test_duplicate_company_email_is_rejected(): void
    {
        $this->makePendingRequest(['company_email' => 'dup@example.com', 'contact_email' => 'c@example.com']);

        $response = $this->post(route('request-account.send'), [
            'company_name'  => 'Autre Société',
            'company_email' => 'dup@example.com',
            'contact_name'  => 'Ali Idrissi',
            'contact_email' => 'ali@other.com',
        ]);

        $response->assertSessionHasErrors('company_email');
        // Only the first record should exist
        $this->assertDatabaseCount('account_requests', 1);
    }

    public function test_contact_email_already_used_by_tenant_user_is_rejected(): void
    {
        // Create a real tenant user
        $tenant = \App\Models\Tenancy\Tenant::create([
            'name' => 'Existing Tenant', 'slug' => 'existing-t',
            'status' => 'active', 'timezone' => 'UTC', 'default_currency' => 'MAD',
        ]);
        User::factory()->create([
            'tenant_id' => $tenant->id,
            'email'     => 'existing@example.com',
        ]);

        $response = $this->post(route('request-account.send'), [
            'company_name'  => 'New Co',
            'company_email' => 'newco@example.org',
            'contact_name'  => 'Person',
            'contact_email' => 'existing@example.com',
        ]);

        $response->assertSessionHasErrors('contact_email');
    }

    public function test_required_fields_are_validated(): void
    {
        $response = $this->post(route('request-account.send'), []);

        $response->assertSessionHasErrors(['company_name', 'company_email', 'contact_name', 'contact_email']);
    }

    public function test_invalid_sector_value_is_rejected(): void
    {
        $response = $this->post(route('request-account.send'), [
            'company_name'  => 'Co',
            'company_email' => 'co@example.com',
            'contact_name'  => 'X',
            'contact_email' => 'x@example.com',
            'sector'        => 'invalid_sector',
        ]);

        $response->assertSessionHasErrors('sector');
    }

    public function test_invalid_employees_count_is_rejected(): void
    {
        $response = $this->post(route('request-account.send'), [
            'company_name'    => 'Co',
            'company_email'   => 'co2@example.com',
            'contact_name'    => 'X',
            'contact_email'   => 'x2@example.com',
            'employees_count' => '999',
        ]);

        $response->assertSessionHasErrors('employees_count');
    }

    public function test_status_cannot_be_mass_assigned_via_public_form(): void
    {
        $this->post(route('request-account.send'), [
            'company_name'  => 'Hacker Co',
            'company_email' => 'hacker@example.com',
            'contact_name'  => 'H',
            'contact_email' => 'h@example.com',
            'status'        => 'approved',
            'handled_by'    => '00000000-0000-0000-0000-000000000001',
        ]);

        $record = AccountRequest::where('company_email', 'hacker@example.com')->first();
        $this->assertNotNull($record);
        $this->assertSame('pending', $record->status);
        $this->assertNull($record->handled_by);
    }

    // ─── Rate limiting ───────────────────────────────────────────────────────

    public function test_rate_limit_blocks_excessive_submissions(): void
    {
        $payload = [
            'company_name'  => 'Spam Co',
            'company_email' => 'spam@spam.com',
            'contact_name'  => 'Spammer',
            'contact_email' => 'spammer@spam.com',
        ];

        // 5 are allowed; the 6th must be throttled
        for ($i = 0; $i < 5; $i++) {
            $this->post(route('request-account.send'), array_merge($payload, [
                'company_email' => "spam{$i}@spam.com",
                'contact_email' => "spammer{$i}@spam.com",
            ]));
        }

        $response = $this->post(route('request-account.send'), $payload);
        $response->assertStatus(429);
    }

    // ─── SuperAdmin — index & show ───────────────────────────────────────────

    public function test_superadmin_can_list_account_requests(): void
    {
        $admin = $this->createSuperAdmin();
        $this->makePendingRequest();

        $response = $this->actingAs($admin)->get(route('sa.account-requests.index'));
        $response->assertStatus(200);
        $response->assertSee('SARL Test Entreprise');
    }

    public function test_tenant_user_cannot_access_account_requests(): void
    {
        ['user' => $tenantUser] = $this->createTenantWithAdmin();

        $response = $this->actingAs($tenantUser)->get(route('sa.account-requests.index'));
        $response->assertStatus(403);
    }

    public function test_superadmin_can_view_account_request_details(): void
    {
        $admin = $this->createSuperAdmin();
        $req = $this->makePendingRequest();

        $response = $this->actingAs($admin)->get(route('sa.account-requests.show', $req));
        $response->assertStatus(200);
        $response->assertSee('Ahmed Tazi');
    }

    // ─── SuperAdmin — approve ────────────────────────────────────────────────

    public function test_superadmin_can_approve_pending_request(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();
        $plan  = $this->getActivePlan();

        $response = $this->actingAs($admin)->post(route('sa.account-requests.approve', $req), [
            'password' => 'SecurePass123!',
            'plan_id'  => $plan->id,
        ]);

        $response->assertRedirect(route('sa.account-requests.index'));
        $response->assertSessionHas('success');

        $req->refresh();
        $this->assertSame('approved', $req->status);
        $this->assertSame($admin->id, $req->handled_by);

        // Tenant must exist
        $this->assertDatabaseHas('tenants', ['name' => 'SARL Test Entreprise']);

        // User password must be hashed, never stored as plaintext
        $user = User::where('email', 'ahmed.tazi@test-entreprise.com')->first();
        $this->assertNotNull($user);
        $this->assertNotSame('SecurePass123!', $user->password);
        $this->assertTrue(\Illuminate\Support\Facades\Hash::check('SecurePass123!', $user->password));
    }

    public function test_double_approval_is_blocked(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();
        $plan  = $this->getActivePlan();

        // First approval
        $this->actingAs($admin)->post(route('sa.account-requests.approve', $req), [
            'password' => 'SecurePass123!',
            'plan_id'  => $plan->id,
        ]);

        // Second approval attempt
        $response = $this->actingAs($admin)->post(route('sa.account-requests.approve', $req), [
            'password' => 'AnotherPass456!',
            'plan_id'  => $plan->id,
        ]);

        $response->assertRedirect(route('sa.account-requests.index'));
        $response->assertSessionHas('error');

        // Only one tenant must exist
        $this->assertDatabaseCount('tenants', 1);
    }

    public function test_approve_requires_password_and_plan(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();

        $response = $this->actingAs($admin)->post(route('sa.account-requests.approve', $req), []);

        $response->assertSessionHasErrors(['password', 'plan_id']);
    }

    public function test_approve_password_must_be_at_least_8_chars(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();
        $plan  = $this->getActivePlan();

        $response = $this->actingAs($admin)->post(route('sa.account-requests.approve', $req), [
            'password' => 'short',
            'plan_id'  => $plan->id,
        ]);

        $response->assertSessionHasErrors('password');
    }

    // ─── SuperAdmin — reject ─────────────────────────────────────────────────

    public function test_superadmin_can_reject_pending_request(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();

        $response = $this->actingAs($admin)->post(route('sa.account-requests.reject', $req), [
            'admin_notes' => 'Informations insuffisantes.',
        ]);

        $response->assertRedirect(route('sa.account-requests.index'));
        $response->assertSessionHas('success');

        $req->refresh();
        $this->assertSame('rejected', $req->status);
    }

    public function test_double_reject_is_blocked(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();

        $this->actingAs($admin)->post(route('sa.account-requests.reject', $req));

        $response = $this->actingAs($admin)->post(route('sa.account-requests.reject', $req));
        $response->assertSessionHas('error');
    }

    public function test_admin_notes_max_length_is_enforced_on_reject(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();

        $response = $this->actingAs($admin)->post(route('sa.account-requests.reject', $req), [
            'admin_notes' => str_repeat('x', 2001),
        ]);

        $response->assertSessionHasErrors('admin_notes');
    }

    // ─── SuperAdmin — destroy ────────────────────────────────────────────────

    public function test_superadmin_can_delete_rejected_request(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();

        // Reject first
        $this->actingAs($admin)->post(route('sa.account-requests.reject', $req));

        $response = $this->actingAs($admin)->delete(route('sa.account-requests.destroy', $req));
        $response->assertRedirect(route('sa.account-requests.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('account_requests', ['id' => $req->id]);
    }

    public function test_approved_request_cannot_be_deleted(): void
    {
        $admin = $this->createSuperAdmin();
        $req   = $this->makePendingRequest();
        $plan  = $this->getActivePlan();

        $this->actingAs($admin)->post(route('sa.account-requests.approve', $req), [
            'password' => 'SecurePass123!',
            'plan_id'  => $plan->id,
        ]);

        $response = $this->actingAs($admin)->delete(route('sa.account-requests.destroy', $req));
        $response->assertSessionHas('error');

        $this->assertDatabaseHas('account_requests', ['id' => $req->id]);
    }

    public function test_unauthenticated_user_cannot_approve(): void
    {
        $req  = $this->makePendingRequest();
        $plan = $this->getActivePlan();

        $response = $this->post(route('sa.account-requests.approve', $req), [
            'password' => 'SecurePass123!',
            'plan_id'  => $plan->id,
        ]);

        $response->assertRedirect(route('login'));
    }

    public function test_unauthenticated_user_cannot_reject(): void
    {
        $req = $this->makePendingRequest();

        $response = $this->post(route('sa.account-requests.reject', $req));
        $response->assertRedirect(route('login'));
    }

    public function test_search_filter_returns_matching_requests(): void
    {
        $admin = $this->createSuperAdmin();
        $this->makePendingRequest(['company_name' => 'Alpha Corp', 'company_email' => 'alpha@alpha.com', 'contact_email' => 'c@alpha.com']);
        $this->makePendingRequest(['company_name' => 'Beta Ltd',  'company_email' => 'beta@beta.com',   'contact_email' => 'c@beta.com']);

        $response = $this->actingAs($admin)->get(route('sa.account-requests.index', ['search' => 'Alpha']));
        $response->assertStatus(200);
        $response->assertSee('Alpha Corp');
        $response->assertDontSee('Beta Ltd');
    }

    public function test_status_filter_works(): void
    {
        $admin = $this->createSuperAdmin();
        $this->makePendingRequest(['company_email' => 'p@pending.com', 'contact_email' => 'cp@pending.com']);

        $req2 = $this->makePendingRequest(['company_email' => 'r@rejected.com', 'contact_email' => 'cr@rejected.com']);
        $req2->update(['status' => 'rejected', 'handled_by' => $admin->id, 'handled_at' => now()]);

        $response = $this->actingAs($admin)->get(route('sa.account-requests.index', ['status' => 'rejected']));
        $response->assertStatus(200);
        $response->assertSee('r@rejected.com');
        $response->assertDontSee('p@pending.com');
    }
}
