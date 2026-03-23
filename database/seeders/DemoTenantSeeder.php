<?php

namespace Database\Seeders;

use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantSetting;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Permission;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Database\Seeder;

/**
 * Seeds a demo tenant with users, roles, and subscription.
 * Intended for local development / staging only.
 */
class DemoTenantSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create or find the demo tenant
        $tenant = Tenant::firstOrCreate(
            ['slug' => 'localhost'],
            [
                'name' => 'Localhost Tenant',
                'status' => 'active',
                'timezone' => 'Africa/Casablanca',
                'default_currency' => 'MAD',
                'has_free_trial' => false,
            ]
        );

        // 2) Create tenant settings
        TenantSetting::firstOrCreate(
            ['tenant_id' => $tenant->id],
            [
                'account_settings' => [
                    'default_currency' => 'MAD',
                    'date_format' => 'dd/MM/yyyy',
                ],
                'company_settings' => [
                    'company_name' => 'Demo Company',
                    'company_email' => 'info@demo.local',
                ],
                'localization_settings' => [
                    'timezone' => 'Africa/Casablanca',
                    'language' => 'fr',
                ],
                'invoice_settings' => [
                    'prefix' => 'INV',
                    'next_number' => 1,
                ],
                'updated_at' => now(),
            ]
        );

        // 4) Create Super Admin user (tenant_id = NULL — no tenant context)
        $superAdmin = User::firstOrCreate(
            ['email' => 'hssabekinfo@gmail.com'],
            [
                'name' => 'Super Administrator',
                'password' => bcrypt(env('DEMO_SA_PASSWORD', 'secret')),
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        // Ensure super admin has no tenant_id (direct assignment bypasses fillable)
        if ($superAdmin->tenant_id !== null) {
            $superAdmin->tenant_id = null;
            $superAdmin->saveQuietly();
        }

        // Assign super_admin role
        $superAdminRole = Role::where('name', 'super_admin')
            ->whereNull('tenant_id')
            ->first();

        if ($superAdminRole) {
            $superAdmin->syncRoles([$superAdminRole]);
        }

        // Set tenant context so BelongsToTenant auto-fills tenant_id for all tenant users below
        TenantContext::set($tenant);

        // 5) Create Company Administrator
        $adminCompany = User::firstOrCreate(
            ['email' => 'admin@localhost.local'],
            [
                'name' => 'Company Administrator',
                'password' => bcrypt(env('DEMO_ADMIN_PASSWORD', 'secret')),
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        // Ensure tenant_id is set (handles already-existing records)
        if (!$adminCompany->tenant_id) {
            $adminCompany->tenant_id = $tenant->id;
            $adminCompany->saveQuietly();
        }

        // Create tenant-scoped admin role
        $tenantAdminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
            'tenant_id' => $tenant->id,
        ]);

        // Assign all permissions to tenant admin
        $allPermissions = Permission::whereNull('tenant_id')->get();
        $tenantAdminRole->syncPermissions($allPermissions);
        $adminCompany->syncRoles([$tenantAdminRole]);

        // 6) Create test manager user
        $testUser = User::firstOrCreate(
            ['email' => 'manager@demo.local'],
            [
                'name' => 'Demo Manager',
                'password' => bcrypt(env('DEMO_USER_PASSWORD', 'secret')),
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        if (!$testUser->tenant_id) {
            $testUser->tenant_id = $tenant->id;
            $testUser->saveQuietly();
        }

        $managerRole = Role::firstOrCreate([
            'name' => 'manager',
            'guard_name' => 'web',
            'tenant_id' => $tenant->id,
        ]);

        $managerPermissions = Permission::whereNull('tenant_id')
            ->whereIn('name', [
                // Dashboard
                'dashboard.view',
                // Sales (full)
                'sales.invoices.view',
                'sales.invoices.create',
                'sales.invoices.edit',
                'sales.invoices.delete',
                'sales.quotes.view',
                'sales.quotes.create',
                'sales.quotes.edit',
                'sales.quotes.delete',
                'sales.credit_notes.view',
                'sales.credit_notes.create',
                'sales.credit_notes.edit',
                'sales.delivery_challans.view',
                'sales.delivery_challans.create',
                'sales.delivery_challans.edit',
                'sales.refunds.view',
                'sales.refunds.create',
                // CRM
                'crm.customers.view',
                'crm.customers.create',
                'crm.customers.edit',
                // Inventory (view + create)
                'inventory.products.view',
                'inventory.products.create',
                'inventory.products.edit',
                'inventory.warehouses.view',
                'inventory.stock_movements.view',
                'inventory.stock_movements.create',
                // Purchases (view + create)
                'purchases.suppliers.view',
                'purchases.suppliers.create',
                'purchases.purchase-orders.view',
                'purchases.purchase-orders.create',
                'purchases.vendor-bills.view',
                'purchases.vendor-bills.create',
                // Finance (view + create)
                'finance.bank_accounts.view',
                'finance.expenses.view',
                'finance.expenses.create',
                'finance.incomes.view',
                'finance.incomes.create',
                'finance.categories.view',
                // Reports (all)
                'reports.sales.view',
                'reports.customers.view',
                'reports.purchases.view',
                'reports.inventory.view',
                'reports.finance.view',
            ])
            ->get();

        $managerRole->syncPermissions($managerPermissions);
        $testUser->syncRoles([$managerRole]);

        // 7) Create test receptionist user
        $testUser2 = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt(env('DEMO_USER_PASSWORD', 'secret')),
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        if (!$testUser2->tenant_id) {
            $testUser2->tenant_id = $tenant->id;
            $testUser2->saveQuietly();
        }

        $receptionistRole = Role::firstOrCreate([
            'name' => 'receptionist',
            'guard_name' => 'web',
            'tenant_id' => $tenant->id,
        ]);

        $receptionistPermissions = Permission::whereNull('tenant_id')
            ->whereIn('name', [
                'dashboard.view',
                'sales.invoices.view',
                'sales.invoices.create',
                'sales.quotes.view',
                'sales.quotes.create',
                'crm.customers.view',
                'crm.customers.create',
                'inventory.products.view',
                'reports.sales.view',
            ])
            ->get();

        $receptionistRole->syncPermissions($receptionistPermissions);
        $testUser2->syncRoles([$receptionistRole]);

        // Clear tenant context after seeding
        TenantContext::forget();

        // 8) Assign Free plan subscription to demo tenant
        $freePlan = Plan::where('code', 'free')->first();

        if ($freePlan) {
            Subscription::firstOrCreate(
                ['tenant_id' => $tenant->id],
                [
                    'plan_id' => $freePlan->id,
                    'status' => 'active',
                    'starts_at' => now(),
                    'ends_at' => null,
                ]
            );
        }
    }
}
