# CRM & BUSINESS WORKFLOWS — Facturation SaaS

> How a customer enters the system, how a lead becomes a paying tenant, and how the core commercial cycles flow through the code.

---

## 1. Two CRMs in this product

There are **two distinct CRM layers** — don't confuse them:

1. **SaaS-level CRM** (your sales funnel to acquire *tenants*): lives in `account_requests`, `contact_messages`, `newsletter_subscribers`, and the SuperAdmin panel.
2. **Tenant-level CRM** (each company's customers): lives in `customers`, `customer_addresses`, `customer_contacts` inside the backoffice.

---

## 2. SaaS lead → paying tenant (your acquisition funnel)

```
Visitor on public site
        │
        ├── Newsletter signup ──────────► newsletter_subscribers (+ welcome email)
        ├── Contact form ───────────────► contact_messages (+ email to you)
        └── "Demande de compte" ────────► account_requests  ◄── PRIMARY conversion
                                                │
                              SuperAdmin reviews in /admin/account-requests
                                                │
                                  Approve ──────► provisions Tenant + admin user
                                                │   (AccountApprovedMail / WelcomeMail)
                                                ▼
                              Tenant logs in → onboarding (setup_completed)
                                                │
                              Chooses plan ─────► subscription (free / trialing / premium)
                                                ▼
                              Active paying tenant
```

Key states:
- `tenant.status` (active / suspended), `tenant.setup_completed`, `tenant.has_free_trial`, `tenant.trial_ends_at`.
- `subscription.status`: `trialing → active → expired/cancelled` (daily `subscription:check-expired` cron expires lapsed ones).
- The `subscriptionActive` middleware locks the backoffice until there's an active/trialing subscription → natural upgrade pressure.

---

## 3. Tenant-level CRM workflow (the company's own customers)

```
New customer ──► customers (type: individual|company, currency, payment_terms_days)
        │
        ├── Addresses (billing/shipping) ─► customer_addresses
        └── Contacts (people) ────────────► customer_contacts (is_primary)
        │
        ▼
Quote ──convert──► Invoice ──► Payment(s) ──► (Credit Note / Refund if needed)
```

Customer-level data that drives sales: `payment_terms_days` (auto-sets invoice due date), `currency` (per-customer currency), primary contact (who receives emails).

---

## 4. Quote-to-Cash workflow (core money cycle)

```
┌─────────┐  convert   ┌──────────┐   send    ┌──────────┐  pay   ┌──────────┐
│  QUOTE  │ ─────────► │ INVOICE  │ ────────► │  SENT    │ ─────► │  PAID    │
│ (draft) │            │ (draft)  │           │          │        │          │
└─────────┘            └──────────┘           └────┬─────┘        └──────────┘
                                                   │ partial payment
                                                   ▼
                                              ┌──────────┐
                                              │ PARTIAL  │
                                              └──────────┘
   Adjust value down ──► CREDIT NOTE (apply to invoice)
   Cancel ───────────► VOID
   Deliver goods ────► DELIVERY CHALLAN
   Give money back ──► REFUND
```

Code path (`InvoiceService`):
1. `create()` — runs items+charges through `TaxCalculationService`, issues a sequential number via `DocumentNumberService`, sets `status=draft`, `amount_due=total`. Dispatches `InvoiceCreated`. Optionally spawns a `RecurringInvoice`.
2. `send()` — queues `SendInvoiceEmailJob`, sets `sent_at`, status → `sent`, notifies via `InvoiceSentNotification`.
3. Payment recorded via `PaymentService` → `payment_allocations` reduce `amount_due`; when fully covered, status → `paid`, `paid_at` set, `InvoicePaid` event + `PaymentReceivedNotification`/mail.
4. `void()` — cancels an issued invoice.

**Only `draft` invoices can be edited** (enforced in `InvoiceService::update`). Issued invoices are immutable except via credit notes/voids — correct accounting hygiene.

---

## 5. Procure-to-Pay workflow (purchases mirror)

```
SUPPLIER ──► PURCHASE ORDER ──► GOODS RECEIPT ──► VENDOR BILL ──► SUPPLIER PAYMENT
                                     │
                              DEBIT NOTE (supplier-side credit) ── applies to bills
```
Stock received via Goods Receipt increments `product_stocks` through `StockService`.

---

## 6. Payment handling

- Payments are **customer-level** and **allocated** across one or many invoices (`payment_allocations`), so a single transfer can settle multiple invoices.
- `amount_paid` / `amount_due` on each invoice are kept in sync as allocations and credit notes apply.
- Payment methods are tenant-defined (`payment_methods`).
- Each payment can produce a **receipt PDF** and triggers `PaymentReceivedNotification` + mail.
- No online payment gateway is wired in code yet — payments are recorded manually (cash/transfer). (See FUTURE_IMPROVEMENTS.)

---

## 7. Scheduling / automation

| When | Job | Workflow effect |
|------|-----|-----------------|
| Daily 06:00 | `invoice:generate-recurring` | Creates invoices from `recurring_invoices` whose `next_run_at` is due; advances `next_run_at` by `interval × every`. |
| Daily 08:00 | `invoice:send-reminders` | Emails reminders for due/overdue invoices (`InvoiceReminderNotification` / `InvoiceReminderMail`). |
| Daily 07:00 | `loan:process-installments` | Flags overdue loan installments. |
| Daily 00:30 | `subscription:check-expired` | Expires lapsed SaaS subscriptions → blocks backoffice. |

Requires server cron: `* * * * * php artisan schedule:run`.

---

## 8. Reporting workflow
- `ReportService` aggregates sales/customers/purchases/inventory/finance.
- `CustomReport` stores saved report definitions.
- Exports run through `ListExportService` / `ExportReportJob` → Excel, CSV, Word, PDF.

---

## 9. Notifications workflow
- **18 notification types** stored in the `notifications` table (database channel) + optional mail.
- Triggered on: document sent, payment received, invoice overdue/reminder, support-ticket lifecycle, subscription expiring, announcement, user invitation, email verification.
- Delivery is logged to `notification_logs` / `email_logs`.

---

## 10. Support workflow
```
Tenant opens SupportTicket ──► SuperAdmin sees it in /admin/support-tickets
        │                                   │
        └── replies (SupportTicketReply) ◄──┘ (both sides)
        │
   Status changes ──► SupportTicketStatusChangedNotification
```

---

## 11. Permissions workflow
1. Permissions seeded globally (`{group}.{module}.{action}`).
2. Roles seeded and granted permission subsets (see ROLE_MATRIX).
3. Each tenant gets tenant-scoped copies of roles.
4. Admin assigns roles to users; `RequirePermission` middleware + policies enforce at runtime; `Gate::before` lets tenant admin bypass.
