# Facturation SaaS — Claude Instructions

## LANGUAGE RULE (MANDATORY)

**Always use French** for all user-facing text across the entire system — no exceptions:

- All Blade view labels, placeholders, button text, table headers, page titles, breadcrumbs, error messages, success messages, empty-state messages, tooltips, and modal content must be written in **French**.
- All validation messages (`messages()` in Form Requests) must be in **French**.
- All flash messages (`session('success')`, `session('error')`, etc.) passed from controllers must be in **French**.
- All email templates and notification text must be in **French**.
- Code (variable names, class names, route names, comments) stays in **English** — only user-visible strings must be French.
- When generating any Blade file, controller response, or Form Request, verify every user-facing string is in French before delivering the answer.

---

## UI/UX Design System Rule (MANDATORY)

**Before creating any CRUD controller, Blade view, or any page in `resources/views/`, you MUST:**

1. **Find the matching reference template** in `resources/views/` — there are hundreds of static Blade templates that define the exact approved UI/UX for this project.
2. **Use the same HTML structure, CSS classes, and component patterns** from that template. Do NOT invent new layouts, components, or class names.
3. **Only replace static/dummy content** with dynamic Blade variables (`{{ }}`, `@foreach`, `old()`, `route()`) — keep everything else identical.

The full template mapping is documented in [UI_UX_TEMPLATE_REFERENCE.md](UI_UX_TEMPLATE_REFERENCE.md).

---

## How to Find the Right Template

Match your feature to the domain below, then look up the file in `UI_UX_TEMPLATE_REFERENCE.md`:

| Domain | Example templates |
|--------|------------------|
| Dashboard | `admin-dashboard.blade.php`, `super-admin-dashboard.blade.php` |
| Invoices / Sales | `invoices.blade.php`, `add-invoice.blade.php`, `edit-invoice.blade.php` |
| Purchases | `purchases.blade.php`, `purchase-orders.blade.php` |
| Customers / CRM | `customers.blade.php`, `add-customer.blade.php`, `customer-details.blade.php` |
| Products / Inventory | `products.blade.php`, `inventory.blade.php` |
| Settings | `account-settings.blade.php`, `company-settings.blade.php` |
| Roles & Permissions | `roles-permissions.blade.php`, `permission.blade.php` |
| Auth pages | `login.blade.php`, `register.blade.php` |
| Reports | `sales-report.blade.php`, `customers-report.blade.php` |
| UI Components | `ui-cards.blade.php`, `ui-buttons.blade.php`, `form-elements.blade.php` |

---

## Implementation Steps (for any CRUD/Blade page)

1. Open the matching static template from `resources/views/`
2. Copy its full HTML structure as the starting point
3. Replace dummy rows with `@forelse` / `@foreach` loops
4. Replace hardcoded values with `{{ $model->field }}` or `{{ old('field') }}`
5. Replace static URLs with `route()` helpers
6. Add `@error` / `is-invalid` for form validation feedback
7. Use `$collection->links()` for pagination

---

## Strict Rules

- **DO NOT** change CSS class names — they drive both styling and JavaScript behavior
- **DO NOT** introduce new CSS frameworks or custom stylesheets
- **DO NOT** reorganize div/section structure
- **DO NOT** create new component types — extend existing ones
- **DO** use the existing icon libraries already loaded in the theme (Font Awesome, Tabler, Bootstrap Icons, etc.)
- **DO** keep empty-state UI (`@empty` block) matching the template pattern
- **DO** preserve responsive classes (`d-none`, `d-md-block`, etc.)

---

## Common Blade Patterns

**Table with empty state:**
```blade
@forelse($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
    </tr>
@empty
    <tr><td colspan="100%">Aucun enregistrement trouvé.</td></tr>
@endforelse
```

**Form input with validation:**
```blade
<input type="text"
    class="form-control @error('name') is-invalid @enderror"
    name="name"
    value="{{ old('name', $model->name ?? '') }}">
@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
```

**Pagination:**
```blade
{{ $items->links() }}
```

**Action dropdown:**
```blade
<div class="dropdown">
    <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('item.edit', $item) }}">Modifier</a></li>
        <li>
            <form method="POST" action="{{ route('item.destroy', $item) }}">
                @csrf @method('DELETE')
                <button class="dropdown-item text-danger" type="submit">Supprimer</button>
            </form>
        </li>
    </ul>
</div>
```

---

## UI CONTRACT — BLADE CRUD PAGES (MANDATORY)

This section defines hard engineering rules. Every new Blade view generated for this project **must** comply with all points below, no exceptions.

### Step 0 — Pick Your Reference File First

Before writing a single line of Blade, open the correct reference file from the table below and keep it open as you write:

| Page type | Primary reference file(s) |
|-----------|--------------------------|
| **Index / List** (table + filters + actions) | `resources/views/customers.blade.php`, `resources/views/invoices.blade.php`, `resources/views/products.blade.php`, `resources/views/transactions.blade.php`, `resources/views/users.blade.php` |
| **Create form** | `resources/views/add-customer.blade.php`, `resources/views/add-product.blade.php`, `resources/views/add-invoice.blade.php`, `resources/views/add-quotation.blade.php` |
| **Edit form** | `resources/views/edit-customer.blade.php`, `resources/views/edit-product.blade.php`, `resources/views/edit-invoice.blade.php`, `resources/views/edit-quotation.blade.php` |
| **Show / Detail** | `resources/views/customer-details.blade.php`, `resources/views/invoice-details.blade.php` |
| **Roles & Permissions** | `resources/views/roles-permissions.blade.php`, `resources/views/permission.blade.php` |
| **Settings** | `resources/views/company-settings.blade.php`, `resources/views/account-settings.blade.php`, `resources/views/email-settings.blade.php`, `resources/views/invoice-settings.blade.php`, `resources/views/authentication-settings.blade.php` |
| **Dashboard** | `resources/views/admin-dashboard.blade.php`, `resources/views/super-admin-dashboard.blade.php` |

### Mandatory Rules

**Layout & Skeleton**
- Copy the exact page wrapper, `@extends`, and `@section` placements from the reference — do not invent a new layout hierarchy.
- Keep the breadcrumb/page-header area in the same position and with the same markup as the reference.
- Keep the card layout structure (`card`, `card-header`, `card-body`, `card-footer`) identical to the reference. Do not flatten or reorganize it.

**Class Names & Styling**
- Keep every CSS class name exactly as it appears in the reference (`br-10`, `dark-transparent`, `badge`, `ti-*` icons, etc.).
- Do NOT create new CSS classes or inline styles unless the identical pattern already exists in the reference file.
- Do NOT introduce any new CSS framework or utility layer.
- Icon usage must match the reference — same icon set (`ti` Tabler icons or whichever the reference uses), same size/placement conventions.

**List / Index pages**
- Copy the search input + filter row structure verbatim from `customers.blade.php` or the closest list reference.
- Copy the datatable wrapper, `<thead>`, `<tbody>`, and column structure from the reference.
- Place the "Ajouter / Nouveau" action button in the same position as in the reference (typically top-right of the card header).
- Replicate the action dropdown (Modifier / Supprimer / Voir) with the same menu items, icons, and `dark-transparent` badge or button style as the reference.
- Keep the pagination area markup matching the reference.
- Include the `@empty` / no-records row using the same empty-state pattern as the reference.

**Create / Edit forms**
- Copy the "form card" structure: same grid columns (`col-md-6`, etc.), same `form-group` wrappers, same label style, same required markers.
- Validation feedback must use `@error` + `is-invalid` + `invalid-feedback` exactly as shown in the reference forms.
- Button row (Enregistrer / Annuler) must be placed and styled identically to the reference.
- Help blocks and field descriptions must use the same markup pattern as the reference.

**Show / Detail pages**
- Use `customer-details.blade.php` or `invoice-details.blade.php` as the skeleton.
- Replicate the same layout blocks (info card, detail rows, related sub-tables) without reordering sections.

**Partials & Includes**
- If the reference uses `@include` for sub-components, replicate the same inclusion style. Do not invent a new partial architecture.
- Do not extract new Blade components (`<x-*>`) unless the reference already uses that pattern.

### Output Requirements (when generating a new view)

Every time you generate a new Blade file you must:

1. **State the reference** — begin your answer with: _"Based on `<reference-file>.blade.php` layout."_
2. **Provide the full file content** — no truncation, no `<!-- ... rest stays the same -->` shortcuts.
3. **Verify the UI contract** — run through the checklist below before finalising your answer.

### Fail-Safe Checklist (run before every final answer)

- [ ] Did I pick a reference Blade file that matches the page type (list / create / edit / show / settings)?
- [ ] Did I keep the same `@extends` / `@section` structure as the reference?
- [ ] Did I keep the same page wrapper, card, and header markup?
- [ ] Did I keep the same filter / search / table / action-dropdown layout?
- [ ] Did I avoid inventing new CSS classes, wrappers, or layout patterns?
- [ ] Did I keep icon usage and badge styles consistent with the reference?
- [ ] Did I keep the form grid, labels, validation feedback, and button row consistent (create/edit)?
- [ ] Did I keep breadcrumbs and page headings consistent with the reference?
- [ ] Did I include `@empty` / no-record state for all list pages?
- [ ] Did I provide the complete file (no omissions)?
- [ ] Are ALL user-facing strings written in French?

---

## Project Structure Notes

- Static UI reference templates: `resources/views/*.blade.php` (root level)
- Dynamic backoffice views: `resources/views/backoffice/`
- Dynamic superadmin views: `resources/views/superadmin/` (if applicable)
- Layouts/partials: `resources/views/backoffice/layout/`
- Routes: `routes/web.php`, `routes/backoffice/`, `routes/superadmin/`
- Controllers: `app/Http/Controllers/Backoffice/`, `app/Http/Controllers/SuperAdmin/`

---

> Full template listing and domain mapping: see [UI_UX_TEMPLATE_REFERENCE.md](UI_UX_TEMPLATE_REFERENCE.md)

---

## Mandatory Rules for Claude (START HERE EVERY SESSION)

```
1.  Read CLAUDE.md first — you are reading it now. ✓
2.  Read docs/project-understanding/update-log.md before editing ANYTHING.
3.  Read the specific module doc before touching that module:
      models.md, routes.md, controllers.md, database.md, permissions.md
4.  Respect the existing backoffice theme — DO NOT redesign UI.
5.  Do not redesign UI unless explicitly requested by the user.
6.  Keep frontoffice and backoffice design consistent with the current project.
7.  Use existing components, CSS classes, layout patterns, toastr/alert system,
    buttons, cards, tables, modals, and form styles.
8.  NEVER expose raw SQL errors, Laravel exceptions, or stack traces in production.
9.  Always validate requests server-side via Form Request classes.
10. Keep changes small and safe — one thing at a time.
11. Append an entry to docs/project-understanding/update-log.md after every change.
12. List all changed files at the end of your response.
```

---

## Project Overview

**Name:** Facturation SaaS
**Type:** Multi-tenant SaaS invoicing & financial management platform
**Framework:** Laravel 12.20+ (PHP 8.2+)
**Default locale:** French (`fr`)
**Architecture:** Multi-tenant with backoffice (tenant area) + superadmin panel

### Tech Stack

| Layer | Technology |
|-------|-----------|
| Framework | Laravel 12 |
| Auth | Laravel Sanctum + session guard |
| Roles/Permissions | Spatie Permission 6.24 |
| File uploads | Spatie Media Library 11 |
| Audit logging | Spatie Activity Log 4.12 |
| PDF generation | barryvdh/laravel-dompdf 3.1 |
| Excel export | maatwebsite/excel 3.1 |
| Word documents | phpoffice/phpword 1.4 |
| Testing | PHPUnit 11 |
| Database | MySQL (production), SQLite in-memory (tests) |

---

## Architecture Overview

```
Three separate areas:
┌─────────────────────────────────────┐
│  PUBLIC / FRONTOFFICE               │  No auth required
│  routes/frontoffice.php             │  Blog, contact, invoice share links
├─────────────────────────────────────┤
│  BACKOFFICE (Tenant Area)           │  Tenant users, auth + subscription
│  routes/backoffice/*.php (17 files) │  Invoicing, CRM, inventory, finance
│  Prefix: bo.*                       │
├─────────────────────────────────────┤
│  SUPERADMIN                         │  tenant_id = null users only
│  routes/superadmin/*.php (11 files) │  Tenant management, billing, blog
│  Prefix: sa.*                       │
└─────────────────────────────────────┘
```

### Multi-Tenancy
- Tenant identified from request domain via `IdentifyTenantByDomain` middleware
- `BelongsToTenant` trait adds global query scope to all domain models
- `tenant_id` is auto-assigned on model creation — never in `$fillable` on domain models
- `TenantContext` service (singleton) provides `tenant()` helper

### Authentication
- Single user table across all tenants
- `tenant_id = null` → super admin
- `tenant_id` set → regular tenant user
- `Gate::before` bypasses all policies for super admins and tenant admins/owners

---

## Key Paths Quick Reference

| What | Where |
|------|-------|
| Static UI reference templates | `resources/views/*.blade.php` (root level) |
| Dynamic backoffice views | `resources/views/backoffice/` |
| Master layout | `resources/views/backoffice/layout/mainlayout.blade.php` |
| Backoffice routes | `routes/backoffice/` (17 files) |
| SuperAdmin routes | `routes/superadmin/` (11 files) |
| Backoffice controllers | `app/Http/Controllers/Backoffice/` |
| SuperAdmin controllers | `app/Http/Controllers/SuperAdmin/` |
| Models (by domain) | `app/Models/` |
| Form requests | `app/Http/Requests/` |
| Services | `app/Services/` |
| Middleware | `app/Http/Middleware/` |
| Policies | `app/Policies/` |
| Factories | `database/factories/` (flat directory) |
| Full documentation | `docs/project-understanding/` |
| Change history | `docs/project-understanding/update-log.md` |

---

## Critical Schema Rules

**Always verify against the actual migration before writing model/controller code.**
These columns differ from naive assumptions:

| Model | WRONG | CORRECT |
|-------|-------|---------|
| Customer | `customer_type` | `type` |
| Customer | `currency_id` | `currency` |
| CustomerAddress | `address_type` | `type` |
| CustomerAddress | `address_line1` | `line1` |
| CustomerAddress | `state` | `region` |
| CustomerContact | `contact_name` | `name` |
| DebitNote | `debit_note_number` | `number` |
| DocumentNumberSequence | `document_type` | `key` |
| DocumentNumberSequence | `current_number` | `next_number` |
| BankAccount type | `checking` | `current` |
| StockTransfer status | `pending` | `draft` |
| Plan interval | `monthly`/`yearly` | `month`/`year` |
| SubscriptionInvoice payment_status | `completed` | `succeeded` |

Full details: `docs/project-understanding/known-issues.md`

---

## Production Safety Rules

- `APP_DEBUG` must be `false` in production `.env`
- Never expose `$exception->getMessage()` in Blade error views
- Never commit `.env` to git
- Run `php artisan config:cache && route:cache && view:cache` after deploy
- Soft deletes protect financial records — do NOT force-delete invoices, payments, etc.
- `DocumentNumberService` uses `lockForUpdate()` — do NOT change this logic

---

## Completed Phases

| Phase | Status | Summary |
|-------|--------|---------|
| Phase 0 | ✅ Done | Foundation hardening — tenant scoping, soft deletes, document numbering |
| Phase 2 | ✅ Done | CRM — Customers, Addresses, Contacts |
| Phase 3 | ✅ Done | Testing foundation — 90 passed, 1 skipped |
| Phase 4 | 🔄 Next | See `tasks/roadmap/` |
