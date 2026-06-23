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
