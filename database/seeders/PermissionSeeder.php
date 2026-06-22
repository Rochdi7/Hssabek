<?php

namespace Database\Seeders;

use App\Models\Tenancy\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Permission names MUST match exactly what route middleware expects.
     * Format: {group}.{module}.{action}
     */
    public function run(): void
    {
        $actions = ['view', 'create', 'edit', 'delete'];

        // ─── Grouped permissions with standard CRUD actions ───
        $standardCrud = [
            // CRM
            'crm' => ['customers'],

            // Sales
            'sales' => [
                'invoices',
                'quotes',
                'payments',
                'credit_notes',
                'delivery_challans',
                'refunds',
            ],

            // Purchases (note: hyphens match route middleware)
            'purchases' => [
                'suppliers',
                'purchase-orders',
                'vendor-bills',
                'debit_notes',
                'goods_receipts',
            ],

            // Catalog
            'catalog' => [
                'categories',
                'units',
                'tax_rates',
            ],

            // Inventory
            'inventory' => [
                'products',
                'warehouses',
                'stock_movements',
                'stock_transfers',
            ],

            // Finance
            'finance' => [
                'expenses',
                'incomes',
                'categories',
                'loans',
            ],

            // Pro
            'pro' => [
                'recurring_invoices',
                'invoice_reminders',
                'branches',
            ],

            // Access Control
            'access' => [
                'roles',
                'users',
            ],

            // Settings
            'settings' => [
                'company',
                'localization',
                'invoices',
                'notifications',
                'templates',
                'appearance',
                'payment_methods',
                'security',
                'signatures',
                'currencies',
                'barcode',
                'email_templates',
            ],
        ];

        // Create standard CRUD permissions (view, create, edit, delete)
        foreach ($standardCrud as $group => $modules) {
            foreach ($modules as $module) {
                foreach ($actions as $action) {
                    Permission::firstOrCreate([
                        'name' => "{$group}.{$module}.{$action}",
                        'guard_name' => 'web',
                        'tenant_id' => null,
                    ]);
                }
            }
        }

        // ─── Non-standard permissions (limited actions) ───

        // access.permissions only has view + edit (no create/delete)
        foreach (['view', 'edit'] as $action) {
            Permission::firstOrCreate([
                'name' => "access.permissions.{$action}",
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }

        // supplier_payments has view, create, delete (no edit)
        foreach (['view', 'create', 'delete'] as $action) {
            Permission::firstOrCreate([
                'name' => "purchases.supplier_payments.{$action}",
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }

        // Reports (view-only)
        $reportModules = ['sales', 'customers', 'purchases', 'inventory', 'finance'];
        foreach ($reportModules as $module) {
            Permission::firstOrCreate([
                'name' => "reports.{$module}.view",
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }

        // Rapports Pro (full CRUD + export)
        foreach (['view', 'create', 'edit', 'delete', 'export'] as $action) {
            Permission::firstOrCreate([
                'name' => "pro.rapports.{$action}",
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }

        // Dashboard (view-only)
        Permission::firstOrCreate([
            'name' => 'dashboard.view',
            'guard_name' => 'web',
            'tenant_id' => null,
        ]);

        // Settings — account (view + edit only, personal settings)
        foreach (['view', 'edit'] as $action) {
            Permission::firstOrCreate([
                'name' => "settings.account.{$action}",
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }

        // Settings — plans_billing (view-only)
        Permission::firstOrCreate([
            'name' => 'settings.plans_billing.view',
            'guard_name' => 'web',
            'tenant_id' => null,
        ]);

        // Settings — data export (admin-only)
        // view   = access the export page
        // create = trigger and download an export file
        foreach (['view', 'create'] as $action) {
            Permission::firstOrCreate([
                'name' => "settings.data_export.{$action}",
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);
        }
    }
}
