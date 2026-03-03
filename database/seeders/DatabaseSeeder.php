<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 
    public function run(): void
    {
        $this->call([
            // 1) Plans (global, no tenant FK)
            PlanSeeder::class,

            // 2) Permissions (~120 permission strings)
            PermissionSeeder::class,

            // 3) Roles (super_admin + global role templates)
            RoleSeeder::class,

            // 4) Demo tenant with users, role assignments, subscription (dev only)
            DemoTenantSeeder::class,
        ]);
    }
}
