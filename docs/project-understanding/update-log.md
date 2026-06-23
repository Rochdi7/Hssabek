# Update Log

> **Rule:** Append a new entry to this file after EVERY change to the project.
> This file is the first thing to check before editing any module.

---

## Template — Copy this for each update

```md
## YYYY-MM-DD — Update Title

### Summary
What changed and why.

### Files changed
- `path/to/file.php` — what changed

### Database impact
None / Describe migration if applicable

### UI impact
None / Describe visual change if applicable

### Security impact
None / Describe security implications if applicable

### Tests/checks done
- [ ] Route tested manually
- [ ] Validation tested with invalid inputs
- [ ] No design change confirmed
- [ ] No production error exposure confirmed

### Notes for future Claude sessions
Anything important to remember about this change.
```

---

## 2026-06-23 — Fix ActivityLog Insert (created_at default + nullable subject)

### Summary
Data export (`/settings/data-export/download`) threw `SQLSTATE[HY000] 1364 Field 'created_at' doesn't have a default value`. `ActivityLog` has `$timestamps = false` so Eloquent never set `created_at`, while the column is NOT NULL with no default. Also, the data-export audit log passes `subject_id => null`, but the column was NOT NULL. Fixed both: model now auto-fills `created_at` on creating; migration makes `subject_type`/`subject_id` nullable.

### Files changed
- `app/Models/System/ActivityLog.php` — `booted()` creating hook fills `created_at` (since `$timestamps = false`)
- `database/migrations/2026_06_23_000001_make_activity_log_subject_nullable.php` — NEW, makes subject columns nullable

### Database impact
Migration: `activity_logs.subject_type` and `subject_id` → nullable.

### Security impact
None — audit logging still records all fields; only allows subject-less entries (e.g. data exports).

### Notes for future Claude sessions
`ActivityLog` keeps `$timestamps = false` (no `updated_at`); rely on the creating hook for `created_at`. Subject-less audit logs are valid for non-model actions like `data_export`.

## 2026-06-23 — Company Capital Hint (SARL AU) + Invoice Image Block Restyle

### Summary
Two settings tweaks: (1) On company settings, the SARL AU capital hint now reads "Minimum légal : 100 000 DH pour une SARL AU" instead of "1 DH" (updated both the Blade and the JS `change` handler). (2) On invoice settings, replaced the `avatar-cropper` include for the invoice image with markup mirroring the company "Logo" block (`new-logo` thumbnail + trash button), showing the current uploaded image and allowing delete. Backend unchanged — still posts base64 via `cropped_invoice_image` / `cropped_invoice_image_deleted`.

### Files changed
- `resources/views/backoffice/settings/company.blade.php` — SARL AU min hint 1 DH → 100 000 DH (Blade + JS)
- `resources/views/backoffice/settings/invoice.blade.php` — invoice image now uses logo-style block with current pic + delete; added `@push('scripts')` for upload/delete
- `lang/ar.json` — updated SARL AU key, added "Téléchargez l'image affichée sur vos factures"

### Database impact
None

### UI impact
Invoice image upload now matches the company logo card style (thumbnail with delete trash icon). SARL AU capital hint text changed.

### Security impact
None — reuses existing `SecureBase64Image` validation and base64 field names.

### Notes for future Claude sessions
Invoice image still flows through `InvoiceSettingsController` base64 handling; only the front-end markup changed. The avatar-cropper component is no longer used on this page.

## 2026-06-23 — Allow Partial Payment Allocation (Don't Force Every Invoice)

### Summary
On the customer/supplier payment forms, validation required `amount_applied` on EVERY listed invoice row (`allocations.*.amount_applied => required`). Leaving a row blank (paying only the invoice you want) triggered "Le montant appliqué est obligatoire." Added `prepareForValidation()` to both store requests to drop blank allocation rows before validation, so only invoices/bills with a real amount > 0 are paid.

### Files changed
- `app/Http/Requests/Sales/Store/StorePaymentRequest.php` — strip blank allocations in `prepareForValidation()`
- `app/Http/Requests/Purchases/Store/StoreSupplierPaymentRequest.php` — same
- `tests/Feature/Sales/PaymentControllerTest.php` — added `test_can_pay_one_invoice_while_leaving_others_blank`

### Database impact
None.

### UI impact
None — design unchanged. Blank allocation rows are now accepted (only filled rows are paid).

### Security impact
None — overpayment guard and tenant/same-customer checks unchanged.

### Tests/checks done
- 15 tests pass (PaymentControllerTest + PaymentAllocationEligibilityTest).

### Notes for future Claude sessions
`amount_applied` is still `required`+`min:0.01` per row, but blank rows are removed before validation, so the user only pays the invoices they fill in.

## 2026-06-23 — Payment Allocation Eligibility Made Money-Based

### Summary
Customer payment allocation excluded `unpaid` invoices: `customerInvoices()` filtered on `whereIn('status', ['sent','partial','overdue'])`. Since the status-enum migration remaps legacy `draft`/`sent` → `unpaid`, a genuinely unpaid invoice never appeared in the allocation dropdown, blocking payment recording. "Sent" must never be required — clients may deliver invoices outside the system. Replaced status-list filtering with a money-based `allocatable()` scope (`amount_due > 0` and status not in `paid`/`void`) on both `Invoice` and `VendorBill`, and used it in both allocation queries.

### Files changed
- `app/Models/Sales/Invoice.php` — added `scopeAllocatable()`
- `app/Models/Purchases/VendorBill.php` — added `scopeAllocatable()`
- `app/Http/Controllers/Backoffice/Sales/PaymentController.php` — `customerInvoices()` now uses `allocatable()` (was `whereIn status sent/partial/overdue`)
- `app/Http/Controllers/Backoffice/Purchases/SupplierPaymentController.php` — `create()` now uses `allocatable()` (logic unchanged, was already money-based)
- `tests/Unit/Services/PaymentAllocationEligibilityTest.php` — NEW, 10 regression tests

### Database impact
None.

### UI impact
None — design unchanged. More invoices/bills now correctly listed for allocation.

### Security impact
None — tenant + same-client/supplier checks in `PaymentService`/`SupplierPaymentService` unchanged. Overpayment guard unchanged.

### Tests/checks done
- 20 tests pass (PaymentAllocationEligibility + PaymentService + SupplierPaymentService).

### Notes for future Claude sessions
Eligibility is money-based, not delivery-based. Reuse `Invoice::allocatable()` / `VendorBill::allocatable()` for any future allocation query. Do not reintroduce `status = sent`/`posted` requirements.

## 2026-06-23 — Token Efficiency & Model Selection Rules Added to CLAUDE.md

### Summary
Added two new mandatory sections to `CLAUDE.md` at the very top (before all other rules):
1. **TOKEN EFFICIENCY — CAVEMAN SKILL**: instructs Claude to read minimum files, write minimum code, say minimum words. No extras, no fluff.
2. **MODEL & EFFORT SELECTION**: tells Claude when to switch to `claude-opus-4-8` (auth, payments, multi-tenancy, migrations) and defines effort levels by task type. Includes 5 hard rules before touching production-risk areas.

### Files changed
- `CLAUDE.md` — added TOKEN EFFICIENCY and MODEL & EFFORT SELECTION sections at the top

### Database impact
None.

### UI impact
None.

### Security impact
Positive — Claude is now explicitly instructed to use maximum effort and a stronger model before touching auth, payments, tenant isolation, and live migrations.

### Notes for future Claude sessions
These two sections come FIRST in CLAUDE.md so they load into context before any other instruction. The caveman rule: do only what is asked, read only what you need. The model rule: when in doubt on production-risk tasks, switch to Opus and confirm with the user.

---

## 2026-06-23 — Full Project Documentation Created

### Summary
Initial comprehensive documentation scan and creation. No code was changed.
Documentation created from automated project scan covering routes, models, controllers, middleware, services, migrations, views, and security.

### Files created
- `docs/project-understanding/README.md` — How to use this documentation folder
- `docs/project-understanding/models.md` — All 85+ models with fields, relationships, schema gotchas
- `docs/project-understanding/routes.md` — All route files, naming conventions, middleware stacks
- `docs/project-understanding/controllers.md` — All controllers with purpose and key patterns
- `docs/project-understanding/database.md` — Migration history, schema conventions, seeders
- `docs/project-understanding/permissions.md` — RBAC system, roles, permissions, policies
- `docs/project-understanding/backoffice-ui-theme.md` — Layout rules, components, CSS classes, rules for new pages
- `docs/project-understanding/frontoffice.md` — Public website structure
- `docs/project-understanding/security.md` — Known risks, CSRF, mass assignment, headers, deployment checklist
- `docs/project-understanding/validation.md` — Form request conventions, patterns, French messages rule
- `docs/project-understanding/known-issues.md` — Schema gotchas, fixed bugs, test issues
- `docs/project-understanding/update-log.md` — This file

### Database impact
None — documentation only.

### UI impact
None — documentation only.

### Security impact
None — documentation only.

### Tests/checks done
- No code changed — documentation scan only.

### Notes for future Claude sessions
- The project is a mature multi-tenant SaaS Laravel 12 application.
- Phases 0, 2, and 3 are complete (foundation hardening, CRM, testing).
- Phase 4 is next — see `tasks/roadmap/` for the plan.
- Always check `docs/project-understanding/known-issues.md` before touching models — many schema column names differ from assumptions.
- The Gate::before bypass means admin/owner users bypass ALL policy checks.
- Test domain routing requires `URL::forceRootUrl()`, not `withHeader('Host', ...)`.
- 90 tests pass, 1 skipped (UserInvitation view bug on public route).

---

## Previous Changes (from memory — pre-documentation)

### Phase 0 — Foundation Hardening (2026-03-01)
- Removed `tenant_id` from `$fillable` on 30+ models
- Added `BelongsToTenant` trait to all tenant-owned models
- Added `SoftDeletes` to 12 financially critical models
- Created `DocumentNumberService` with unique sequence locking
- Added unique constraints on `document_number_sequences` and `invoices`
- `IdentifyTenantByDomain` now aborts 404 on unknown domains (was returning null)

### Phase 2 — CRM (2026-03-xx)
- Created `CustomerController`, `CustomerAddressController`, `CustomerContactController`
- Created 6 CRM Form Requests (French messages, tenant-scoped unique rules)
- Created 4 CRM Blade views (index, create, edit, show) following reference templates
- Fixed schema column names (type, line1, region, name, currency, payment_terms_days)
- Added `CustomerPolicy` and registered in AppServiceProvider
- Added `crm.php` routes file with 13 routes
- Updated sidebar with CRM section

### Phase 3 — Testing Foundation (2026-03-xx)
- Configured phpunit.xml with SQLite in-memory database
- Added `createTenantWithAdmin()`, `createTenant()`, `seedPermissionsOnce()` helpers to TestCase
- Created 28 factories in `database/factories/`
- Added `HasFactory` trait to all 30+ models
- Fixed `DocumentNumberService` column names (`key`, `next_number`)
- Fixed `LoginLog` fillable columns
- Fixed `PaymentAllocation` (`$timestamps = false`)
- Fixed `TenantSetting` (CREATED_AT = null)
- Fixed `RoleSeeder` (admin role now has permissions)
- Fixed `PlanFactory` (correct enum values)
- Result: 90 passed, 1 skipped, 0 failed

### Feature — Public Tokens (2026-06-20)
- Added `public_token` column to `invoices` and `quotes` tables
- Enables unauthenticated share links: `/invoice/{token}`, `/document/{token}/pdf`

### Feature — Measurement Line Items (2026-06-21)
- Added `length`, `width`, `height`, `thickness` columns to `invoice_items` and `quote_items`
- Supports `calculation_mode = measurement` for area/volume billing
