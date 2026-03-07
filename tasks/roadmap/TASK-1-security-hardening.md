# TASK 1 -- Security Hardening & Authorization Fixes

**Priority:** P0 -- Do first, non-negotiable before any deployment
**Estimated effort:** 1-2 days
**Dependency:** None -- standalone, start here

---

## Prompt for Claude

You are a senior Laravel security engineer working on a multi-tenant SaaS invoicing platform called "Facturation".

Your task is to complete **TASK 1: Security Hardening & Authorization Fixes**.

### Context

This is a Laravel 12 multi-tenant SaaS app with:
- 84 Eloquent models, 77 controllers, 103 form requests, 31 policies
- Multi-tenant isolation via `TenantScope` + `BelongsToTenant` trait
- Spatie Permission (6.24) for RBAC with 120+ permissions
- Domain-based tenant resolution via `IdentifyTenantByDomain` middleware
- Authentication: session-based, bcrypt (12 rounds), 3-hour timeout
- No rate limiting anywhere in the app currently
- A known authorization bug in SupplierPaymentPolicy

### What You Must Do

Complete ALL subtasks below, in order. After each subtask, verify it works.
Do NOT skip any subtask. Do NOT add features beyond what is listed.

---

## Subtask Checklist

### 1. Fix SupplierPaymentPolicy authorization bug (1-line fix)

**File:** `app/Policies/SupplierPaymentPolicy.php`
**Problem:** The `update()` method checks `purchases.supplier_payments.view` instead of `purchases.supplier_payments.edit`. This means any user with view-only permission can update supplier payments -- a direct authorization bypass.
**Fix:** Change `purchases.supplier_payments.view` to `purchases.supplier_payments.edit` in the `update()` method.
**Verify:** Read the file after edit and confirm the correct permission string.

### 2. Add rate limiting to authentication routes

**File to create or modify:** `bootstrap/app.php` and/or `app/Providers/AppServiceProvider.php` (boot method)
**Routes file:** `routes/auth.php`

Add rate limiters for:
- **Login:** 5 attempts per minute, keyed by `email + IP`
- **Registration:** 3 attempts per minute, keyed by IP
- **Password reset request:** 3 attempts per minute, keyed by IP
- **Email verification resend:** 3 attempts per minute, keyed by user ID (authenticated)

Use Laravel's `RateLimiter::for()` in the boot method, then apply `throttle:limiterName` middleware to the corresponding routes in `routes/auth.php`.

**Important:** Do NOT break existing route names or middleware stacks. Only ADD the throttle middleware.

### 3. Add rate limiting to sensitive backoffice operations

**Routes files:** `routes/backoffice/reports.php`, `routes/backoffice/users.php`, `routes/backoffice/sales.php`, `routes/backoffice/purchases.php`

Add rate limiters for:
- **Report exports:** 5 per minute per user (`reports.*.export` routes)
- **PDF download/stream:** 20 per minute per user (all `*.download` and `*.stream` routes)
- **User invitation send:** 10 per minute per tenant (invitation store route)

Define these limiters in the same boot method as subtask 2. Apply via middleware on the specific routes.

### 4. Harden TrashController with type whitelist and per-model authorization

**File:** `app/Http/Controllers/Backoffice/TrashController.php`

**Problem:** The trash routes accept arbitrary `{type}` parameter. If the controller doesn't validate this, an attacker could manipulate unintended models.

**Fix:**
1. Add an explicit whitelist of allowed trashable model types (map short names to model classes):
   ```php
   private const TRASHABLE_TYPES = [
       'customers' => \App\Models\CRM\Customer::class,
       'products' => \App\Models\Catalog\Product::class,
       'invoices' => \App\Models\Sales\Invoice::class,
       'quotes' => \App\Models\Sales\Quote::class,
       'payments' => \App\Models\Sales\Payment::class,
       'credit-notes' => \App\Models\Sales\CreditNote::class,
       'delivery-challans' => \App\Models\Sales\DeliveryChallan::class,
       'suppliers' => \App\Models\Purchases\Supplier::class,
       'purchase-orders' => \App\Models\Purchases\PurchaseOrder::class,
       'vendor-bills' => \App\Models\Purchases\VendorBill::class,
       'debit-notes' => \App\Models\Purchases\DebitNote::class,
       'refunds' => \App\Models\Sales\Refund::class,
   ];
   ```
2. Validate `{type}` against this whitelist -- `abort(404)` if not found.
3. Before restore/forceDelete, call `$this->authorize('delete', $model)` to verify the user has delete permission on that specific model.
4. Before `emptyType`, also validate the type against the whitelist.

**Important:** Read the existing TrashController first to understand its current implementation, then modify it.

### 5. Add Content Security Policy (CSP) headers middleware

**File to create:** `app/Http/Middleware/ContentSecurityPolicy.php`
**File to modify:** `bootstrap/app.php`

Create a middleware that adds CSP headers to all HTML responses:
```
Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data: blob:; font-src 'self'; connect-src 'self'; frame-ancestors 'none'; base-uri 'self'; form-action 'self'
```

**Note:** Use `'unsafe-inline'` and `'unsafe-eval'` for scripts because the theme uses inline scripts and eval-based plugins. This is a pragmatic first step -- it can be tightened later with nonces.

Register this middleware globally in `bootstrap/app.php` via `$middleware->append()` or in the `web` group.

**Important:** Only add the header to responses with `Content-Type: text/html`. Do not add it to JSON, PDF, or file download responses.

### 6. Secure PDF generation against HTML injection

**File:** `app/Services/Sales/PdfService.php`
**Files:** All PDF Blade templates in `resources/views/pdf/`

**Problem:** User-provided content (customer names, notes, terms, addresses) is rendered into PDF templates. If a user puts HTML tags in their company name or invoice notes, DomPDF will render them.

**Fix:**
1. Read `config/dompdf.php` and verify/set `isRemoteEnabled` to `false`.
2. In `PdfService`, ensure all user-provided data passed to PDF views is escaped. The `buildData()` method (or equivalent) that prepares template variables should apply `e()` (Laravel's HTML entity encoding) to string fields from: customer name, customer email, tenant name, notes, terms, address fields, reference numbers, and any snapshot JSON string values.
3. Alternatively, ensure the Blade templates use `{{ }}` (which auto-escapes) and NOT `{!! !!}` for user content. Check all PDF blade files and replace any `{!! !!}` that outputs user content with `{{ }}`.

**Important:** Do NOT escape HTML that is part of the template structure itself -- only user-provided data fields.

### 7. Align password policy across the application

**Files:**
- `app/Http/Requests/Auth/RegisterRequest.php`
- `app/Http/Requests/Auth/ResetPasswordRequest.php`

**Problem:** `RegisterRequest` uses `Password::defaults()` (permissive), while `UpdatePasswordRequest` uses `Password::min(8)->mixedCase()->numbers()` (stricter). These should be identical.

**Fix:** Change both `RegisterRequest` and `ResetPasswordRequest` to use:
```php
'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
```

### 8. Create CORS configuration file

**File to create:** `config/cors.php`

**Problem:** Sanctum is installed but no CORS config exists. If an API is built later without this file, CORS could be misconfigured.

**Fix:** Create `config/cors.php` with restrictive defaults:
```php
<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
```
Note: `allowed_origins` is empty -- nothing is allowed by default. This will be configured when the API layer is built.

### 9. Add missing authorize() calls in Settings controllers

**Files:**
- `app/Http/Controllers/Backoffice/Settings/CompanySettingsController.php`
- `app/Http/Controllers/Backoffice/Settings/InvoiceSettingsController.php`
- `app/Http/Controllers/Backoffice/Settings/LocalizationSettingsController.php`

**Problem:** These controllers directly manipulate `TenantSetting` without calling `$this->authorize()`. While they are behind auth middleware, they lack explicit policy checks.

**Fix:** Read each controller. In the `edit` method, add:
```php
$this->authorize('viewCompany', \App\Models\Tenancy\TenantSetting::class);
```
In the `update` method, add:
```php
$this->authorize('editCompany', \App\Models\Tenancy\TenantSetting::class);
```

Use the appropriate SettingsPolicy method names (viewCompany/editCompany for company, viewInvoice/editInvoice for invoice, viewLocale/editLocale for locale). Read `app/Policies/SettingsPolicy.php` first to see the exact method names available.

---

## Audit Issues Covered by This Task

From `project_architecture_audit.md`:

| # | Issue | Severity | Section |
|---|-------|----------|---------|
| 1 | No rate limiting on login | CRITICAL | Security Audit > Vulnerability Assessment |
| 2 | No rate limiting on sensitive operations | HIGH | Security Audit > Vulnerability Assessment |
| 3 | TrashController lacks granular authorization | HIGH | Security Audit > Vulnerability Assessment |
| 4 | SupplierPaymentPolicy `update()` bug | MEDIUM | Security Audit > Vulnerability Assessment |
| 5 | No CSP headers | MEDIUM | Security Audit > Vulnerability Assessment |
| 6 | PDF generation renders unescaped user content | MEDIUM | Security Audit > Vulnerability Assessment |
| 7 | Password policy inconsistency | LOW | Backend Code Audit > Form Request Analysis |
| 8 | No CORS configuration | LOW | Security Audit > Vulnerability Assessment |
| 9 | Missing authorize() in Settings controllers | MEDIUM | Backend Code Audit > Form Request Analysis |

---

## Definition of Done

- [ ] SupplierPaymentPolicy: user with only `view` permission gets 403 on update
- [ ] Login returns 429 after 5 failed attempts within 1 minute
- [ ] Registration returns 429 after 3 attempts within 1 minute
- [ ] Password reset returns 429 after 3 attempts within 1 minute
- [ ] Report export routes have throttle middleware applied
- [ ] PDF download routes have throttle middleware applied
- [ ] TrashController rejects unknown `{type}` values with 404
- [ ] TrashController calls `$this->authorize()` before restore/forceDelete
- [ ] CSP header present on HTML responses (check via browser dev tools)
- [ ] CSP header NOT present on PDF/JSON responses
- [ ] DomPDF config has `isRemoteEnabled: false`
- [ ] No `{!! !!}` in PDF blade templates for user-provided content
- [ ] RegisterRequest and ResetPasswordRequest use `Password::min(8)->mixedCase()->numbers()`
- [ ] `config/cors.php` exists with empty `allowed_origins`
- [ ] Settings controllers call `$this->authorize()` before edit/update
- [ ] All existing tests still pass: `php artisan test`

---

## Files Likely Modified

```
app/Policies/SupplierPaymentPolicy.php                          (fix permission string)
app/Providers/AppServiceProvider.php                             (register rate limiters)
routes/auth.php                                                  (add throttle middleware)
routes/backoffice/reports.php                                    (add throttle middleware)
routes/backoffice/users.php                                      (add throttle middleware)
routes/backoffice/sales.php                                      (add throttle middleware)
routes/backoffice/purchases.php                                  (add throttle middleware)
app/Http/Controllers/Backoffice/TrashController.php              (type whitelist + authorize)
app/Http/Middleware/ContentSecurityPolicy.php                    (NEW)
bootstrap/app.php                                                (register CSP middleware)
app/Services/Sales/PdfService.php                                (escape user content)
config/dompdf.php                                                (verify isRemoteEnabled)
resources/views/pdf/**/*.blade.php                               (audit {!! !!} usage)
app/Http/Requests/Auth/RegisterRequest.php                       (password policy)
app/Http/Requests/Auth/ResetPasswordRequest.php                  (password policy)
config/cors.php                                                  (NEW)
app/Http/Controllers/Backoffice/Settings/CompanySettingsController.php    (add authorize)
app/Http/Controllers/Backoffice/Settings/InvoiceSettingsController.php    (add authorize)
app/Http/Controllers/Backoffice/Settings/LocalizationSettingsController.php (add authorize)
```

---

## Risks & Dependencies

- CSP `unsafe-inline` / `unsafe-eval` is required because the theme uses inline scripts. Tighten later with nonces.
- Rate limiting uses Laravel's cache driver. Currently `database` -- works but slower than Redis. Will be upgraded to Redis in Task 5.
- TrashController whitelist must be updated whenever a new SoftDeletes model is added.
- Verify the SettingsPolicy method names by reading the file before adding authorize calls.
