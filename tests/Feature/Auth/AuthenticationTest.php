<?php

namespace Tests\Feature\Auth;

use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantDomain;
use App\Models\Tenancy\TenantSetting;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;
    private string $domain;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::create([
            'name' => 'Test Corp',
            'slug' => 'test-auth',
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);

        $this->domain = 'auth-test.facturation.test';

        TenantDomain::create([
            'tenant_id' => $this->tenant->id,
            'domain' => $this->domain,
            'is_primary' => true,
        ]);

        TenantSetting::create([
            'tenant_id' => $this->tenant->id,
        ]);

        TenantContext::set($this->tenant);

        // Force URL root to tenant domain so test HTTP calls
        // resolve the correct host in the middleware
        URL::forceRootUrl('http://' . $this->domain);
    }

    private function createTenantUser(array $overrides = []): User
    {
        return User::factory()->create(array_merge([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
            'email_verified_at' => now(),
        ], $overrides));
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $this->createTenantUser(['email' => 'john@test.com']);

        $response = $this->post('/login', [
            'email' => 'john@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $this->assertAuthenticated();
    }

    public function test_user_cannot_login_with_invalid_password(): void
    {
        $this->createTenantUser(['email' => 'jane@test.com']);

        $response = $this->post('/login', [
            'email' => 'jane@test.com',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_cannot_login_with_nonexistent_email(): void
    {
        $response = $this->post('/login', [
            'email' => 'nobody@test.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_is_rate_limited_after_5_attempts(): void
    {
        $this->createTenantUser(['email' => 'rate@test.com']);

        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => 'rate@test.com',
                'password' => 'wrong-password',
            ]);
        }

        $response = $this->post('/login', [
            'email' => 'rate@test.com',
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(429);
    }

    public function test_user_can_register(): void
    {
        config(['auth.registration_enabled' => true]);

        $this->post('/register', [
            'name' => 'New User',
            'email' => 'newuser@test.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'newuser@test.com',
            'tenant_id' => $this->tenant->id,
        ]);
    }

    public function test_registration_validates_required_fields(): void
    {
        config(['auth.registration_enabled' => true]);

        $response = $this->post('/register', []);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_registration_enforces_password_policy(): void
    {
        config(['auth.registration_enabled' => true]);

        $response = $this->post('/register', [
            'name' => 'Weak Pass User',
            'email' => 'weak@test.com',
            'password' => '123',
            'password_confirmation' => '123',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_user_can_request_password_reset(): void
    {
        $this->createTenantUser(['email' => 'reset@test.com']);

        $response = $this->post('/forgot-password', [
            'email' => 'reset@test.com',
        ]);

        $response->assertSessionDoesntHaveErrors();
    }

    public function test_user_can_logout(): void
    {
        $user = $this->createTenantUser();
        $this->actingAs($user);

        $this->post('/logout');

        $this->assertGuest();
    }
}
