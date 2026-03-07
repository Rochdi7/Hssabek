# Project Architecture Audit

**Project:** Facturation SaaS — Multi-Tenant Invoicing Platform
**Framework:** Laravel 12.20.0 / PHP 8.2+
**Audit Date:** 2026-03-06
**Auditor:** Architecture Audit Agent (Claude Opus 4.6)

---

## Executive Summary

Facturation is a **multi-tenant SaaS invoicing platform** built on Laravel 12, targeting small-to-medium businesses in French-speaking markets. The codebase covers 10+ business domains (CRM, Sales, Purchases, Inventory, Finance, Billing, Pro features) with 84 Eloquent models, 77 controllers, 103 form requests, 31 authorization policies, and 160+ Blade views.

**Overall Assessment: 7.2/10 — Solid Foundation with Notable Gaps**

### Key Strengths
- Well-designed multi-tenant isolation (TenantScope + BelongsToTenant + policies)
- Clean service layer for financial operations (tax calculation, payments, document numbering)
- Comprehensive permission system with 120+ granular permissions
- Strong schema design with proper foreign keys, indexes, and composite constraints
- Consistent domain-driven folder organization

### Critical Concerns
- **Test coverage is dangerously low** (~10 tests for 450+ PHP files)
- **No factories** for 83 of 84 models (only UserFactory exists)
- **No API layer** despite Laravel Sanctum being installed
- **No cache invalidation** strategy (stale reports for 5 minutes)
- **Fat controllers** in ~45% of controllers (business logic embedded)
- **No rate limiting** on sensitive operations
- **SQLite in production config** (`.env.example` defaults)

---

## Architecture Review

### Multi-Tenant Strategy

**Pattern:** Single-database, shared-schema with `tenant_id` column
**Resolution:** Domain-based via `IdentifyTenantByDomain` middleware
**Isolation:** Global scope (`TenantScope`) + `BelongsToTenant` trait
**SuperAdmin:** Users with `tenant_id === null` bypass scoping

| Aspect | Implementation | Rating |
|--------|---------------|--------|
| Data Isolation | TenantScope global scope with re-entrancy guard | Excellent |
| Mass Assignment Protection | `tenant_id` removed from `$fillable` on domain models | Good |
| Query Scoping | Automatic via TenantScope + TenantContext singleton | Excellent |
| CLI/Queue Safety | NO-OP when `runningInConsole()` unless context set | Good |
| Auth Fallback | Falls back to `auth()->user()->tenant_id` | Good |

**Issue (Medium):** TenantScope returns `null` for SuperAdmin, meaning SuperAdmin queries are **unscoped** — they see ALL tenant data. While this is intentional, a SuperAdmin accidentally calling `Customer::all()` in a report context could leak cross-tenant data. Consider requiring explicit `withoutGlobalScope(TenantScope::class)` for SuperAdmin queries.

**Issue (Medium):** No row-level security at the database level. If a SQL injection bypasses Eloquent, tenant isolation is lost. Consider PostgreSQL Row-Level Security policies for defense-in-depth.

### Domain Architecture

```
app/
├── Http/Controllers/Backoffice/   (62 controllers - 15 domains)
├── Http/Controllers/SuperAdmin/   (10 controllers)
├── Http/Requests/                 (103 form requests)
├── Models/                        (84 models across 12 namespaces)
├── Services/                      (15 services across 8 domains)
├── Policies/                      (31 policies)
├── Traits/                        (2 traits)
├── Scopes/                        (1 scope)
├── Jobs/                          (4 jobs)
└── Notifications/                 (5 notifications)
```

**Verdict:** The domain organization is clean and follows Laravel conventions. The separation between Backoffice (tenant) and SuperAdmin (platform) is well-defined. However, some controllers bypass the service layer entirely, creating inconsistent patterns.

### Dependency Graph

```
Controllers → Services → Models → Database
     ↓             ↓
  Requests      Policies
     ↓
  Validation
```

**Missing layers:**
- No DTOs/Value Objects for complex data transfer
- No Repository pattern (services query models directly — acceptable for this scale)
- No Event/Listener architecture for cross-domain side effects
- No dedicated Exception classes for domain errors (uses generic `DomainException`)

---

## Database & Migrations Audit

### Schema Statistics
- **88 migration files** covering core, tenancy, domain, packages, and schema patches
- **UUID primary keys** on all tables (good for multi-tenant distribution)
- **Soft deletes** on 12 financially critical tables
- **Foreign keys** properly defined with cascade rules

### Schema Quality

| Check | Result | Notes |
|-------|--------|-------|
| Primary keys | UUID everywhere | Consistent, good for distributed systems |
| Foreign keys | Present on all relationships | Proper cascade/nullOnDelete rules |
| Indexes | Composite indexes on hot paths | `[tenant_id, status, due_date]` on invoices |
| Unique constraints | `[tenant_id, number]` on documents | Prevents duplicate doc numbers |
| Nullable discipline | Generally good | Some fields could be stricter |
| Data types | Appropriate | `decimal(12,2)` for financial columns |
| Enum usage | Database-level enums | Good for data integrity |
| Timestamps | Present on all tables | Some system tables override (created_at only) |

### Index Audit

**Well-Indexed Tables:**
- `invoices`: `[tenant_id]`, `[customer_id]`, `[tenant_id, number] UNIQUE`, `[tenant_id, status, due_date]`, `[tenant_id, customer_id]`
- `customers`: `[tenant_id]`, `[tenant_id, status]`

**Missing Indexes (High Impact):**

| Table | Missing Index | Impact | Severity |
|-------|--------------|--------|----------|
| `expenses` | `[tenant_id, expense_date]` | Report queries scan full table | High |
| `incomes` | `[tenant_id, income_date]` | Same as expenses | High |
| `stock_movements` | `[tenant_id, created_at]` | Inventory reports slow | Medium |
| `products` | `[tenant_id, is_active]` | Product listings filter | Medium |
| `supplier_payment_allocations` | `[vendor_bill_id]` | Payment total calculations | High |
| `payment_allocations` | `[invoice_id]` | Invoice payment totals | High |
| `credit_note_applications` | `[invoice_id]` | Invoice payment totals | High |
| `loan_installments` | `[loan_id, status]` | Loan payment tracking | Medium |
| `email_logs` | `[tenant_id, created_at]` | Email log browsing | Low |

### Schema Design Issues

**Issue 1: `currency` column on invoices post-refactor (Medium)**
Migration `2026_03_03_000001` drops `currency_id` from business tables, but `invoices` still has a `char(3) currency` column. The `UsesTenantCurrency` trait returns tenant-level currency, creating potential inconsistency when an invoice's `currency` column differs from tenant currency (multi-currency scenarios).

**Issue 2: No `updated_by` / `created_by` audit columns (Low)**
Only `ActivityLog` tracks who made changes. Adding `created_by`/`updated_by` to core documents (invoices, quotes, POs) would improve auditability without relying on the activity log table.

**Issue 3: `decimal(12,2)` precision (Low)**
For currencies with 3 decimal places (e.g., KWD, BHD), `decimal(12,2)` is insufficient. Consider `decimal(15,4)` and rounding at display time.

**Issue 4: No database-level CHECK constraints (Low)**
Amounts like `total`, `amount_due`, `amount_paid` have no CHECK constraint to prevent negative values. While validation catches this at the application level, defense-in-depth at the DB level is recommended.

---

## Backend Code Audit

### Controller Quality Analysis

| Pattern | Controllers | Percentage | Quality |
|---------|------------|------------|---------|
| Thin (delegates to service) | ~42 | 55% | Good |
| Medium (some inline logic) | ~20 | 26% | Acceptable |
| Fat (business logic in controller) | ~15 | 19% | Needs Refactoring |

**Exemplary Controllers (Thin):**
- `InvoiceController` — delegates to `InvoiceService` for create/update/transition
- `PaymentController` — delegates to `PaymentService`
- `CreditNoteController` — delegates to `CreditNoteService`

**Fat Controller Examples:**

**Issue (High): `PurchaseOrderController@store` has inline calculation logic**
The store method builds purchase order totals inline instead of delegating to a service. This duplicates the tax calculation pattern that `InvoiceService` properly encapsulates.

**Issue (High): `VendorBillController` handles payment totals inline**
Should delegate to `VendorBillService` consistently.

**Issue (Medium): Settings controllers have no service layer**
`CompanySettingsController`, `LocalizationSettingsController`, `InvoiceSettingsController` all directly manipulate `TenantSetting` models. While simple, this creates coupling.

### Service Layer Analysis

| Service | Responsibility | Quality |
|---------|---------------|---------|
| `TaxCalculationService` | Tax computation for line items & documents | Excellent |
| `DocumentNumberService` | Sequential doc number generation with locking | Excellent |
| `InvoiceService` | Invoice lifecycle (CRUD + state machine) | Excellent |
| `PaymentService` | Payment creation with allocation validation | Excellent |
| `CreditNoteService` | Credit note lifecycle + application | Good |
| `QuoteService` | Quote lifecycle + conversion to invoice | Good |
| `StockService` | Inventory adjustments with audit trail | Good |
| `PdfService` | PDF generation for 12 document types | Good |
| `ReportService` | Dashboard KPIs + report data | Good |
| `PlanLimitService` | Plan enforcement + usage tracking | Good |
| `CurrencyService` | Exchange rate conversion | Minimal |
| `VendorBillService` | Payment total updates | Minimal |
| `SupplierPaymentService` | Supplier payment with allocations | Good |
| `DebitNoteService` | Debit note application | Good |

**Missing Services:**
- `PurchaseOrderService` — PO creation/update logic is in the controller
- `GoodsReceiptService` — Same issue
- `ExpenseService` / `IncomeService` — Finance CRUD in controller
- `SettingsService` — Settings updates in controller

### Form Request Analysis

**Strengths:**
- All 103 form requests use French validation messages
- Tenant-scoped `unique` and `exists` rules use `TenantContext::id()`
- Array validation for line items (`items.*`, `charges.*`)
- Proper `min:0.001` for quantities, `min:0.01` for amounts

**Issue (Medium): No `authorize()` on most form requests**
Only `PermissionStoreRequest` implements `authorize()`. All other form requests return `true` by default, relying on controller-level `$this->authorize()` calls. This is inconsistent — some controllers might forget authorization.

**Issue (Low): `Password::defaults()` used in RegisterRequest**
This relies on the default Laravel password policy, which may be too permissive. `UpdatePasswordRequest` uses `Password::min(8)->mixedCase()->numbers()` — these should be consistent.

### Model Analysis

**Strengths:**
- 68 models correctly use `BelongsToTenant` trait
- 16 models use `UsesTenantCurrency` for consistent currency handling
- Proper `$casts` for decimals, dates, booleans, and JSON fields
- Relationships well-defined with correct return types

**Issue (Medium): No model-level business logic validation**
Models are purely data containers. No `boot()` methods validate business rules like "cannot delete an invoice that has payments". This is handled in services, which is fine, but there's no safety net if someone calls `$invoice->delete()` directly.

**Issue (Low): Inconsistent SoftDeletes usage**
12 models have SoftDeletes, but some related models don't. For example, `Invoice` has SoftDeletes but `InvoiceItem` does not. If an invoice is soft-deleted, its items remain hard-queryable, which could cause orphan data issues.

---

## Security Audit

### Authentication & Authorization

| Check | Status | Details |
|-------|--------|---------|
| Password hashing | bcrypt (12 rounds) | Standard, acceptable |
| Session timeout | 10,800s (3 hours) | Reasonable for business app |
| Email verification | Custom `VerifyEmailNotification` | Signed URLs with expiry |
| CSRF protection | Laravel default | All forms use `@csrf` |
| Permission system | Spatie Permission (6.24) | 120+ granular permissions |
| Policy enforcement | 31 policies registered | Tenant + permission checks |
| SuperAdmin bypass | `Gate::before()` in AppServiceProvider | Clean implementation |

### Vulnerability Assessment

**CRITICAL: No Rate Limiting on Login**
The `LoginRequest` has no throttling. An attacker can brute-force credentials. Laravel provides `RateLimiter` — it should be applied to login, password reset, and registration routes.

```php
// Missing in LoginRequest or auth routes
RateLimiter::for('login', function (Request $request) {
    return Limit::perMinute(5)->by($request->ip());
});
```

**HIGH: No Rate Limiting on API/Sensitive Operations**
No rate limiting on:
- Password reset requests
- Email verification resend
- User invitation sends
- Report exports
- PDF generation

**HIGH: `TrashController` lacks granular authorization**
The trash routes (`/trash/{type}/{id}/restore`, `/trash/{type}/{id}/forceDelete`) accept arbitrary `{type}` parameters. If the controller doesn't properly validate the model type, an attacker could potentially restore/delete unintended records.

**MEDIUM: SupplierPaymentPolicy bug**
`SupplierPaymentPolicy::update()` checks `purchases.supplier_payments.view` instead of `purchases.supplier_payments.edit`. This means anyone with view permission can update supplier payments.

**MEDIUM: No Content Security Policy (CSP) headers**
The application doesn't set CSP headers, leaving it vulnerable to XSS via injected scripts. Given that it handles financial data, CSP should be mandatory.

**MEDIUM: PDF generation with user content**
`PdfService` renders Blade templates with user-provided data (customer names, notes, etc.) into PDFs via DomPDF. If user content contains HTML/JS, it could be rendered in the PDF context. DomPDF should be configured with `isRemoteEnabled: false` and content should be escaped.

**LOW: `.env.example` exposes demo passwords**
```
DEMO_SA_PASSWORD=
DEMO_ADMIN_PASSWORD=
DEMO_USER_PASSWORD=
```
While empty by default, this pattern encourages weak demo credentials in deployment.

**LOW: No CORS configuration visible**
While Sanctum is installed, no `config/cors.php` was found. If an API is exposed later, CORS misconfiguration could be a risk.

### Mass Assignment Protection

Tenant models correctly exclude `tenant_id` from `$fillable`. The `BelongsToTenant` trait auto-sets it during the `creating` event. This is well-implemented and tested in `MassAssignmentTest`.

**Exception models** with `tenant_id` in `$fillable` (intentional):
- System log models (ActivityLog, EmailLog, NotificationLog)
- Billing models (Subscription, SubscriptionInvoice)
- Tenancy infrastructure (TenantDomain, TenantSetting)
- Pro models (Branch, InvoiceReminder, RecurringInvoice)

### File Upload Security

- Avatar uploads: `jpg, jpeg, png, webp` — max 5MB
- Product images: `jpg, png, webp` — max 2MB
- File paths use `UuidPathGenerator` (prevents directory traversal)
- Storage is local (`storage/app/`) — not publicly accessible by default

**Issue (Medium):** No virus/malware scanning on uploads. For a financial SaaS, consider ClamAV integration.

---

## Performance & Scalability

### N+1 Query Analysis

**Issue (High): Multiple controllers have N+1 patterns**

```php
// Common pattern in index views:
$products = Product::latest()->paginate(15);
// Then in Blade: {{ $product->category->name }}
// This triggers N+1 for category relationship
```

**Affected Controllers:**
- `ProductController@index` — missing `->with('category', 'unit')`
- `ExpenseController@index` — missing `->with('category', 'supplier')`
- `IncomeController@index` — missing `->with('category', 'customer')`
- `StockMovementController@index` — missing `->with('product', 'warehouse')`
- `LoanController@index` — missing `->with('installments')`

**Controllers with proper eager loading:**
- `InvoiceController` — loads `->with(['customer', 'items'])`
- `SupplierController` — uses `->withCount(['purchaseOrders', 'vendorBills'])`
- `PaymentController` — loads `->with(['customer', 'allocations.invoice'])`

### Caching Strategy

| Cache Point | TTL | Invalidation | Issue |
|-------------|-----|-------------|-------|
| Report queries | 5 min | None (time-based only) | Stale data after writes |
| Dashboard KPIs | 5 min | None (time-based only) | Same issue |
| TenantContext | Request lifetime | Per-request | Fine |
| Plan limits | None | N/A | Queries DB every time |

**Issue (High): No cache invalidation on writes**
When a user creates an invoice, the dashboard KPIs remain stale for up to 5 minutes. For a financial app, users expect immediate feedback. Use cache tags or event-based invalidation:

```php
// After creating invoice:
Cache::tags("tenant:{$tenantId}")->flush();
```

**Issue (Medium): PlanLimitService queries DB on every check**
`CheckPlanLimit` middleware runs on every resource creation route, querying the subscription and counting resources. This should be cached per-tenant with event-based invalidation.

### Database Performance

**Issue (High): SQLite as default database**
The `.env.example` defaults to SQLite. While fine for development, SQLite lacks:
- Concurrent write support (WAL mode helps but has limits)
- Row-level locking (critical for `DocumentNumberService`)
- JSON query optimization
- Full-text search capabilities

For production, PostgreSQL or MySQL is mandatory. The `DocumentNumberService` uses `lockForUpdate()` which requires proper transaction isolation.

**Issue (Medium): Report queries are unbounded**
`ReportService` methods accept `from` and `to` date parameters but don't limit the range. A user could request a 10-year report, causing expensive full-table scans.

**Issue (Medium): No database connection pooling mentioned**
For a multi-tenant SaaS with potentially thousands of tenants, connection pooling (PgBouncer for PostgreSQL) should be configured.

### Scaling Considerations

| Concern | Current State | Recommendation |
|---------|--------------|----------------|
| Database | Single DB, shared schema | Fine up to ~10K tenants |
| Queue | Database driver | Switch to Redis for production |
| Cache | Database driver | Switch to Redis for production |
| Sessions | Database driver | Switch to Redis for production |
| File Storage | Local filesystem | Switch to S3 for production |
| PDF Generation | Synchronous (DomPDF) | Already async via jobs for emails |

---

## Frontend Structure Review

### Blade Template Architecture

**Layout System:**
```
mainlayout.blade.php
├── partials/head.blade.php         (CSS includes)
├── partials/header.blade.php       (Top nav, 500+ lines)
├── partials/sidebar.blade.php      (Left nav, 440 lines)
├── @yield('content')               (Page content)
└── partials/footer-scripts.blade.php (JS includes)
```

**Strengths:**
- Consistent `@extends` / `@section` pattern across all 160+ views
- Page identifier via `$page` variable for active sidebar highlighting
- French localization on all user-facing strings
- Responsive design with Bootstrap utility classes
- Empty-state handling with `@forelse` / `@empty` pattern

**Issue (Medium): Massive header partial (500+ lines)**
`partials/header.blade.php` is a monolith containing breadcrumbs, search, quick-add dropdown, notifications, and user menu. Should be broken into sub-partials.

**Issue (Medium): Massive sidebar partial (440 lines)**
`partials/sidebar.blade.php` contains all navigation for both SuperAdmin and Tenant. This should be split into `sidebar-superadmin.blade.php` and `sidebar-tenant.blade.php`.

**Issue (Low): No Blade components (`<x-*>`) usage**
The project uses the older `@include` pattern exclusively. Laravel's Blade component system would improve reusability and type-safety for common UI elements (badges, action dropdowns, status pills).

### JavaScript & CSS

**JS Plugin Count: 60+ bundled plugins**

Many of these are likely unused or only used on specific pages:
- Full calendar library (fullcalendar)
- Multiple map libraries (gmaps, leaflet, jsvectormap, jvectormap)
- Multiple chart libraries (apexchart, chartjs, c3-chart, flot, morris)
- Rich text editors (quill, summernote)
- Multiple date pickers (flatpickr, datepicker, daterangepicker, bootstrap-datepicker)
- Multiple notification libraries (toastr, sweetalert, alertify, jquery-toast)

**Issue (High): All plugins loaded on every page**
Based on the `footer-scripts.blade.php` pattern, most plugins are loaded globally. This significantly impacts page load time. Plugins should be loaded conditionally per page via `@stack('scripts')`.

**Issue (Medium): jQuery dependency**
The project uses jQuery alongside modern libraries. Consider migrating to vanilla JS or Alpine.js for new features.

**CSS Structure:**
```
resources/scss/
├── components/    (UI components)
├── layout/        (Page layouts)
├── pages/         (Page-specific styles)
├── plugins/       (Plugin overrides)
└── utils/         (Utilities)
```

This SCSS organization is clean and maintainable.

---

## Code Quality Review

### Naming Conventions

| Convention | Consistency | Notes |
|-----------|-------------|-------|
| Model names | 100% | PascalCase, singular |
| Controller names | 100% | PascalCase + Controller suffix |
| Migration names | 100% | snake_case, descriptive |
| Route names | 98% | `bo.*` prefix for backoffice |
| Permission names | 100% | `module.resource.action` |
| Form request names | 100% | Store/Update prefix pattern |
| Variable names | 95% | camelCase in PHP, snake_case in DB |

**Issue (Low): Inconsistent route parameter naming**
Some routes use `{purchaseOrder}` (camelCase) while others use `{tax_category}` (snake_case). Laravel convention is camelCase.

### Code Duplication

**Issue (High): Store/Update form request pairs are ~90% identical**
Most `StoreXxxRequest` and `UpdateXxxRequest` files share the same rules with minor differences (e.g., `ignore($id)` on unique rules). Consider a shared rules method:

```php
abstract class BaseRequest extends FormRequest {
    abstract protected function baseRules(): array;

    public function rules(): array {
        return array_merge($this->baseRules(), $this->extraRules());
    }
}
```

**Issue (Medium): Duplicate tax calculation in controllers**
At least 3 controllers (PurchaseOrder, GoodsReceipt, VendorBill) calculate line totals inline instead of using `TaxCalculationService`. This duplicates logic that exists in the service layer.

**Issue (Medium): Duplicate authorization pattern**
Every policy has the same tenant check: `$model->tenant_id === TenantContext::id()`. This could be extracted to a base policy class.

### Dead Code

**Issue (Low): Deleted controllers still referenced in git status**
- `CurrencyController.php` — deleted (replaced by CurrencySettingsController)
- `TaxRateSettingsController.php` — deleted (tax rates moved to catalog)
- `StoreCurrencyRequest.php`, `UpdateCurrencyRequest.php` — deleted

These deletions are clean and intentional.

**Issue (Low): `frontoffice/` directory exists but appears minimal**
Routes exist in `routes/frontoffice.php` but the controller directory `app/Http/Controllers/frontoffice/` appears sparse. If the frontoffice is not implemented, remove the placeholder.

### Architectural Consistency

**Consistent patterns:**
- Model trait usage (BelongsToTenant, HasUuids, SoftDeletes)
- Service injection in controllers via constructor
- Form request validation with French messages
- Policy enforcement via `$this->authorize()` in controllers
- Pagination with `->withQueryString()`

**Inconsistent patterns:**
- Some controllers use services, others have inline logic (~45% inconsistency)
- Some form requests have `authorize()`, most don't
- Some controllers use `->with()` eager loading, others don't
- PDF generation is in a service, but email sending logic is partially in controllers and partially in jobs

---

## Missing Pieces Before Production

### Critical (Must-Have)

| Item | Status | Impact |
|------|--------|--------|
| **Comprehensive test suite** | 10 tests exist | Cannot deploy with confidence |
| **Model factories** | Only UserFactory | Blocks testing entirely |
| **Rate limiting** | Missing everywhere | Security vulnerability |
| **Production database** | SQLite default | Not viable for production |
| **Redis for cache/queue/session** | Database drivers | Performance bottleneck |
| **Error monitoring** (Sentry/Bugsnag) | Not configured | Blind to production errors |
| **Logging strategy** | Default Laravel | No structured logging |
| **Backup strategy** | Not configured | Data loss risk |

### High Priority

| Item | Status | Impact |
|------|--------|--------|
| **API endpoints** | Sanctum installed but no API routes | Mobile/integration blocked |
| **Email configuration** | `MAIL_MAILER=log` | No emails in production |
| **File storage** | Local only | No cloud backup, no CDN |
| **CI/CD pipeline** | None visible | Manual deployment risk |
| **Database migrations for production** | SQLite-specific | Need MySQL/PostgreSQL testing |
| **Healthcheck endpoint** | Missing | No monitoring possible |
| **Admin audit log UI** | ActivityLog model exists, no UI | SuperAdmin can't review actions |

### Medium Priority

| Item | Status | Impact |
|------|--------|--------|
| **Localization system** | Hardcoded French strings | Internationalization blocked |
| **Search functionality** | Basic `LIKE` queries | Poor UX for large datasets |
| **Webhook support** | Not implemented | Integration limitations |
| **Two-factor authentication** | UI exists, backend unclear | Security gap |
| **Data export** (GDPR) | No user data export | Compliance risk |
| **Terms of Service** | Not implemented | Legal gap |

---

## Refactoring Roadmap

### Quick Wins (1-3 days each)

1. **Add missing indexes** — Add 9 missing database indexes identified above. Pure migration, no code change. Impact: 30-50% faster report queries.

2. **Fix SupplierPaymentPolicy bug** — Change `view` to `edit` permission in `update()` method. 1-line fix.

3. **Add rate limiting to auth routes** — Configure `RateLimiter` for login, registration, password reset. ~30 minutes.

4. **Fix N+1 queries in controllers** — Add `->with()` eager loading to 5 affected controllers. ~2 hours.

5. **Extract base policy class** — Create `TenantPolicy` base class with shared tenant check. Reduces 31 policies by ~15 lines each.

6. **Conditional script loading** — Move plugin `<script>` tags to `@push('scripts')` per page. Reduces initial page load.

### Medium Improvements (1-2 weeks each)

1. **Create model factories for all 84 models** — Essential for testing. Priority: domain models first (Customer, Invoice, Product, Supplier).

2. **Write feature tests for all CRUD operations** — Target 80% coverage on controllers and services. Use factories for test data.

3. **Extract service layer for remaining controllers** — Create `PurchaseOrderService`, `GoodsReceiptService`, `ExpenseService`, `IncomeService`. Removes business logic from controllers.

4. **Implement cache invalidation** — Use cache tags per tenant. Flush relevant tags on write operations. Or use model observers.

5. **Add Content Security Policy headers** — Configure CSP middleware to prevent XSS.

6. **Split large Blade partials** — Break header (500 lines) and sidebar (440 lines) into smaller, maintainable sub-partials.

### Major Architecture Improvements (1-3 months)

1. **Build API layer** — Leverage Sanctum for token auth. Create API resource controllers for mobile/integration use cases. Consider API versioning from day one.

2. **Implement event-driven architecture** — Create domain events (`InvoiceCreated`, `PaymentReceived`, etc.) with listeners for cross-domain effects (email notifications, stock updates, cache invalidation).

3. **Migrate to proper queue/cache infrastructure** — Replace database drivers with Redis. Add Horizon for queue monitoring.

4. **Implement full CI/CD pipeline** — GitHub Actions with: lint, static analysis (Larastan), tests, build, deploy. Add pre-commit hooks.

5. **Database migration to PostgreSQL** — Leverage PostgreSQL features: JSONB queries, row-level security, full-text search, better concurrency.

6. **Implement proper localization** — Extract all French strings to `lang/fr/` files. Add multi-language support for international expansion.

---

## New Feature Suggestions

### 1. Recurring Invoice Auto-Generation
**Description:** Automatically generate invoices from `RecurringInvoice` templates on schedule.
**Business Value:** Reduces manual work for subscription-based businesses. Key competitive feature.
**Complexity:** Medium — Requires scheduled command + InvoiceService integration.
**Dependencies:** RecurringInvoice model exists, InvoiceService exists.
**Priority:** Now

### 2. Customer Portal (Self-Service)
**Description:** Public-facing portal where customers can view their invoices, download PDFs, and make payments.
**Business Value:** Reduces support load, speeds up payment collection. Major differentiator.
**Complexity:** High — New auth guard, new routes, payment gateway integration.
**Dependencies:** Invoice model, PDF generation, email system.
**Priority:** Now

### 3. Payment Gateway Integration (Stripe/PayPal)
**Description:** Online payment processing for invoice settlement.
**Business Value:** Faster payment collection, automated reconciliation.
**Complexity:** Medium — Laravel Cashier or direct Stripe SDK integration.
**Dependencies:** Customer Portal, Payment model.
**Priority:** Now

### 4. Automated Invoice Reminders
**Description:** Send automatic email reminders for overdue invoices based on configurable schedules.
**Business Value:** Improves cash flow. `InvoiceReminder` model already exists.
**Complexity:** Low — Scheduled command + existing email job.
**Dependencies:** InvoiceReminder model, SendInvoiceEmailJob pattern.
**Priority:** Now

### 5. Multi-Currency with Live Exchange Rates
**Description:** Fetch live exchange rates from APIs (ECB, OpenExchangeRates) instead of manual entry.
**Business Value:** Reduces data entry, ensures accurate pricing for international clients.
**Complexity:** Low — API integration + scheduled refresh.
**Dependencies:** CurrencyService, ExchangeRate model.
**Priority:** Later

### 6. Expense Receipt OCR
**Description:** Upload receipt photos and auto-extract expense data using OCR (e.g., Google Vision, AWS Textract).
**Business Value:** Dramatically reduces manual expense entry.
**Complexity:** High — Cloud API integration, data parsing, review UI.
**Dependencies:** Expense model, MediaLibrary.
**Priority:** Future

### 7. Advanced Reporting with Charts
**Description:** Interactive dashboards with ApexCharts/Chart.js visualizations for revenue trends, expense breakdowns, cash flow projections.
**Business Value:** Decision-making tool for business owners.
**Complexity:** Medium — Frontend work, ReportService already provides data.
**Dependencies:** ReportService, chart libraries (already installed).
**Priority:** Later

### 8. Audit Trail UI for SuperAdmin
**Description:** Searchable, filterable UI for the ActivityLog model. Show who did what, when.
**Business Value:** Compliance, debugging, tenant support.
**Complexity:** Low — ActivityLog model exists, just needs views + controller.
**Dependencies:** ActivityLog model.
**Priority:** Now

### 9. WhatsApp Invoice Sending
**Description:** Send invoices via WhatsApp Business API in addition to email.
**Business Value:** Higher open rates than email in many markets. French-speaking Africa heavily uses WhatsApp.
**Complexity:** Medium — WhatsApp Business API integration.
**Dependencies:** Invoice PDF, notification system.
**Priority:** Later

### 10. Inventory Barcode Scanning
**Description:** Mobile barcode scanning for stock movements using the device camera.
**Business Value:** Faster inventory management, fewer errors.
**Complexity:** Medium — JavaScript barcode scanner + StockMovement API.
**Dependencies:** Product barcode field, StockService.
**Priority:** Future

---

## Top 10 Issues

| # | Issue | Severity | Impact | Fix Effort |
|---|-------|----------|--------|------------|
| 1 | **Near-zero test coverage** (10 tests for 450+ files) | Critical | Cannot deploy with confidence, regression risk | High (2-4 weeks) |
| 2 | **No rate limiting** on auth and sensitive routes | Critical | Brute-force attacks, abuse | Low (1 day) |
| 3 | **No model factories** (only UserFactory) | Critical | Blocks test writing entirely | Medium (1 week) |
| 4 | **SQLite as default/production DB** | Critical | Not viable for concurrent multi-tenant | Low (config change) |
| 5 | **N+1 queries** in 5+ controllers | High | Slow page loads, DB overload | Low (2 hours) |
| 6 | **No cache invalidation** on report data | High | Stale financial data for 5 minutes | Medium (2-3 days) |
| 7 | **All JS plugins loaded globally** (60+ scripts) | High | Slow page loads (estimated 3-5s extra) | Medium (1 week) |
| 8 | **Fat controllers** (~19% have inline business logic) | High | Untestable, duplicated logic | Medium (1-2 weeks) |
| 9 | **SupplierPaymentPolicy authorization bug** | Medium | View-only users can update payments | Low (1-line fix) |
| 10 | **No CSP headers** | Medium | XSS vulnerability on financial data | Low (1 day) |

---

## Top 10 Strengths

| # | Strength | Impact |
|---|----------|--------|
| 1 | **Robust multi-tenant isolation** — TenantScope with re-entrancy guard, BelongsToTenant auto-fill, policy checks | Data leak prevention |
| 2 | **Clean service layer** for financial operations — InvoiceService, PaymentService, TaxCalculationService with proper state machines | Correct financial calculations |
| 3 | **Comprehensive permission system** — 120+ granular permissions, 31 policies, middleware enforcement, SuperAdmin bypass | Fine-grained access control |
| 4 | **Strong schema design** — UUID PKs, foreign keys, composite unique constraints, proper indexes on hot paths | Data integrity + performance |
| 5 | **Document number service** with pessimistic locking — prevents duplicate invoice numbers under concurrency | Financial document integrity |
| 6 | **Consistent domain organization** — 12 model namespaces, matching controllers/requests/policies per domain | Maintainable codebase |
| 7 | **Plan limit enforcement** — Middleware + service combination prevents resource over-usage per subscription tier | SaaS monetization |
| 8 | **PDF generation for 12 document types** with template system — Professional document output | Business value |
| 9 | **Soft deletes on financial records** with trash recovery UI — Prevents accidental data loss | Data safety |
| 10 | **Anti-over-allocation** in PaymentService — Prevents applying more payment than owed, with 0.01 tolerance | Financial accuracy |

---

## Recommended 30-Day Improvement Plan

### Week 1: Security & Critical Fixes

| Day | Task | Owner |
|-----|------|-------|
| 1 | Add rate limiting to auth routes (login, register, password reset, email verify) | Backend |
| 1 | Fix SupplierPaymentPolicy `update()` permission bug | Backend |
| 2 | Add CSP headers middleware | Backend |
| 2 | Configure production database (PostgreSQL) + test all migrations | Backend/DevOps |
| 3 | Add 9 missing database indexes (migration file) | Backend |
| 3 | Fix N+1 queries in 5 affected controllers | Backend |
| 4-5 | Set up Redis for cache, queue, and session drivers | DevOps |
| 5 | Configure error monitoring (Sentry) + structured logging | DevOps |

### Week 2: Testing Foundation

| Day | Task | Owner |
|-----|------|-------|
| 6-7 | Create model factories for 20 core models (Customer, Product, Invoice, Quote, Supplier, PurchaseOrder, Payment, etc.) | Backend |
| 8-9 | Write feature tests for auth flow (login, register, password reset, email verify) | Backend |
| 10 | Write feature tests for tenant isolation (expand existing 2 tests to cover all domains) | Backend |

### Week 3: Testing & Refactoring

| Day | Task | Owner |
|-----|------|-------|
| 11-12 | Write feature tests for Sales CRUD (Invoice, Quote, Payment, CreditNote) | Backend |
| 13 | Write feature tests for CRM CRUD (Customer, Address, Contact) | Backend |
| 14 | Extract PurchaseOrderService from fat controller | Backend |
| 15 | Write feature tests for Purchases CRUD | Backend |

### Week 4: Performance & Polish

| Day | Task | Owner |
|-----|------|-------|
| 16-17 | Implement cache invalidation strategy (cache tags per tenant, model observers) | Backend |
| 18 | Conditional JS/CSS loading per page (reduce global bundle) | Frontend |
| 19 | Set up CI/CD pipeline (GitHub Actions: lint, analyze, test, build) | DevOps |
| 20 | Split large Blade partials (header, sidebar) | Frontend |
| 20 | Configure production email driver (SMTP/SES) + test all notifications | DevOps |

### Expected Outcomes After 30 Days
- **Security:** Rate limiting, CSP, proper auth hardening
- **Reliability:** ~40% test coverage on critical paths
- **Performance:** Redis caching, N+1 fixes, conditional asset loading
- **Operations:** CI/CD, error monitoring, structured logging
- **Database:** PostgreSQL with proper indexes

---

## Final Verdict

**Facturation is a well-structured Laravel application with a strong foundation**, particularly in multi-tenant isolation, financial service design, and domain organization. The codebase demonstrates a clear understanding of SaaS architecture patterns and Laravel best practices.

**However, it is NOT production-ready in its current state.** The critical gaps are:

1. **Testing is essentially absent** — 10 tests for a 450+ file codebase is a deployment risk. Any change could introduce regressions in financial calculations, tenant isolation, or payment processing with zero automated detection.

2. **Security hardening is incomplete** — No rate limiting, no CSP, no 2FA enforcement, and a policy authorization bug that allows view-only users to modify supplier payments.

3. **Infrastructure defaults are development-only** — SQLite database, database-backed queues/cache/sessions, and local file storage will not survive production load.

The good news: **the architecture is sound and the refactoring path is clear**. The service layer for financial operations is well-designed, the multi-tenant isolation is robust, and the domain organization makes it easy to add tests and extract services incrementally. With the 30-day plan above, this application can reach a production-ready state.

**Recommended next milestone:** Achieve 50% test coverage on critical paths (auth, invoicing, payments, tenant isolation) before any production deployment.

---

*This audit was generated by analyzing 450+ PHP files, 88 migrations, 160+ Blade templates, 103 form requests, 31 policies, 15 services, and all configuration files in the Facturation SaaS codebase.*
