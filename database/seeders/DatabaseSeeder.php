<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Dev setup commands (run in order):
     *   php artisan config:clear
     *   php artisan cache:clear
     *   php artisan route:clear
     *   php artisan view:clear
     *   php artisan migrate          (safe — all migrations are idempotent)
     *   php artisan db:seed           (safe — uses firstOrCreate everywhere)
     *
     * For a full reset (DESTROYS ALL DATA):
     *   php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        // Step 1: Run Permission and Role seeders first
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        // Step 2: Create or update default tenant
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

        // Register local development domains for the default tenant
        // This allows testing with both localhost and 127.0.0.1 in local environment
        $localDomains = [
            'localhost',      // Primary domain
            '127.0.0.1',      // Loopback IPv4
            'localhost:8000', // With port (for explicit testing)
            '127.0.0.1:8000', // Loopback with port
        ];

        foreach ($localDomains as $index => $domain) {
            $tenant->domains()->firstOrCreate(
                ['domain' => $domain],
                ['is_primary' => ($index === 0)] // Only first domain is primary
            );
        }

        // Step 3: Create Super Admin user (tenant_id = NULL)
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@facturation.local'],
            [
                'tenant_id' => null, // Super admin has no tenant
                'name' => 'Super Administrator',
                'password' => bcrypt('superadmin123'), // Change in production!
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        // Assign super_admin role to super admin user
        $superAdminRole = Role::where('name', 'super_admin')
            ->where('tenant_id', null)
            ->first();

        if ($superAdminRole) {
            $superAdmin->syncRoles([$superAdminRole]);
        }

        // Step 4: Create Admin Company user (tenant_id = $tenant->id)
        $adminCompany = User::firstOrCreate(
            ['email' => 'admin@localhost.local'],
            [
                'tenant_id' => $tenant->id,
                'name' => 'Company Administrator',
                'password' => bcrypt('admin123'), // Change in production!
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        // Step 5: Create tenant-scoped admin role if it doesn't exist
        $tenantAdminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
            'tenant_id' => $tenant->id,
        ]);

        // Assign all tenant permissions to tenant admin role
        $tenantPermissions = Permission::where('tenant_id', null)->get();
        $tenantAdminRole->syncPermissions($tenantPermissions);

        // Assign admin role to company admin user
        $adminCompany->syncRoles([$tenantAdminRole]);

        // Step 6: Create additional test users for tenant
        $testUser = User::firstOrCreate(
            ['email' => 'rochdi.karouali@glszentrum.com'],
            [
                'tenant_id' => $tenant->id,
                'name' => 'Rochdi Karouali',
                'password' => bcrypt('password'),
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        // Create manager role for tenant
        $managerRole = Role::firstOrCreate([
            'name' => 'manager',
            'guard_name' => 'web',
            'tenant_id' => $tenant->id,
        ]);

        // Assign specific permissions to manager role
        $managerPermissions = Permission::where('tenant_id', null)
            ->whereIn('name', [
                'sales.invoices.view',
                'sales.invoices.create',
                'sales.invoices.edit',
                'crm.customers.view',
                'crm.customers.create',
                'crm.customers.edit',
                'inventory.products.view',
                'inventory.products.create',
                'inventory.products.edit',
                'reports.sales.view',
            ])
            ->get();

        $managerRole->syncPermissions($managerPermissions);
        $testUser->syncRoles([$managerRole]);

        // Step 7: Create another test user
        $testUser2 = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'tenant_id' => $tenant->id,
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'status' => 'active',
                'email_verified_at' => now(),
                'last_login_ip' => '127.0.0.1',
            ]
        );

        // Create receptionist role for tenant
        $receptionistRole = Role::firstOrCreate([
            'name' => 'receptionist',
            'guard_name' => 'web',
            'tenant_id' => $tenant->id,
        ]);

        // Assign specific permissions to receptionist role
        $receptionistPermissions = Permission::where('tenant_id', null)
            ->whereIn('name', [
                'sales.invoices.view',
                'sales.invoices.create',
                'sales.quotes.view',
                'sales.quotes.create',
                'crm.customers.view',
                'crm.customers.create',
                'crm.customer_contacts.view',
                'crm.customer_contacts.create',
            ])
            ->get();

        $receptionistRole->syncPermissions($receptionistPermissions);
        $testUser2->syncRoles([$receptionistRole]);
    }
}
