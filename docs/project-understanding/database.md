# Database Documentation

## Overview

- **Database engine:** MySQL (production) / SQLite (tests)
- **Migration count:** 100+ migrations
- **Migration location:** `database/migrations/`
- **Seeders:** `database/seeders/`
- **Factories:** `database/factories/` (flat directory, not nested)

---

## Schema Conventions

### Primary Keys
All tenant domain models use **UUID** primary keys:
```php
public $incrementing = false;
protected $keyType = 'string';
```

### Timestamps
All models use standard `created_at` / `updated_at` except:
- `PaymentAllocation` — `$timestamps = false`
- `TenantSetting` — `CREATED_AT = null`, `UPDATED_AT = 'updated_at'`

### Soft Deletes
Applied to all financially critical models:
```
invoices, quotes, payments, credit_notes, delivery_challans, refunds
purchase_orders, vendor_bills, goods_receipts, debit_notes, supplier_payments
expenses, loans, customers, suppliers, products, warehouses
```

### Tenant Scoping
All tenant-owned tables have a `tenant_id` foreign key column.
Applied automatically via `BelongsToTenant` trait on models.

---

## Migration Timeline

### Bootstrap (2026-01-01 — Laravel defaults)
- `users` — basic auth table (overridden by custom migration)
- `cache`, `jobs` — Laravel queue/cache tables

### Foundation (2026-02-01_000001 to 000016)
| Migration | Creates |
|-----------|---------|
| 000001 | `tenants` |
| 000002 | `tenant_domains` |
| 000003 | `users` (custom with tenant_id, status, locale) |
| 000004 | `tenant_settings` |
| 000005 | `signatures` |
| 000006 | `integrations` |
| 000007 | `product_categories` |
| 000008 | `units` |
| 000009 | `tax_categories` |
| 000010 | `tax_groups` + `tax_group_rates` |
| 000011 | `currencies` |
| 000012 | `exchange_rates` |
| 000013 | `payment_methods` |
| 000014 | `bank_accounts` |
| 000015 | `warehouses` |
| 000016 | `products` |

### Sales Domain (2026-02-01_000017 to 000035)
```
customer_addresses, customer_contacts, customers
quotes, quote_items, quote_charges
invoices, invoice_items, invoice_charges
payments, payment_allocations
credit_notes, credit_note_items, credit_note_applications
delivery_challans, delivery_challan_items, delivery_challan_charges
refunds
```

### Purchases Domain (2026-02-01_000036 to 000055)
```
suppliers, supplier_payment_methods
purchase_orders, purchase_order_items
vendor_bills, vendor_bill_items
goods_receipts, goods_receipt_items
debit_notes, debit_note_items, debit_note_applications
supplier_payments, supplier_payment_allocations
```

### Finance / Pro (2026-02-01_000056 to 000075)
```
finance_categories, expenses, expense_payments
incomes, loans, loan_installments, loan_payments
plans, subscriptions, subscription_invoices
branches, recurring_invoices, invoice_reminders
documents, document_number_sequences
custom_reports
```

### Spatie Packages (2026-02-27)
```
roles, permissions, model_has_roles, model_has_permissions, role_has_permissions
media
activity_log
```

### System Features (2026-03-06 to 2026-03-14)
```
delete_account_requests
announcements
notification_logs
login_logs
email_logs
support_tickets, support_ticket_replies
account_requests
contact_messages
newsletter_subscribers
template_catalogs, tenant_templates, tenant_template_preferences
user_invitations
```

### Phase 0 Security Hardening (2026-03-01)
```
2026_03_01_000001-000011  — SoftDeletes columns added to 11 models
2026_03_01_000012         — UNIQUE constraint: document_number_sequences(tenant_id, key)
2026_03_01_000013         — UNIQUE constraint: invoices(tenant_id, invoice_number)
2026_03_01_000014-000016  — Additional security migrations
```

### Recent Features (2026-06)
```
2026_06_20   — public_token columns on invoices and quotes (for shareable links)
2026_06_21   — measurement fields: length, width, height, thickness on invoice_items, quote_items
```

---

## Key Unique Constraints

| Table | Unique columns |
|-------|---------------|
| `invoices` | `(tenant_id, invoice_number)` |
| `document_number_sequences` | `(tenant_id, key)` |
| `users` | `email` (global, not per-tenant) |
| `tenants` | `slug` |

---

## Important Column Notes

### `document_number_sequences`
```sql
key          -- stores document type (NOT document_type column)
next_number  -- the next number to assign (NOT current_number)
```

### `customers`
```sql
type                -- customer type (NOT customer_type)
currency            -- currency code (NOT currency_id)
payment_terms_days  -- payment terms in days (NOT payment_terms)
```

### `customer_addresses`
```sql
type         -- address type: billing/shipping (NOT address_type)
line1        -- street address (NOT address_line1)
region       -- state/province (NOT state)
```

### `customer_contacts`
```sql
name         -- contact full name (NOT contact_name)
```

---

## Seeders

| Seeder | Purpose | When to run |
|--------|---------|------------|
| `DatabaseSeeder` | Orchestrator | Always |
| `RoleSeeder` | Creates roles + assigns permissions | Fresh install |
| `PermissionSeeder` | Creates all `module.resource.action` permissions | Fresh install |
| `PlanSeeder` | Creates Free/Starter/Pro plans | Fresh install |
| `TemplateCatalogSeeder` | Invoice template library | Fresh install |
| `FinanceCategorySeeder` | Default expense/income categories | Fresh install |
| `TenantDefaultsSeeder` | Default settings for demo tenant | Demo setup |
| `DemoTenantSeeder` | Full demo dataset | Demo only |
| `FakeDataSeeder` | Large test dataset | Dev/testing only |

---

## Test Database Configuration

- **Driver:** SQLite in-memory (configured in `phpunit.xml`)
- **Key**: `createTenantWithAdmin()` in TestCase creates a tenant with active subscription
- **Domain routing**: Tests must use `URL::forceRootUrl('http://' . $domain)` to simulate domain-based tenant resolution

---

## Backup / Production Notes

- Production uses MySQL — never drop columns or tables without a migration
- Soft deletes protect financial records — use `withTrashed()` for restores
- `document_number_sequences` is critical — data loss here breaks auto-numbering
- The `DocumentNumberService` uses `lockForUpdate()` + DB transaction to prevent duplicate numbers under concurrency
