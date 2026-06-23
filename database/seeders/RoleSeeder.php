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
            'comptable' => 'Comptable : gestion complète des documents financiers, lecture seule sur le reste',
            'receptionist' => 'Receptionist with view/create on sales and customers',
            'viewer' => 'Viewer with read-only access',
        ];

        $tenantPermissions = Permission::where('tenant_id', null)->get();

        // Explicit permission set for the "comptable" (accountant) role.
        // Designed so an accountant has FULL CRUD on financial documents,
        // contextual write access where it's needed to do accounting work
        // (customers/suppliers for invoicing/billing), and read-only access
        // everywhere else. No access to roles/users/permissions or company-
        // wide settings administration.
        $comptablePermissions = [
            // Dashboard
            'dashboard.view',

            // Sales — full CRUD on accounting documents
            'sales.invoices.view', 'sales.invoices.create', 'sales.invoices.edit', 'sales.invoices.delete',
            'sales.quotes.view', 'sales.quotes.create', 'sales.quotes.edit', 'sales.quotes.delete',
            'sales.payments.view', 'sales.payments.create', 'sales.payments.edit', 'sales.payments.delete',
            'sales.credit_notes.view', 'sales.credit_notes.create', 'sales.credit_notes.edit', 'sales.credit_notes.delete',
            'sales.refunds.view', 'sales.refunds.create', 'sales.refunds.edit', 'sales.refunds.delete',
            // Sales — delivery challans are logistics, read-only
            'sales.delivery_challans.view',

            // CRM — needs to create/edit customers to issue documents
            'crm.customers.view', 'crm.customers.create', 'crm.customers.edit',

            // Purchases — full CRUD on financial documents
            'purchases.vendor-bills.view', 'purchases.vendor-bills.create', 'purchases.vendor-bills.edit', 'purchases.vendor-bills.delete',
            'purchases.debit_notes.view', 'purchases.debit_notes.create', 'purchases.debit_notes.edit', 'purchases.debit_notes.delete',
            'purchases.supplier_payments.view', 'purchases.supplier_payments.create', 'purchases.supplier_payments.edit', 'purchases.supplier_payments.delete',
            // Purchases — needs to add/edit suppliers for bills
            'purchases.suppliers.view', 'purchases.suppliers.create', 'purchases.suppliers.edit',
            // Purchases — operational docs, read-only
            'purchases.purchase-orders.view',
            'purchases.goods_receipts.view',
            'purchases.supplier_payment_methods.view',

            // Finance — full CRUD (core accountant domain)
            'finance.expenses.view', 'finance.expenses.create', 'finance.expenses.edit', 'finance.expenses.delete',
            'finance.incomes.view', 'finance.incomes.create', 'finance.incomes.edit', 'finance.incomes.delete',
            'finance.categories.view', 'finance.categories.create', 'finance.categories.edit', 'finance.categories.delete',
            'finance.loans.view', 'finance.loans.create', 'finance.loans.edit', 'finance.loans.delete',
            'finance.bank_accounts.view', 'finance.bank_accounts.create', 'finance.bank_accounts.edit', 'finance.bank_accounts.delete',

            // Catalog — referenced on documents, read-only
            'catalog.categories.view',
            'catalog.units.view',
            'catalog.tax_rates.view',

            // Inventory — read-only context
            'inventory.products.view',
            'inventory.warehouses.view',
            'inventory.stock_movements.view',
            'inventory.stock_transfers.view',

            // Reports — full read access (accountant needs all financial reporting)
            'reports.sales.view',
            'reports.customers.view',
            'reports.purchases.view',
            'reports.finance.view',
            'reports.inventory.view',

            // Pro — custom reports: view, generate, export
            'pro.rapports.view', 'pro.rapports.create', 'pro.rapports.export',

            // Settings — read-only on the bits relevant to documents
            'settings.invoices.view',
            'settings.currencies.view',
        ];

        foreach ($globalRoles as $roleName => $description) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
                'tenant_id' => null,
            ]);

            match ($roleName) {
                'admin' => $role->syncPermissions($tenantPermissions),
                'manager' => $role->syncPermissions(
                    $tenantPermissions->filter(fn ($p) => !str_starts_with($p->name, 'access.') && !str_starts_with($p->name, 'settings.'))
                ),
                'accountant' => $role->syncPermissions(
                    $tenantPermissions->filter(fn ($p) => str_starts_with($p->name, 'finance.') || str_starts_with($p->name, 'sales.') || str_starts_with($p->name, 'purchases.') || str_starts_with($p->name, 'catalog.') || str_starts_with($p->name, 'reports.') || $p->name === 'dashboard.view')
                ),
                'comptable' => $role->syncPermissions(
                    $tenantPermissions->filter(fn ($p) => in_array($p->name, $comptablePermissions, true))
                ),
                'receptionist' => $role->syncPermissions(
                    $tenantPermissions->filter(fn ($p) => (str_starts_with($p->name, 'sales.') || str_starts_with($p->name, 'crm.')) && (str_ends_with($p->name, '.view') || str_ends_with($p->name, '.create')))
                ),
                'viewer' => $role->syncPermissions(
                    $tenantPermissions->filter(fn ($p) => str_ends_with($p->name, '.view'))
                ),
                default => null,
            };
        }
    }
}
