<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            // 1) Plans (global, no tenant FK)
            // PlanSeeder::class,

            // 2) Permissions (~120 permission strings)
            PermissionSeeder::class,

            // 3) Roles (super_admin + global role templates)
            RoleSeeder::class,

            // 4) Demo tenant with users, role assignments, subscription (dev only)
            DemoTenantSeeder::class,

            // 5) Template catalog (global templates)
            TemplateCatalogSeeder::class,

            // 6) Finance categories for all tenants
            FinanceCategorySeeder::class,

            // 7) Default production data (units, payment methods, taxes, sequences, currencies, etc.)
            TenantDefaultsSeeder::class,

            // 8) Fake data for all CRUD operations (customers, products, invoices, etc.)
            // FakeDataSeeder::class,
        ]);
    }
}
