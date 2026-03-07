# TASK 2 -- Database Performance & Production Readiness

**Priority:** P1 -- Must complete before any real tenant data enters the system
**Estimated effort:** 2-3 days
**Dependency:** None (can run in parallel with Task 1)

---

## Prompt for Claude

You are a senior Laravel database architect working on a multi-tenant SaaS invoicing platform called "Facturation".

Your task is to complete **TASK 2: Database Performance & Production Readiness**.

### Context

This is a Laravel 12 multi-tenant SaaS app with:
- 88 migration files, 84 models, UUID primary keys everywhere
- Single-database shared-schema multi-tenancy with `tenant_id` on all domain tables
- `.env.example` defaults to SQLite -- not viable for production
- `DocumentNumberService` uses `lockForUpdate()` requiring proper transaction isolation
- `ReportService` caches queries for 5 minutes but has NO cache invalidation on writes
- `PlanLimitService` queries the database on EVERY middleware hit (no caching)
- 9 missing indexes identified on high-traffic query paths
- 5 controllers have N+1 query patterns
- Report queries accept unbounded date ranges
- Financial columns use `decimal(12,2)` -- insufficient for 3-decimal currencies

### What You Must Do

Complete ALL subtasks below, in order. After each subtask, verify it works.
Do NOT skip any subtask. Do NOT add features beyond what is listed.

---

## Subtask Checklist

### 1. Create migration for 9 missing database indexes

**File to create:** `database/migrations/2026_03_07_000001_add_missing_performance_indexes.php`

Create a single migration that adds these indexes:

```php
public function up(): void
{
    Schema::table('expenses', function (Blueprint $table) {
        $table->index(['tenant_id', 'expense_date']);
    });

    Schema::table('incomes', function (Blueprint $table) {
        $table->index(['tenant_id', 'income_date']);
    });

    Schema::table('stock_movements', function (Blueprint $table) {
        $table->index(['tenant_id', 'created_at']);
    });

    Schema::table('products', function (Blueprint $table) {
        $table->index(['tenant_id', 'is_active']);
    });

    Schema::table('supplier_payment_allocations', function (Blueprint $table) {
        $table->index('vendor_bill_id');
    });

    Schema::table('payment_allocations', function (Blueprint $table) {
        $table->index('invoice_id');
    });

    Schema::table('credit_note_applications', function (Blueprint $table) {
        $table->index('invoice_id');
    });

    Schema::table('loan_installments', function (Blueprint $table) {
        $table->index(['loan_id', 'status']);
    });

    Schema::table('email_logs', function (Blueprint $table) {
        $table->index(['tenant_id', 'created_at']);
    });
}
```

Include a proper `down()` method that drops all 9 indexes.

**Verify:** Run `php artisan migrate` and confirm it succeeds without errors.

### 2. Fix N+1 queries in 5 controllers

**Problem:** These controllers query models in index methods without eager loading relationships accessed in Blade views.

**Fix each file:**

**a) `app/Http/Controllers/Backoffice/Catalog/ProductController.php`**
In the `index()` method, find the query (e.g., `Product::query()...`) and add `->with('category', 'unit')`.

**b) `app/Http/Controllers/Backoffice/Finance/ExpenseController.php`**
In `index()`, add `->with('category', 'supplier', 'bankAccount')`.

**c) `app/Http/Controllers/Backoffice/Finance/IncomeController.php`**
In `index()`, add `->with('category', 'customer', 'bankAccount')`.

**d) `app/Http/Controllers/Backoffice/Inventory/StockMovementController.php`**
In `index()`, add `->with('product', 'warehouse', 'createdBy')`.

**e) `app/Http/Controllers/Backoffice/Finance/LoanController.php`**
In `index()`, add `->withCount('installments')` (or `->with('installments')` if the view accesses the collection).

**Important:** Read each controller's `index()` method AND corresponding Blade view FIRST to verify which relationships are actually accessed in the template. Only add eager loading for relationships that are used.

### 3. Update `.env.example` for production database defaults

**File:** `.env.example`

Change the database defaults from SQLite to MySQL/PostgreSQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=facturation
DB_USERNAME=root
DB_PASSWORD=
```

Keep the SQLite lines commented out as an alternative:
```env
# DB_CONNECTION=sqlite
# DB_DATABASE=database/database.sqlite
```

Also update cache, queue, and session drivers to indicate Redis is recommended for production:
```env
CACHE_STORE=database
QUEUE_CONNECTION=database
SESSION_DRIVER=database
# For production, use Redis:
# CACHE_STORE=redis
# QUEUE_CONNECTION=redis
# SESSION_DRIVER=redis
```

### 4. Add cache invalidation for ReportService

**File:** `app/Services/Reports/ReportService.php`

**Problem:** Report queries are cached for 5 minutes with NO invalidation. When a user creates an invoice, the dashboard shows stale data.

**Fix:**
1. Read the existing ReportService to understand the current caching pattern.
2. Create a public static method `flushTenantCache(?string $tenantId = null)` that clears all report-related cache keys for a tenant:
   ```php
   public static function flushTenantCache(?string $tenantId = null): void
   {
       $tenantId = $tenantId ?? TenantContext::id();
       if (!$tenantId) return;

       $prefixes = ['report:sales', 'report:customer', 'report:purchase', 'report:finance', 'report:inventory', 'dashboard:kpis'];
       foreach ($prefixes as $prefix) {
           // Clear cache keys matching this tenant
           Cache::forget("{$prefix}:{$tenantId}");
       }
   }
   ```
3. Identify the exact cache key patterns used in each method (salesSummary, customerSummary, etc.) by reading the code. The flush method must target the exact same key format.
4. Call `self::flushTenantCache()` at the end of any service method that modifies data, OR better: create a simple method that controllers can call after creating/updating/deleting records.

**Then** add cache flush calls in these controllers (after successful create/update/delete operations):
- `app/Http/Controllers/Backoffice/Sales/InvoiceController.php`
- `app/Http/Controllers/Backoffice/Sales/PaymentController.php`
- `app/Http/Controllers/Backoffice/Sales/CreditNoteController.php`
- `app/Http/Controllers/Backoffice/Sales/QuoteController.php`
- `app/Http/Controllers/Backoffice/Finance/ExpenseController.php`
- `app/Http/Controllers/Backoffice/Finance/IncomeController.php`
- `app/Http/Controllers/Backoffice/DashboardController.php` (if it caches)

Add this line after successful store/update/destroy redirects:
```php
\App\Services\Reports\ReportService::flushTenantCache();
```

**Important:** Read ReportService first to see the exact cache key format. The flush must match exactly.

### 5. Add caching to PlanLimitService

**File:** `app/Services/Billing/PlanLimitService.php`

**Problem:** `CheckPlanLimit` middleware calls `PlanLimitService->canCreate()` on every resource creation route. This queries the subscription table + counts resources every time.

**Fix:**
1. Read the existing PlanLimitService.
2. Cache the `getActivePlan()` result per tenant for 5 minutes:
   ```php
   public function getActivePlan(): ?Plan
   {
       $tenantId = TenantContext::id();
       if (!$tenantId) return null;

       return Cache::remember("plan:active:{$tenantId}", 300, function () {
           // existing query logic
       });
   }
   ```
3. Add a `flushPlanCache(?string $tenantId = null)` method:
   ```php
   public static function flushPlanCache(?string $tenantId = null): void
   {
       $tenantId = $tenantId ?? TenantContext::id();
       if ($tenantId) {
           Cache::forget("plan:active:{$tenantId}");
       }
   }
   ```
4. Call `PlanLimitService::flushPlanCache()` in `SubscriptionController` (SuperAdmin) when a subscription is created/updated.

### 6. Add date range validation to ReportService

**File:** `app/Services/Reports/ReportService.php`

**Problem:** Report methods accept unbounded date ranges. A user could request a 10-year report causing expensive full-table scans.

**Fix:** Add a private validation method:
```php
private function validateDateRange(?string $from, ?string $to): array
{
    $from = $from ? Carbon::parse($from) : Carbon::now()->startOfMonth();
    $to = $to ? Carbon::parse($to) : Carbon::now()->endOfMonth();

    // Limit range to 366 days maximum
    if ($from->diffInDays($to) > 366) {
        $from = $to->copy()->subDays(366);
    }

    return [$from, $to];
}
```

Call this at the start of `salesSummary()`, `customerSummary()`, `purchaseSummary()`, `financeSummary()`, and any other method that accepts date ranges.

### 7. Create migration for CHECK constraints on financial amounts

**File to create:** `database/migrations/2026_03_07_000002_add_check_constraints_to_financial_tables.php`

Add CHECK constraints to prevent negative values on critical financial columns. Use raw DB statements since Laravel's schema builder doesn't support CHECK constraints natively:

```php
public function up(): void
{
    // Only apply on MySQL/PostgreSQL, skip SQLite
    if (in_array(DB::getDriverName(), ['mysql', 'pgsql'])) {
        DB::statement('ALTER TABLE invoices ADD CONSTRAINT chk_invoices_total CHECK (total >= 0)');
        DB::statement('ALTER TABLE invoices ADD CONSTRAINT chk_invoices_amount_due CHECK (amount_due >= 0)');
        DB::statement('ALTER TABLE invoices ADD CONSTRAINT chk_invoices_amount_paid CHECK (amount_paid >= 0)');
        DB::statement('ALTER TABLE payments ADD CONSTRAINT chk_payments_amount CHECK (amount >= 0)');
        DB::statement('ALTER TABLE vendor_bills ADD CONSTRAINT chk_vendor_bills_total CHECK (total >= 0)');
        DB::statement('ALTER TABLE vendor_bills ADD CONSTRAINT chk_vendor_bills_amount_due CHECK (amount_due >= 0)');
        DB::statement('ALTER TABLE credit_notes ADD CONSTRAINT chk_credit_notes_total CHECK (total >= 0)');
        DB::statement('ALTER TABLE expenses ADD CONSTRAINT chk_expenses_amount CHECK (amount >= 0)');
    }
}
```

Include `down()` that drops these constraints (also guarded by driver check).

**Note:** Wrap in driver check so SQLite (used for testing) is not affected.

---

## Audit Issues Covered by This Task

From `project_architecture_audit.md`:

| # | Issue | Severity | Section |
|---|-------|----------|---------|
| 1 | SQLite as default database | CRITICAL | Performance > Database Performance |
| 2 | 9 missing database indexes | HIGH | Database > Index Audit |
| 3 | No cache invalidation on writes | HIGH | Performance > Caching Strategy |
| 4 | N+1 queries in 5+ controllers | HIGH | Performance > N+1 Query Analysis |
| 5 | PlanLimitService queries DB every hit | MEDIUM | Performance > Caching Strategy |
| 6 | Report queries unbounded date range | MEDIUM | Performance > Database Performance |
| 7 | No CHECK constraints on amounts | LOW | Database > Schema Design Issues |

---

## Definition of Done

- [ ] Migration with 9 indexes runs successfully: `php artisan migrate`
- [ ] N+1 fixed: ProductController index loads category+unit in single query
- [ ] N+1 fixed: ExpenseController index loads category+supplier+bankAccount
- [ ] N+1 fixed: IncomeController index loads category+customer+bankAccount
- [ ] N+1 fixed: StockMovementController index loads product+warehouse+createdBy
- [ ] N+1 fixed: LoanController index loads installments count
- [ ] `.env.example` defaults to MySQL, SQLite commented out
- [ ] ReportService has `flushTenantCache()` method
- [ ] Dashboard/report cache flushed after creating an invoice (verified manually)
- [ ] PlanLimitService caches active plan for 5 minutes
- [ ] Report requests with range > 366 days are clamped
- [ ] CHECK constraint migration runs on MySQL/PostgreSQL, skips SQLite
- [ ] All existing tests still pass: `php artisan test`

---

## Files Likely Modified

```
database/migrations/2026_03_07_000001_add_missing_performance_indexes.php        (NEW)
database/migrations/2026_03_07_000002_add_check_constraints_to_financial_tables.php (NEW)
app/Http/Controllers/Backoffice/Catalog/ProductController.php                     (eager loading)
app/Http/Controllers/Backoffice/Finance/ExpenseController.php                     (eager loading)
app/Http/Controllers/Backoffice/Finance/IncomeController.php                      (eager loading)
app/Http/Controllers/Backoffice/Inventory/StockMovementController.php             (eager loading)
app/Http/Controllers/Backoffice/Finance/LoanController.php                        (eager loading)
.env.example                                                                      (DB defaults)
app/Services/Reports/ReportService.php                                            (cache flush + date validation)
app/Services/Billing/PlanLimitService.php                                         (add caching)
app/Http/Controllers/Backoffice/Sales/InvoiceController.php                       (flush cache)
app/Http/Controllers/Backoffice/Sales/PaymentController.php                       (flush cache)
app/Http/Controllers/Backoffice/Sales/CreditNoteController.php                    (flush cache)
app/Http/Controllers/Backoffice/Sales/QuoteController.php                         (flush cache)
app/Http/Controllers/Backoffice/Finance/ExpenseController.php                     (flush cache)
app/Http/Controllers/Backoffice/Finance/IncomeController.php                      (flush cache)
```

---

## Risks & Dependencies

- CHECK constraint migration must be guarded for SQLite (tests use SQLite in-memory).
- Cache invalidation uses `Cache::forget()` which works with database driver. If cache tags are needed later (Redis), the pattern can be upgraded in Task 5.
- N+1 fixes require reading the Blade views to confirm which relationships are accessed. Do NOT add eager loading for relationships not used in the view.
- Date range clamping should use `Carbon::parse()` with try-catch for invalid date strings.
- PostgreSQL/MySQL migration testing: run `php artisan migrate:fresh` on the target DB to verify all 88+ migrations work.
