# DATABASE DOCUMENTATION — Facturation SaaS

> Derived from the 90 migrations in `database/migrations/` and the 88 Eloquent models in `app/Models/`. All primary keys are **UUIDs** (`HasUuids`). Every tenant-owned table carries a `tenant_id` FK and is row-scoped by the `BelongsToTenant` global scope. Financially-critical tables have `deleted_at` (soft deletes).

---

## 1. Entity domains (ERD overview)

```
                         ┌──────────────┐
                         │   tenants    │  (the SaaS customer / company)
                         └──────┬───────┘
        ┌───────────────┬───────┼────────────┬───────────────┬──────────────┐
        │               │       │            │               │              │
   ┌────▼────┐   ┌──────▼─────┐ │      ┌─────▼─────┐   ┌──────▼──────┐ ┌─────▼──────┐
   │  users  │   │tenant_     │ │      │subscriptions│  │ tenant_     │ │integrations│
   │ (+roles)│   │settings    │ │      │  → plans    │  │ templates   │ │            │
   └─────────┘   └────────────┘ │      └─────────────┘  └─────────────┘ └────────────┘
                                │
   ┌────────────────────────────┼─────────────────────────────────────────────┐
   │                            │                                               │
CRM ▼              CATALOG / INVENTORY ▼            SALES ▼            PURCHASES ▼
customers          products                          quotes            suppliers
 ├ addresses        ├ product_categories             invoices          purchase_orders
 └ contacts         ├ units                           ├ items           ├ goods_receipts
                    ├ tax_categories                  ├ charges         ├ vendor_bills
                    ├ tax_groups (+rates)             payments          ├ debit_notes
                    ├ warehouses                       ├ allocations     └ supplier_payments
                    ├ product_stocks                  credit_notes
                    ├ stock_movements                 delivery_challans
                    └ stock_transfers (+items)        refunds

FINANCE ▼                              PRO ▼                   SYSTEM ▼
bank_accounts                          recurring_invoices      documents
expenses (+payments)                   invoice_reminders       activity_logs
incomes                                branches                email/notification/login_logs
loans (+installments,+payments)                                announcements
money_transfers                                                support_tickets (+replies)
finance_categories                                             account_requests
currencies / exchange_rates                                    contact_messages
                                                               newsletter_subscribers
```

---

## 2. Core business entities

### Tenancy
| Table | Key columns | Notes |
|-------|-------------|-------|
| `tenants` | name, slug, status, timezone, default_currency, forme_juridique, setup_completed, has_free_trial, trial_ends_at | The company. `HasMedia` for logos/favicon. |
| `users` | tenant_id, name, email, password, role (via Spatie) | `tenant_id = null` ⇒ super-admin. |
| `tenant_settings` | tenant_id, company info, invoice prefs, localization | 1:1 with tenant. |
| `signatures` | tenant_id, … | Reusable document signatures. |
| `integrations` | tenant_id, provider, credentials(json), settings(json), last_synced_at | Generic integration slot (unused yet). |
| Spatie tables | `roles`, `permissions`, `model_has_roles`, `model_has_permissions`, `role_has_permissions` | Roles/permissions are **tenant-scoped** (`tenant_id` column added). |

### CRM
| Table | Key columns |
|-------|-------------|
| `customers` | tenant_id, **type** (individual/company), name, email, phone, **currency**, **payment_terms_days**, tax id |
| `customer_addresses` | customer_id, **type**, **line1/line2**, city, **region**, postal_code, country |
| `customer_contacts` | customer_id, name, email, phone, position, is_primary |

> ⚠️ Schema note (from prior phases): the column is `type` not `customer_type`; `currency` not `currency_id`; `payment_terms_days` not `payment_terms`. Addresses use `line1/region`, not `address_line1/state`.

### Catalog & Tax
| Table | Purpose |
|-------|---------|
| `products` | Items/services sold; price, cost, unit, category, tax group, stock-tracking flag |
| `product_categories` / `units` | Classification & units of measure |
| `tax_categories`, `tax_groups`, `tax_group_rates` | Configurable multi-rate tax (Moroccan TVA: 20%, 14%, 10%, 7%, 0%) |

### Inventory
| Table | Purpose |
|-------|---------|
| `warehouses` | Stock locations |
| `product_stocks` | Per-warehouse on-hand quantity |
| `stock_movements` | Ledger of every in/out movement |
| `stock_transfers` (+ `stock_transfer_items`) | Move stock between warehouses. Status enum: `draft, in_transit, received, cancelled` |

### Sales
| Table | Key columns / status |
|-------|----------------------|
| `quotes` (+ `quote_items`, `quote_charges`) | number, customer, totals; convertible to invoice |
| `invoices` (+ `invoice_items`, `invoice_charges`) | number, status (`draft → sent → partial/paid → void`), issue_date, due_date, subtotal, discount_total, tax_total, total, amount_paid, amount_due, bill_from/to snapshots (JSON), bank_details_snapshot, sent_at, paid_at |
| `payments` (+ `payment_allocations`) | Customer payments allocated across one/many invoices |
| `payment_methods` | Tenant-defined methods (cash, transfer, …) |
| `credit_notes` (+ items, `credit_note_applications`) | Reduce/refund invoice value, applied to invoices |
| `delivery_challans` (+ items, charges) | Delivery/dispatch notes |
| `refunds` | Money returned to customer |

**Calculated fields**: `subtotal`, `discount_total`, `tax_total`, `total`, `amount_due`, `total_in_words` — all computed server-side by `TaxCalculationService`, never trusted from the client. `amount_paid`/`amount_due` are maintained as payments and credit notes are allocated.

### Purchases (mirror of sales, supplier side)
`suppliers → purchase_orders → goods_receipts → vendor_bills`, plus `debit_notes` (supplier-side credit notes) and `supplier_payments` (+ allocations, payment methods). DebitNote columns: `number`, `total`, `tax_total` (not debit_note_number/total_amount/tax_amount).

### Finance
| Table | Purpose |
|-------|---------|
| `bank_accounts` | type enum `current, savings, business, other` |
| `expenses` (+ `expense_payments`) | Recorded costs, partially payable |
| `incomes` | Non-invoice income |
| `loans` (+ `loan_installments`, `loan_payments`) | Loan tracking with installment schedule |
| `money_transfers` | Between bank accounts |
| `finance_categories` | Categorize expenses/incomes |
| `currencies`, `exchange_rates` | Multi-currency support |

### Pro
| Table | Purpose |
|-------|---------|
| `recurring_invoices` | template_invoice_id, interval, every, next_run_at, end_at, status (`active`) → drives daily cron |
| `invoice_reminders` | Scheduled reminders for unpaid invoices |
| `branches` | Multiple business locations |

### Billing (SaaS-level, super-admin owned)
| Table | Purpose |
|-------|---------|
| `plans` | code, name, interval (`month, year, lifetime`), price, currency, trial_days, features(json incl. max_* limits & module list) |
| `subscriptions` | tenant_id, plan_id, status (`active, trialing, …`), starts_at |
| `subscription_invoices` | SaaS billing invoices to tenants |

### Templates marketplace
`template_catalog` (sellable invoice/document designs), `tenant_templates`, `tenant_template_preferences`, `template_purchases`.

### System / Support / Public-site
| Table | Purpose |
|-------|---------|
| `documents` | Generic stored documents/attachments |
| `document_number_sequences` | Per-tenant, per-type counters (unique tenant_id,key) |
| `activity_logs`, `email_logs`, `login_logs`, `notification_logs` | Audit & delivery logs |
| `notifications` | Spatie database notifications |
| `support_tickets` (+ `support_ticket_replies`) | Tenant ↔ SaaS support |
| `announcements` | Broadcast messages from super-admin |
| `account_requests` | Public "request an account" leads |
| `delete_account_requests` | GDPR-style deletion requests |
| `contact_messages` | Public contact form submissions |
| `newsletter_subscribers` | Marketing list |
| `user_invitations` | Token-based teammate invites |
| `custom_reports` | Saved/custom report definitions |
| `personal_access_tokens` | Sanctum API tokens |
| `media` | Spatie media (logos, document images) |

---

## 3. Key relationships (foreign keys)

- `users.tenant_id → tenants.id`
- `invoices.customer_id → customers.id`, `invoices.quote_id → quotes.id`, `invoices.bank_account_id → bank_accounts.id`
- `invoice_items.invoice_id → invoices.id`, `invoice_items.product_id → products.id`, `.unit_id → units.id`, `.tax_group_id → tax_groups.id`
- `payment_allocations.payment_id → payments.id`, `.invoice_id → invoices.id` (many-to-many money allocation)
- `credit_note_applications.credit_note_id`, `.invoice_id`
- `product_stocks.product_id`, `.warehouse_id`
- `stock_movements.product_id`, `.warehouse_id`
- `subscriptions.tenant_id`, `.plan_id`
- `recurring_invoices.template_invoice_id → invoices.id`

A `2026_03_23` migration retro-added `bank_account_id` to multiple document tables.

---

## 4. Important enumerations

| Domain | Field | Allowed values |
|--------|-------|----------------|
| Invoice | status | draft, sent, partial, paid, void |
| Plan | interval | month, year, lifetime |
| Payment | status | pending, succeeded, failed, refunded, cancelled |
| BankAccount | type | current, savings, business, other |
| StockTransfer | status | draft, in_transit, received, cancelled |
| Customer | type | individual, company |
| Subscription | status | active, trialing, expired/cancelled |

---

## 5. Integrity & concurrency safeguards

- **Unique** `document_number_sequences(tenant_id, key)` and `invoices(tenant_id, invoice_number)`.
- Document numbers issued inside a transaction with `lockForUpdate` (no duplicate numbers under load).
- Soft deletes on 12 financial tables → recoverable via Trash module.
- Money totals are recomputed server-side on every create/update; client values are ignored.
