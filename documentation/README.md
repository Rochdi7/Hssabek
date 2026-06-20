# Facturation SaaS — Master Documentation

> A multi-tenant SaaS billing & business-management platform for the **Moroccan market** (MAD currency, French UI, TVA-aware, auto-entrepreneur focus). Built on **Laravel 12**.

This README is the index for the full audit. Detailed documents live alongside it in `/documentation`.

| Document | What's inside |
|----------|---------------|
| [SYSTEM_ANALYSIS.md](SYSTEM_ANALYSIS.md) | Full technical audit: stack, architecture, multi-tenancy, automation, security |
| [DATABASE_DOCUMENTATION.md](DATABASE_DOCUMENTATION.md) | ERD, tables, relationships, enums, integrity safeguards |
| [FEATURE_INVENTORY.md](FEATURE_INVENTORY.md) | Every module: purpose, value, users, screens, tables |
| [ROLE_MATRIX.md](ROLE_MATRIX.md) | Roles, permissions, and the access matrix |
| [CRM_WORKFLOWS.md](CRM_WORKFLOWS.md) | Acquisition funnel + quote-to-cash + procure-to-pay + automation |
| [MARKETING_STRATEGY.md](MARKETING_STRATEGY.md) | ICPs, channels, ads, SEO, messaging, funnel |
| [WHATSAPP_SALES_PLAYBOOK_DARIJA.md](WHATSAPP_SALES_PLAYBOOK_DARIJA.md) | 8-stage trust-based WhatsApp sales playbook |
| [OBJECTION_HANDLING.md](OBJECTION_HANDLING.md) | Every objection with Darija replies |
| [READY_TO_SEND_REPLIES.md](READY_TO_SEND_REPLIES.md) | Copy-paste WhatsApp replies |
| [CONSULTATIVE_SELLING_BY_SECTOR.md](CONSULTATIVE_SELLING_BY_SECTOR.md) | Sector-by-sector diagnostic selling |
| [FUTURE_IMPROVEMENTS.md](FUTURE_IMPROVEMENTS.md) | Prioritized roadmap |

---

# Overview

The product runs a business's entire commercial cycle — **quotes → invoices → payments → purchases → inventory → finance → reports** — from one dashboard, while the SaaS operator manages tenants, plans, and subscriptions from a separate super-admin panel. It is delivered as three apps in one codebase:

- **Frontoffice** (`/`) — public marketing site & lead capture.
- **Backoffice** (`/backoffice`, `bo.*`) — the tenant workspace.
- **SuperAdmin** (`/admin`, `sa.*`) — the SaaS control panel.

---

# Business Purpose

Moroccan auto-entrepreneurs and small businesses bill clients with Excel/Word, mishandle TVA, and can't track who hasn't paid. This product replaces that with fast, professional, TVA-correct invoicing plus full follow-up, inventory, purchasing, and finance — sold as a freemium SaaS (**Gratuit 0 DH** / **Premium 399 DH lifetime**).

---

# Architecture

- **Laravel 12 / PHP 8.2+**, Blade server-rendered UI (Bootstrap theme; no SPA).
- **Single-database multi-tenancy**, row-scoped via the `BelongsToTenant` trait + global scope; tenant resolved by domain/user and held in `TenantContext`.
- **Middleware pipeline**: `auth → identifyTenant → tenantActive → setTenantContext → subscriptionActive → permission → plan.limit`.
- **Packages**: Sanctum (API tokens), spatie permission/activitylog/medialibrary, DomPDF, Maatwebsite Excel, PhpWord.
- **Sequential document numbers** issued transactionally with `lockForUpdate` (no duplicates).

See [SYSTEM_ANALYSIS.md](SYSTEM_ANALYSIS.md).

---

# Database

90 migrations, 88 UUID-keyed models across domains: Tenancy, CRM, Catalog, Inventory, Sales, Purchases, Finance, Pro, Billing, Templates, System/Support. Financial tables use soft deletes; invoice numbers and sequences are uniquely constrained per tenant. Full ERD and table reference in [DATABASE_DOCUMENTATION.md](DATABASE_DOCUMENTATION.md).

---

# Features

CRM · Catalog & TVA · Inventory · Sales (quotes, invoices, payments, credit notes, delivery challans, refunds) · Purchases (suppliers, POs, goods receipts, vendor bills, debit notes, supplier payments) · Finance (banks, expenses, incomes, loans, transfers, multi-currency) · Pro (recurring invoices, reminders, branches) · Reports & exports · Access control · Settings · Support · Templates marketplace. Full inventory in [FEATURE_INVENTORY.md](FEATURE_INVENTORY.md).

---

# User Roles

`super_admin` (SaaS) · `admin` · `manager` · `accountant` · `receptionist` · `viewer` (tenant). Permissions follow `{group}.{module}.{action}`; tenant `admin` bypasses policies via `Gate::before`. Matrix in [ROLE_MATRIX.md](ROLE_MATRIX.md).

---

# CRM Workflows

Two CRMs: the SaaS acquisition funnel (`account_requests`, `contact_messages`, `newsletter_subscribers`) and each tenant's own customer CRM. Core cycles: quote→cash and procure→pay. See [CRM_WORKFLOWS.md](CRM_WORKFLOWS.md).

---

# APIs

- **Sanctum is installed**; `personal_access_tokens` table exists.
- `routes/api/tenant.php` and `routes/api/webhooks.php` are **empty placeholders** — the public API and webhooks are **not yet built** (top roadmap item).
- A generic `Integration` model exists for future third-party connections.

---

# Automations

Scheduled (requires server cron `* * * * * php artisan schedule:run`):
- `invoice:generate-recurring` — daily 06:00
- `invoice:send-reminders` — daily 08:00
- `loan:process-installments` — daily 07:00
- `subscription:check-expired` — daily 00:30

Queued jobs send every outbound document email; events `InvoiceCreated` / `InvoicePaid` are dispatched for extension.

---

# Notifications

18 database/mail notification types (document sent, payment received, invoice overdue/reminder, support lifecycle, subscription expiring, announcements, invitations, email verification) + 6 Mailables. Delivery logged to `email_logs` / `notification_logs`.

---

# Marketing Opportunities

Freemium funnel + WhatsApp-first selling + auto-entrepreneur SEO. ICPs, channels (Meta/Google/SEO/WhatsApp/email/referral), hooks, and creatives in [MARKETING_STRATEGY.md](MARKETING_STRATEGY.md). Darija sales assets in the WhatsApp/objection/replies/consultative docs.

---

# Future Improvements

Online payments (CMI), self-serve upgrades, REST API + webhooks, WhatsApp document sending, AI Tokens addon, DGI e-invoicing, 2FA, CSV imports, customer portal. Prioritized in [FUTURE_IMPROVEMENTS.md](FUTURE_IMPROVEMENTS.md).

---

# Technical Documentation

- **Controllers**: `app/Http/Controllers/{Backoffice,SuperAdmin,Web,Auth}/…`
- **Services** (business logic): `app/Services/{Sales,Purchases,Finance,Inventory,Billing,Reports,System,Tenancy}/…`
- **Policies**: `app/Policies/` (33)
- **Middleware**: `app/Http/Middleware/` (10)
- **Jobs**: `app/Jobs/` (9) · **Commands**: `app/Console/Commands/` (4)
- **Routes**: `routes/web.php` includes `routes/frontoffice.php`, `routes/backoffice/*`, `routes/superadmin/*`, `routes/api/*`
- **Views**: 318 static theme templates in `resources/views/*.blade.php` (mapped in `UI_UX_TEMPLATE_REFERENCE.md`); dynamic views in `resources/views/backoffice/`, `superadmin/`, `frontoffice/`
- **UI rule**: new views must reuse the matching static template's markup/classes (see `CLAUDE.md`).

---

# Installation

```bash
git clone <repo> && cd facturation
composer install
npm install
cp .env.example .env
php artisan key:generate
# configure DB + mail in .env
php artisan migrate --seed      # seeds permissions, roles, plans, defaults
npm run build                   # or: npm run dev
php artisan serve
```

Seeders run: `PermissionSeeder`, `RoleSeeder`, `PlanSeeder` (Gratuit/Premium), `TenantDefaultsSeeder`, `FinanceCategorySeeder`, plus optional `DemoTenantSeeder`/`FakeDataSeeder` for demo data.

---

# Deployment

1. Set production `.env` (APP_ENV=production, real DB, mail/queue drivers).
2. `composer install --no-dev --optimize-autoloader`
3. `php artisan migrate --force`
4. `php artisan config:cache route:cache view:cache`
5. `npm run build`
6. **Queue worker** (Supervisor): `php artisan queue:work` — required for emails/exports.
7. **Scheduler** (cron): `* * * * * cd /path && php artisan schedule:run >> /dev/null 2>&1` — required for recurring invoices, reminders, subscription expiry, loan installments.
8. Configure multi-tenant domains so `IdentifyTenantByDomain` resolves tenants.

---

# Maintenance

- **Daily**: confirm scheduler + queue worker are alive; monitor `email_logs`/`notification_logs` for failures.
- **Subscriptions**: `subscription:check-expired` keeps billing state correct; watch tenants nearing `trial_ends_at`.
- **Backups**: nightly DB dump + `storage/` (media). Soft-deleted records recoverable via the Trash module.
- **Security**: keep Laravel + Spatie packages patched; run Larastan/PHPStan + PHPInsights (configs present); review `activity_logs`/`login_logs`.
- **Tests**: `php artisan test` (90 passing / 1 skipped baseline) before each deploy.
- **Pre-prod cleanup**: remove `themeroutes.php` scaffolding; fix the skipped invitation test.

---

*Generated by a full codebase audit. All user-facing strings in the product are French per project policy (`CLAUDE.md`); the Darija documents here are sales enablement, not product copy.*
