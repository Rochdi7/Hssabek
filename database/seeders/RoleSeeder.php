<?php

namespace Database\Seeders;

use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin role (global, tenant_id = NULL)
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'web',
            'tenant_id' => null,
        ]);

        // Assign all global permissions to super admin
        $allPermissions = Permission::where('tenant_id', null)->get();
        $superAdminRole->syncPermissions($allPermissions);

        // Create global roles that will be copied for each tenant
        $globalRoles = [
            'admin' => 'Administrator with full access to tenant features',
            'manager' => 'Manager with CRUD on most modules',
            'accountant' => 'Accountant with access to finance and invoices',
            'receptionist' => 'Receptionist with view/create on sales and customers',
            'viewer' => 'Viewer with read-only access',
        ];

        foreach ($globalRoles as $roleName => $description) {
            Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }
    }
}
