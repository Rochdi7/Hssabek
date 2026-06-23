# Permissions & Roles Documentation

## System Overview

- **Package:** Spatie Laravel Permission v6.24+
- **Guard:** `web` (session-based)
- **Scope:** Permissions are tenant-scoped (each tenant has its own role instances)

---

## Roles

Default roles created by `RoleSeeder`:

| Role | Purpose | Access Level |
|------|---------|-------------|
| `admin` | Tenant administrator | Full access within tenant |
| `owner` | Business owner | Full access within tenant |
| `accountant` | Financial staff | Finance + invoicing modules |
| `sales` | Sales team | CRM + sales modules |
| `inventory` | Warehouse staff | Inventory modules |
| `viewer` | Read-only | View all, edit nothing |
| `super_admin` | SaaS super admin | Everything (tenant_id = null) |

### Role Bypass Logic (AppServiceProvider)

```php
Gate::before(function ($user, $ability) {
    // Super admin (tenant_id = null) → full access everywhere
    if ($user->tenant_id === null) {
        return true;
    }
    // Tenant admin or owner → full access within their tenant
    if ($user->hasRole(['admin', 'owner'])) {
        return true;
    }
});
```

This means **policies are bypassed entirely** for admins/owners/super_admins.

---

## Permission Naming Convention

```
<module>.<resource>.<action>
```

### Examples

```
sales.invoices.view
sales.invoices.create
sales.invoices.edit
sales.invoices.delete
sales.quotes.view
sales.payments.view
crm.customers.view
crm.customers.create
purchases.suppliers.view
purchases.purchase-orders.create
inventory.warehouses.view
inventory.stock.edit
finance.expenses.view
reports.sales.view
settings.company.edit
users.manage
access.roles.view
access.roles.create
```

### Module List

| Module prefix | Covers |
|--------------|--------|
| `sales.*` | Invoices, Quotes, Payments, Credit Notes, Delivery Challans, Refunds |
| `purchases.*` | Suppliers, POs, Vendor Bills, Goods Receipts, Debit Notes |
| `crm.*` | Customers |
| `inventory.*` | Warehouses, Stock, Transfers, Movements |
| `catalog.*` | Products, Categories, Units, Tax |
| `finance.*` | Expenses, Incomes, Loans, Bank Accounts |
| `reports.*` | All report types |
| `settings.*` | All settings pages |
| `users.*` | User management |
| `access.*` | Roles & permissions |
| `pro.*` | Pro features (branches, recurring invoices) |
| `support.*` | Support tickets |

---

## How Permissions Are Checked

### Via Route Middleware
```php
Route::middleware('permission:sales.invoices.view')
    ->get('/invoices', [InvoiceController::class, 'index']);
```

### Via Policy
```php
// In controller
$this->authorize('view', $invoice);

// Policies registered in AppServiceProvider
Gate::policy(Invoice::class, InvoicePolicy::class);
```

### Via Blade
```blade
@can('sales.invoices.create')
    <a href="{{ route('bo.sales.invoices.create') }}">Nouvelle facture</a>
@endcan
```

---

## Policies

**Location:** `app/Policies/` (33 policy classes)

All policies:
1. Return `false` if the authenticated user does not belong to the same tenant as the resource
2. Check specific permission for the action
3. Are bypassed entirely for admin/owner/super_admin (via `Gate::before`)

### Policy List

```
CustomerPolicy        InvoicePolicy        QuotePolicy
PaymentPolicy         CreditNotePolicy     DeliveryChallanPolicy
RefundPolicy          SupplierPolicy       PurchaseOrderPolicy
VendorBillPolicy      GoodsReceiptPolicy   DebitNotePolicy
SupplierPaymentPolicy ProductPolicy        WarehousePolicy
StockTransferPolicy   StockMovementPolicy  ExpensePolicy
IncomePolicy          LoanPolicy           BankAccountPolicy
TaxCategoryPolicy     TaxGroupPolicy       UnitPolicy
ProductCategoryPolicy TenantPolicy         RecurringInvoicePolicy
InvoiceReminderPolicy BranchPolicy         CustomReportPolicy
UserPolicy
```

---

## Seeder Reference

Run `php artisan db:seed --class=PermissionSeeder` to create all permissions.
Run `php artisan db:seed --class=RoleSeeder` to create roles with permission assignments.

**Important:** `RoleSeeder` must run **after** `PermissionSeeder` as it assigns permissions to roles.

### Role–Permission Matrix (Default)

| Permission Group | admin | owner | accountant | sales | inventory | viewer |
|-----------------|-------|-------|------------|-------|-----------|--------|
| sales.* | ✓ | ✓ | ✓ | ✓ | — | view |
| purchases.* | ✓ | ✓ | ✓ | — | ✓ | view |
| crm.* | ✓ | ✓ | ✓ | ✓ | — | view |
| inventory.* | ✓ | ✓ | — | — | ✓ | view |
| finance.* | ✓ | ✓ | ✓ | — | — | view |
| reports.* | ✓ | ✓ | ✓ | view | view | view |
| settings.* | ✓ | ✓ | — | — | — | — |
| users.* | ✓ | ✓ | — | — | — | — |
| access.* | ✓ | — | — | — | — | — |
