<?php

namespace Database\Seeders;

use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define all permissions with their groups and modules
        $permissions = [
            // Sales
            'sales' => ['invoices', 'quotes', 'credit_notes', 'delivery_challans'],
            // CRM
            'crm' => ['customers', 'customer_contacts'],
            // Inventory
            'inventory' => ['products', 'stock_movements', 'warehouses'],
            // Purchases
            'purchases' => ['suppliers', 'purchase_orders', 'vendor_bills', 'debit_notes'],
            // Finance & Accounts
            'finance' => ['expenses', 'incomes', 'bank_accounts', 'loans'],
            // Reports
            'reports' => ['sales', 'purchases', 'inventory', 'finance', 'loans'],
            // Settings
            'settings' => ['account', 'company', 'localization', 'invoices', 'notifications', 'templates'],
            // Access Control
            'access' => ['roles', 'permissions', 'users'],
        ];

        $actions = ['view', 'create', 'edit', 'delete'];

        // Create global permissions (tenant_id = NULL)
        foreach ($permissions as $group => $modules) {
            foreach ($modules as $module) {
                foreach ($actions as $action) {
                    Permission::firstOrCreate([
                        'name' => "{$group}.{$module}.{$action}",
                        'guard_name' => 'web',
                        'tenant_id' => null, // Global permission
                    ]);
                }
            }
        }
    }
}
