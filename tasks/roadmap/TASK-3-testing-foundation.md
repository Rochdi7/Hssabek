# TASK 3 -- Testing Foundation (Factories + Critical Path Tests)

**Priority:** P2 -- Must complete before any production deployment
**Estimated effort:** 5-7 days
**Dependency:** Task 2 (database schema must be stable)

---

## Prompt for Claude

You are a senior Laravel test engineer working on a multi-tenant SaaS invoicing platform called "Facturation".

Your task is to complete **TASK 3: Testing Foundation** -- build model factories and write tests for all critical business paths.

### Context

This is a Laravel 12 multi-tenant SaaS app with:
- 84 models but only 1 factory (UserFactory)
- Only 10 tests exist for 450+ PHP files -- essentially zero coverage
- Multi-tenant isolation via `TenantScope` + `BelongsToTenant` + `TenantContext` singleton
- Financial services: InvoiceService, PaymentService, TaxCalculationService, QuoteService, CreditNoteService, StockService, DocumentNumberService
- Spatie Permission for RBAC with 120+ permissions seeded via PermissionSeeder
- All validation messages in French
- UUID primary keys everywhere
- Tests should use SQLite in-memory for speed

### Key Architecture Notes

- `TenantContext::set($tenant)` must be called before any tenant-scoped operation
- `BelongsToTenant` trait auto-sets `tenant_id` on model creation from TenantContext
- `TenantScope` global scope auto-filters queries by current tenant
- SuperAdmin users have `tenant_id === null`
- Permission format: `module.resource.action` (e.g., `sales.invoices.create`)
- Roles: admin (full access), manager, staff, accountant, viewer

### Known Column Name Issues (from MEMORY.md)

- Customer model: column is `type` (NOT `customer_type`), `currency` was dropped, `payment_terms_days` (NOT `payment_terms`)
- DebitNote model: `number` (NOT `debit_note_number`), `total` (NOT `total_amount`), `tax_total` (NOT `tax_amount`)
- **Always verify model `$fillable` against actual migration before writing factories.**

### What You Must Do

Complete ALL subtasks below. This is a large task -- work methodically.
Read existing model files and migrations before writing any factory.
Do NOT guess column names -- verify against the actual migration schema.

---

## Subtask Checklist

### 1. Create base test helper in TestCase

**File:** `tests/TestCase.php`

Add helper methods used across all tests:

```php
protected function createTenantWithAdmin(): array
{
    $tenant = \App\Models\Tenancy\Tenant::create([
        'name' => fake()->company(),
        'slug' => fake()->unique()->slug(2),
        'status' => 'active',
        'timezone' => 'UTC',
        'default_currency' => 'MAD',
    ]);

    \App\Models\Tenancy\TenantDomain::create([
        'tenant_id' => $tenant->id,
        'domain' => fake()->unique()->domainWord() . '.facturation.test',
        'is_primary' => true,
    ]);

    \App\Models\Tenancy\TenantSetting::create([
        'tenant_id' => $tenant->id,
    ]);

    \App\Services\Tenancy\TenantContext::set($tenant);

    $user = \App\Models\User::factory()->create([
        'tenant_id' => $tenant->id,
        'status' => 'active',
    ]);

    // Seed permissions if not already seeded
    $this->seedPermissionsOnce();

    $user->assignRole('admin');

    return ['tenant' => $tenant, 'user' => $user];
}

private static bool $permissionsSeeded = false;

protected function seedPermissionsOnce(): void
{
    if (!self::$permissionsSeeded) {
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\PermissionSeeder']);
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\RoleSeeder']);
        self::$permissionsSeeded = true;
    }
}

protected function setTenantContext(\App\Models\Tenancy\Tenant $tenant): void
{
    \App\Services\Tenancy\TenantContext::set($tenant);
}
```

**Important:** Read the existing `TestCase.php` first -- do not overwrite what's already there. Add these methods alongside existing content.

### 2. Create model factories -- Tenancy & Core

Create these factory files in `database/factories/`:

**For EACH factory:** Read the corresponding model's `$fillable` and the migration file to verify exact column names and types. Use `fake()` helper to generate realistic data.

Factories to create:
- `TenantFactory.php` -- name, slug (unique), status, timezone, default_currency
- `TenantDomainFactory.php` -- tenant_id (from TenantFactory), domain, is_primary
- `TenantSettingFactory.php` -- tenant_id, all JSON settings columns default to `[]`

### 3. Create model factories -- CRM

- `CustomerFactory.php` -- type (individual/company), name, email, phone, tax_id, payment_terms_days, status, notes
- `CustomerAddressFactory.php` -- customer_id, type (billing/shipping), line1, city, region, postal_code, country
- `CustomerContactFactory.php` -- customer_id, name, email, phone, position, is_primary

### 4. Create model factories -- Catalog

- `ProductFactory.php` -- item_type (product/service), name, code (unique), sku, selling_price, purchase_price, track_inventory, quantity, is_active
- `ProductCategoryFactory.php` -- name, slug (unique), is_active
- `UnitFactory.php` -- name, short_name
- `TaxCategoryFactory.php` -- name, rate, type, is_default, is_active
- `TaxGroupFactory.php` -- name, is_active

### 5. Create model factories -- Sales

- `InvoiceFactory.php` -- customer_id, number (sequential), status, issue_date, due_date, currency, enable_tax, subtotal, discount_total, tax_total, total, amount_paid, amount_due
- `InvoiceItemFactory.php` -- invoice_id, label, quantity, unit_price, tax_rate, line_subtotal, line_tax, line_total, position
- `QuoteFactory.php` -- customer_id, number, status, issue_date, expiry_date, currency, enable_tax, subtotal, tax_total, total
- `PaymentFactory.php` -- customer_id, amount, status, payment_date, paid_at
- `PaymentMethodFactory.php` -- name, provider, is_active
- `CreditNoteFactory.php` -- customer_id, invoice_id, number, status, issue_date, enable_tax, subtotal, tax_total, total

### 6. Create model factories -- Purchases

- `SupplierFactory.php` -- name, email, phone, tax_id, payment_terms_days, status
- `PurchaseOrderFactory.php` -- supplier_id, number, status, order_date, expected_date, subtotal, tax_total, total
- `VendorBillFactory.php` -- supplier_id, number, status, issue_date, due_date, subtotal, tax_total, total, amount_paid, amount_due
- `DebitNoteFactory.php` -- supplier_id, number, status, debit_note_date, subtotal, tax_total, total

### 7. Create model factories -- Finance & Inventory

- `BankAccountFactory.php` -- account_holder_name, account_number, bank_name, account_type, currency, opening_balance, current_balance, is_active
- `ExpenseFactory.php` -- expense_number, amount, expense_date, payment_mode, payment_status
- `IncomeFactory.php` -- income_number, amount, income_date, payment_mode
- `FinanceCategoryFactory.php` -- type (expense/income), name, is_active
- `WarehouseFactory.php` -- name, code (unique), address, is_default, is_active
- `LoanFactory.php` -- lender_type, lender_name, principal_amount, interest_rate, total_amount, remaining_balance, start_date, end_date, status

### 8. Create model factories -- Billing

- `PlanFactory.php` -- name, code (unique), interval, price, currency, trial_days, is_active, features (JSON)
- `SubscriptionFactory.php` -- tenant_id, plan_id, status, starts_at, ends_at

### 9. Write tenant isolation tests

**File:** `tests/Feature/Tenancy/TenantIsolationTest.php`

Expand the existing 2 tests to cover ALL major domain models. For each model:
1. Create 2 tenants (A and B)
2. Create a record in tenant B
3. Switch to tenant A context
4. Assert that querying the model returns 0 results (tenant A cannot see tenant B data)

Models to test: Customer, Product, Invoice, Quote, Supplier, PurchaseOrder, Expense, Income, Warehouse, BankAccount, Payment

### 10. Write authentication feature tests

**File:** `tests/Feature/Auth/AuthenticationTest.php`

Test cases:
- `test_user_can_login_with_valid_credentials`
- `test_user_cannot_login_with_invalid_password`
- `test_user_cannot_login_with_nonexistent_email`
- `test_login_is_rate_limited_after_5_attempts` (from Task 1)
- `test_user_can_register`
- `test_registration_validates_required_fields`
- `test_registration_enforces_password_policy`
- `test_user_can_request_password_reset`
- `test_user_can_logout`

### 11. Write permission/authorization tests

**File:** `tests/Feature/Authorization/PermissionTest.php`

Test cases:
- `test_admin_can_access_all_crud_operations`
- `test_viewer_cannot_create_invoice`
- `test_viewer_cannot_delete_customer`
- `test_user_without_permission_gets_403`
- `test_user_can_only_see_own_tenant_data`

### 12. Write InvoiceService unit tests

**File:** `tests/Unit/Services/InvoiceServiceTest.php`

Test cases:
- `test_create_invoice_with_items_calculates_totals_correctly`
- `test_create_invoice_generates_sequential_number`
- `test_update_draft_invoice_recalculates_totals`
- `test_cannot_update_non_draft_invoice`
- `test_transition_draft_to_sent`
- `test_transition_sent_to_paid`
- `test_invalid_transition_throws_exception`
- `test_update_payment_totals_marks_invoice_paid_when_fully_allocated`
- `test_update_payment_totals_marks_invoice_partial_when_partially_allocated`

### 13. Write PaymentService unit tests

**File:** `tests/Unit/Services/PaymentServiceTest.php`

Test cases:
- `test_create_payment_with_single_allocation`
- `test_create_payment_with_multiple_allocations`
- `test_over_allocation_throws_exception`
- `test_payment_updates_invoice_amount_paid`
- `test_delete_payment_reverses_allocations`

### 14. Write TaxCalculationService unit tests

**File:** `tests/Unit/Services/TaxCalculationServiceTest.php`

Test cases:
- `test_calculate_line_item_with_no_discount`
- `test_calculate_line_item_with_percentage_discount`
- `test_calculate_line_item_with_fixed_discount`
- `test_calculate_document_with_multiple_items`
- `test_calculate_document_with_charges`
- `test_zero_tax_rate_produces_zero_tax`
- `test_rounding_to_two_decimals`

### 15. Write StockService unit tests

**File:** `tests/Unit/Services/StockServiceTest.php`

Test cases:
- `test_stock_in_increases_quantity`
- `test_stock_out_decreases_quantity`
- `test_insufficient_stock_throws_exception`
- `test_transfer_between_warehouses`
- `test_stock_movement_creates_audit_record`

### 16. Configure phpunit.xml for optimal test execution

**File:** `phpunit.xml`

Ensure these settings:
```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
<env name="CACHE_STORE" value="array"/>
<env name="QUEUE_CONNECTION" value="sync"/>
<env name="SESSION_DRIVER" value="array"/>
```

---

## Audit Issues Covered by This Task

| # | Issue | Severity | Section |
|---|-------|----------|---------|
| 1 | Near-zero test coverage (10 tests for 450+ files) | CRITICAL | Top 10 Issues #1 |
| 2 | No model factories (only UserFactory) | CRITICAL | Top 10 Issues #3 |
| 3 | Cannot deploy with confidence | CRITICAL | Missing Pieces > Critical |

---

## Definition of Done

- [ ] 25+ model factories exist and `Model::factory()->create()` succeeds for each
- [ ] Tenant isolation tested for 11+ models (Customer, Product, Invoice, Quote, Supplier, PurchaseOrder, Expense, Income, Warehouse, BankAccount, Payment)
- [ ] Auth tests: 9+ tests covering login, register, password reset, rate limiting, logout
- [ ] Permission tests: 5+ tests covering role-based access
- [ ] InvoiceService tests: 9+ tests covering CRUD, transitions, payment totals
- [ ] PaymentService tests: 5+ tests covering allocations, over-allocation, deletion
- [ ] TaxCalculationService tests: 7+ tests covering all calculation scenarios
- [ ] StockService tests: 5+ tests covering stock movements and transfers
- [ ] Total test count: 50+ tests (up from 10)
- [ ] All tests pass: `php artisan test` returns green
- [ ] Test execution time < 120 seconds
- [ ] `phpunit.xml` uses SQLite in-memory + array cache

---

## Files Created

```
tests/TestCase.php                                              (MODIFIED - add helpers)
database/factories/TenantFactory.php                             (NEW)
database/factories/TenantDomainFactory.php                       (NEW)
database/factories/TenantSettingFactory.php                      (NEW)
database/factories/CustomerFactory.php                           (NEW)
database/factories/CustomerAddressFactory.php                    (NEW)
database/factories/CustomerContactFactory.php                    (NEW)
database/factories/ProductFactory.php                            (NEW)
database/factories/ProductCategoryFactory.php                    (NEW)
database/factories/UnitFactory.php                               (NEW)
database/factories/TaxCategoryFactory.php                        (NEW)
database/factories/TaxGroupFactory.php                           (NEW)
database/factories/InvoiceFactory.php                            (NEW)
database/factories/InvoiceItemFactory.php                        (NEW)
database/factories/QuoteFactory.php                              (NEW)
database/factories/PaymentFactory.php                            (NEW)
database/factories/PaymentMethodFactory.php                      (NEW)
database/factories/CreditNoteFactory.php                         (NEW)
database/factories/SupplierFactory.php                           (NEW)
database/factories/PurchaseOrderFactory.php                      (NEW)
database/factories/VendorBillFactory.php                         (NEW)
database/factories/DebitNoteFactory.php                          (NEW)
database/factories/BankAccountFactory.php                        (NEW)
database/factories/ExpenseFactory.php                            (NEW)
database/factories/IncomeFactory.php                             (NEW)
database/factories/FinanceCategoryFactory.php                    (NEW)
database/factories/WarehouseFactory.php                          (NEW)
database/factories/LoanFactory.php                               (NEW)
database/factories/PlanFactory.php                               (NEW)
database/factories/SubscriptionFactory.php                       (NEW)
tests/Feature/Tenancy/TenantIsolationTest.php                    (MODIFIED - expand)
tests/Feature/Auth/AuthenticationTest.php                        (NEW)
tests/Feature/Authorization/PermissionTest.php                   (NEW)
tests/Unit/Services/InvoiceServiceTest.php                       (NEW)
tests/Unit/Services/PaymentServiceTest.php                       (NEW)
tests/Unit/Services/TaxCalculationServiceTest.php                (NEW)
tests/Unit/Services/StockServiceTest.php                         (NEW)
phpunit.xml                                                      (MODIFIED)
```

---

## Risks & Dependencies

- **Column name mismatches:** The project has a history of column name discrepancies between plans and actual migrations. ALWAYS read the migration file before writing a factory.
- **Permission seeding:** Tests that check authorization need permissions seeded. Use `seedPermissionsOnce()` helper to avoid re-seeding on every test.
- **TenantContext:** Must be set via `TenantContext::set($tenant)` before any model operations in tests. Use `createTenantWithAdmin()` helper.
- **Depends on Task 2:** The database schema must be stable (indexes migration applied) before writing tests.
- **Some factories need relationships:** InvoiceFactory needs a Customer. Use `->for()` or create the customer in the factory definition.
- **SoftDeletes models:** Factories for soft-deletable models don't need special handling, but tests should verify `trashed()` behavior.
