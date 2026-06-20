# SYSTEM ANALYSIS — Facturation SaaS

> Full technical audit of the codebase. Generated from a recursive scan of controllers, models, services, routes, migrations, seeders, middleware, jobs, commands, notifications and mail.

---

## 1. What this software is

A **multi-tenant SaaS billing & business-management platform** built for the **Moroccan market** (default currency **MAD**, French UI, `forme_juridique`, auto-entrepreneur landing page). It is a "Zoho Invoice / Facture.net"-style product that lets a small or medium business run its entire commercial cycle — quotes → invoices → payments → purchases → inventory → finance → reports — from one dashboard, while the SaaS owner manages tenants, plans and subscriptions from a separate super-admin panel.

The product is delivered as three logical applications inside one Laravel codebase:

| App | URL prefix | Route names | Audience |
|-----|-----------|-------------|----------|
| **Frontoffice** (public marketing site) | `/` | `home`, `pricing`, … | Prospects / visitors |
| **Backoffice** (tenant workspace) | `/backoffice/*` | `bo.*` | Business owners & their staff |
| **SuperAdmin** (SaaS control panel) | `/admin/*` | `sa.*` | The SaaS operator (you) |

---

## 2. Technology stack

| Layer | Technology |
|-------|-----------|
| Framework | **Laravel 12** (PHP 8.2+) |
| Auth / API tokens | Laravel **Sanctum** |
| Permissions | **spatie/laravel-permission** (roles + permissions, tenant-scoped) |
| Activity log | **spatie/laravel-activitylog** |
| Media (logos, documents) | **spatie/laravel-medialibrary** |
| PDF generation | **barryvdh/laravel-dompdf** |
| Excel / CSV export | **maatwebsite/excel** |
| Word export | **phpoffice/phpword** |
| Frontend | **Blade** + Bootstrap theme (custom CSS, no SPA framework) |
| Build | **Vite** |
| DB (tests) | SQLite in-memory; production MySQL/MariaDB |
| Quality | Pint, PHP-CS-Fixer, Larastan/PHPStan, PHPInsights, PHPUnit 11 |

There is **no Vue/React/Livewire** — the UI is server-rendered Blade against a large library of static theme templates (300+ `resources/views/*.blade.php`).

---

## 3. Codebase size (scan results)

| Artifact | Count |
|----------|------:|
| Migrations | 90 |
| Models | 88 |
| Controllers | 97 |
| Services | 23 |
| Policies | 33 |
| Middleware | 10 |
| Jobs (queued) | 9 |
| Console commands (scheduled) | 4 |
| Notifications | 18 |
| Mailables | 6 |
| Seeders | 11 |
| Route files | 37 |
| Blade views (root templates) | 318 |

---

## 4. Multi-tenancy architecture

Tenancy is **single-database, row-scoped** (not database-per-tenant).

- **Tenant identification**: `IdentifyTenantByDomain` middleware resolves the tenant. Backoffice protected routes also derive the tenant from the authenticated user's `tenant_id`. Unknown domain on a backoffice route ⇒ `abort(404)`.
- **Tenant context**: `App\Services\Tenancy\TenantContext` holds the current `tenant_id`; `SetTenantContext` middleware sets it after auth.
- **Row scoping**: the `App\Traits\BelongsToTenant` trait applies a global scope so every tenant-owned model only ever reads/writes its own rows, and auto-fills `tenant_id` on create.
- **Mass-assignment hardening**: `tenant_id` was removed from `$fillable` on 30+ core domain models so it can't be spoofed via form input. Infrastructure/billing/system models intentionally keep it (see `MEMORY.md`).
- **Soft deletes**: 12 financially-critical models use `SoftDeletes` (recoverable via the Trash module).
- **Activity logging**: `App\Traits\LogsActivity` records create/update/delete on key models.
- **Currency**: `UsesTenantCurrency` trait formats money using the tenant's `default_currency` (MAD by default).

### Middleware pipeline (backoffice protected group)
```
web → auth → identifyTenant → tenantActive → setTenantContext → subscriptionActive → [permission:*] → [plan.limit:*]
```

### Document number generation
`App\Services\System\DocumentNumberService` issues sequential, per-tenant, per-document-type numbers inside a DB transaction with `lockForUpdate`, backed by `document_number_sequences` (unique on `tenant_id, key`). This prevents duplicate invoice numbers under concurrency.

---

## 5. Module map (domain → controllers/services)

| Domain | Controllers dir | Services | Core models |
|--------|----------------|----------|-------------|
| **CRM** | `Backoffice/CRM` | — | Customer, CustomerAddress, CustomerContact |
| **Catalog** | `Backoffice/Catalog` | TaxCalculationService | Product, ProductCategory, Unit, TaxCategory, TaxGroup, TaxGroupRate |
| **Inventory** | `Backoffice/Inventory` | StockService | Warehouse, ProductStock, StockMovement, StockTransfer(+Item) |
| **Sales** | `Backoffice/Sales` | Invoice, Quote, Payment, CreditNote, DeliveryChallan, Refund, Tax, Pdf | Invoice, Quote, Payment, CreditNote, DeliveryChallan, Refund, PaymentMethod, allocations |
| **Purchases** | `Backoffice/Purchases` | PurchaseOrder, GoodsReceipt, VendorBill, DebitNote, SupplierPayment | Supplier, PurchaseOrder, GoodsReceipt, VendorBill, DebitNote, SupplierPayment |
| **Finance** | `Backoffice/Finance` | Expense, Income, Loan, Currency | BankAccount, Expense, Income, Loan(+Installment/Payment), MoneyTransfer, FinanceCategory, Currency, ExchangeRate |
| **Pro** | `Backoffice/Pro` | — | RecurringInvoice, InvoiceReminder, Branch |
| **Reports** | `Backoffice/Reports` | ReportService, ListExportService | CustomReport |
| **Access** | `Backoffice/Access` | — | Role, Permission (Spatie, tenant-scoped) |
| **Users** | `Backoffice/Users` | — | User, UserInvitation |
| **Settings** | `Backoffice/Settings` | — | TenantSetting, Signature, Integration |
| **Support** | `Backoffice/Support` | — | SupportTicket, SupportTicketReply |
| **Billing** | `Backoffice/Billing` + SuperAdmin | PlanLimitService | Plan, Subscription, SubscriptionInvoice |
| **Templates** | SuperAdmin / Settings | — | TemplateCatalog, TenantTemplate, TenantTemplatePreference, TemplatePurchase |
| **System** | SuperAdmin | — | AccountRequest, ContactMessage, Announcement, NewsletterSubscriber, ActivityLog, EmailLog, LoginLog, NotificationLog, Document |

---

## 6. Automation & background processing

### Scheduled commands (`routes/console.php`, requires server cron `* * * * * php artisan schedule:run`)
| Schedule | Command | Effect |
|----------|---------|--------|
| Daily 06:00 | `invoice:generate-recurring` | Generates invoices from `RecurringInvoice` templates due today |
| Daily 08:00 | `invoice:send-reminders` | Sends payment reminders for due/overdue invoices |
| Daily 00:30 | `subscription:check-expired` | Expires lapsed subscriptions |
| Daily 07:00 | `loan:process-installments` | Marks overdue loan installments |

### Queued jobs (`app/Jobs`)
Email delivery for every outbound document is queued: Invoice, Quote, CreditNote, DebitNote, DeliveryChallan, PurchaseOrder, VendorBill, plus `SendUserInvitationJob` and `ExportReportJob`.

### Events
`InvoiceCreated`, `InvoicePaid` are dispatched by `InvoiceService` (extension points for notifications/automation).

---

## 7. Notifications & mail

- **18 in-app/database notifications** (Spatie notifications table) covering document-sent, payment-received, invoice-overdue/reminder, support-ticket lifecycle, subscription-expiring, announcements, user-invitation, email verification.
- **6 Mailables**: AccountApproved, ContactForm, InvoiceReminder, NewsletterWelcome, PaymentReceived, Welcome.
- Outbound email is logged to `email_logs`; notifications to `notification_logs`.

---

## 8. SaaS billing / plan gating

- **Plans** (seeded): `Gratuit` (free, lifetime, MAD 0 — 50 invoices, 1 user, modules: sales+crm) and `Premium` (lifetime, MAD 399 — unlimited, all modules + api).
- **PlanLimitService** enforces per-resource caps (`users, customers, products, invoices_per_month, quotes_per_month, exports_per_month, warehouses, bank_accounts`). `null`/`-1` = unlimited. Active plan cached 5 min per tenant.
- **`plan.limit:<resource>`** middleware blocks create routes when the cap is hit (e.g. invoice create, PDF export).
- **`subscriptionActive`** middleware requires an active/trialing subscription to use the backoffice at all.
- The SuperAdmin can override per-tenant limits via `tenants/{tenant}/usage`.

---

## 9. APIs & integrations (current state)

- **Sanctum** + `personal_access_tokens` table are installed → API auth is ready.
- `routes/api/tenant.php` and `routes/api/webhooks.php` exist but are **empty placeholders** — the public/tenant REST API and webhooks are **not yet implemented**.
- `Integration` model (provider, credentials, settings, last_synced_at) is a generic slot for third-party integrations, currently unused by feature code.
- `addons.md` documents two **planned** addons: an **AI Tokens** monetization system (sell AI actions per token) and a **Telegram bot** for document workflows.

**Net:** today the system is a server-rendered web app. There is no live external API, no payment-gateway integration in code, and no CRM/marketing-tool integration yet — these are the biggest greenfield opportunities (see FUTURE_IMPROVEMENTS.md).

---

## 10. Security posture (observed)

Strong for an app of this size:
- Tenant isolation via global scopes + `tenant_id` removed from fillable.
- 33 policies + `permission:` middleware on routes; `Gate::before` grants tenant `admin` a full bypass.
- `ContentSecurityPolicy` middleware applied to the whole `web` group.
- PDF-download throttling, soft deletes + Trash recovery, login logging.
- Unique constraints on invoice numbers and document sequences per tenant.

Gaps: no 2FA enforcement in code (auth-settings view exists), no rate-limit specifics on auth endpoints visible here, webhooks/API unbuilt.

---

## 11. Test coverage

Phase-3 testing foundation: **90 passing / 1 skipped**. SQLite in-memory, 28 factories, helpers for tenant+admin creation. Tests focus on tenant isolation, mass-assignment protection, tenant scope, and document numbering — the security-critical core.
