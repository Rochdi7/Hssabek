<?php

namespace Database\Seeders;

use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Tenant;
use Illuminate\Database\Seeder;

/**
 * Creates the "comptable" role for every tenant that doesn't already have it.
 * Safe to re-run on production: uses firstOrCreate + syncPermissions (idempotent).
 * Does NOT touch users, passwords, subscriptions, or any other data.
 */
class ComptableRoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissionNames = [
            'dashboard.view',
            // Sales — full CRUD on accounting documents
            'sales.invoices.view', 'sales.invoices.create', 'sales.invoices.edit', 'sales.invoices.delete',
            'sales.quotes.view', 'sales.quotes.create', 'sales.quotes.edit', 'sales.quotes.delete',
            'sales.payments.view', 'sales.payments.create', 'sales.payments.edit', 'sales.payments.delete',
            'sales.credit_notes.view', 'sales.credit_notes.create', 'sales.credit_notes.edit', 'sales.credit_notes.delete',
            'sales.refunds.view', 'sales.refunds.create', 'sales.refunds.edit', 'sales.refunds.delete',
            'sales.delivery_challans.view',
            // CRM — create/edit customers for invoicing, no delete
            'crm.customers.view', 'crm.customers.create', 'crm.customers.edit',
            // Purchases — full CRUD on financial documents
            'purchases.vendor-bills.view', 'purchases.vendor-bills.create', 'purchases.vendor-bills.edit', 'purchases.vendor-bills.delete',
            'purchases.debit_notes.view', 'purchases.debit_notes.create', 'purchases.debit_notes.edit', 'purchases.debit_notes.delete',
            'purchases.supplier_payments.view', 'purchases.supplier_payments.create', 'purchases.supplier_payments.edit', 'purchases.supplier_payments.delete',
            'purchases.suppliers.view', 'purchases.suppliers.create', 'purchases.suppliers.edit',
            'purchases.purchase-orders.view', 'purchases.goods_receipts.view', 'purchases.supplier_payment_methods.view',
            // Finance — full CRUD (core accountant domain)
            'finance.expenses.view', 'finance.expenses.create', 'finance.expenses.edit', 'finance.expenses.delete',
            'finance.incomes.view', 'finance.incomes.create', 'finance.incomes.edit', 'finance.incomes.delete',
            'finance.categories.view', 'finance.categories.create', 'finance.categories.edit', 'finance.categories.delete',
            'finance.loans.view', 'finance.loans.create', 'finance.loans.edit', 'finance.loans.delete',
            'finance.bank_accounts.view', 'finance.bank_accounts.create', 'finance.bank_accounts.edit', 'finance.bank_accounts.delete',
            // Catalog & Inventory — read-only context
            'catalog.categories.view', 'catalog.units.view', 'catalog.tax_rates.view',
            'inventory.products.view', 'inventory.warehouses.view', 'inventory.stock_movements.view', 'inventory.stock_transfers.view',
            // Reports — full read access
            'reports.sales.view', 'reports.customers.view', 'reports.purchases.view', 'reports.finance.view', 'reports.inventory.view',
            // Pro reports — view, generate, export
            'pro.rapports.view', 'pro.rapports.create', 'pro.rapports.export',
            // Settings — read-only on document-relevant settings
            'settings.invoices.view', 'settings.currencies.view',
        ];

        // Load global permissions once
        $permissions = Permission::whereNull('tenant_id')
            ->whereIn('name', $permissionNames)
            ->get();

        // Create the role for every existing tenant
        Tenant::all()->each(function (Tenant $tenant) use ($permissions) {
            $role = Role::firstOrCreate([
                'name'       => 'comptable',
                'guard_name' => 'web',
                'tenant_id'  => $tenant->id,
            ]);

            $role->syncPermissions($permissions);

            $this->command->getOutput()->writeln(
                "  <info>✓</info> comptable role synced for tenant: <comment>{$tenant->name}</comment>"
            );
        });
    }
}
