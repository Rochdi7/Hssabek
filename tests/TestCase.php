<?php

namespace Tests;

use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantSetting;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    private static bool $permissionsSeeded = false;

    protected function tearDown(): void
    {
        TenantContext::forget();
        parent::tearDown();
    }

    protected function createTenantWithAdmin(): array
    {
        $tenant = Tenant::create([
            'name' => fake()->company(),
            'slug' => fake()->unique()->slug(2),
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);

        TenantSetting::create([
            'tenant_id' => $tenant->id,
        ]);

        // Create an active subscription so backoffice routes pass EnsureActiveSubscription
        $plan = Plan::firstOrCreate(
            ['code' => 'test-plan'],
            ['name' => 'Test Plan', 'interval' => 'month', 'price' => 0, 'currency' => 'MAD', 'is_active' => true]
        );
        Subscription::create([
            'tenant_id' => $tenant->id,
            'plan_id' => $plan->id,
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => null,
        ]);

        TenantContext::set($tenant);

        $user = User::factory()->create([
            'tenant_id' => $tenant->id,
            'status' => 'active',
        ]);

        $this->seedPermissionsOnce();

        $user->assignRole('admin');

        return ['tenant' => $tenant, 'user' => $user];
    }

    protected function seedPermissionsOnce(): void
    {
        // With RefreshDatabase, the DB is wiped between tests,
        // so we must re-seed every time and reset the Spatie cache.
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\PermissionSeeder']);
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\RoleSeeder']);
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }

    protected function setTenantContext(Tenant $tenant): void
    {
        TenantContext::set($tenant);
    }

    protected function createTenant(string $slug = null): Tenant
    {
        $slug = $slug ?? fake()->unique()->slug(2);

        return Tenant::create([
            'name' => 'Tenant ' . $slug,
            'slug' => $slug,
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
        ]);
    }
}
