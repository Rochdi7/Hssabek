# Models Documentation

> All models live in `app/Models/`. They are organized into domain subdirectories.
> All tenant-owned models use: **UUIDs**, **SoftDeletes**, **BelongsToTenant** trait, **HasFactory** trait.

---

## Table of Contents

- [Core / System](#core--system)
- [CRM](#crm)
- [Sales](#sales)
- [Purchases](#purchases)
- [Catalog](#catalog)
- [Inventory](#inventory)
- [Finance](#finance)
- [Tax](#tax)
- [Billing / Pro](#billing--pro)
- [Support](#support)
- [Blog](#blog)
- [Templates](#templates)
- [Tenancy](#tenancy)

---

## Core / System

### `User`
- **Table:** `users`
- **Purpose:** Authentication & authorization for both tenant users and super admins
- **Key fields:** `id` (UUID), `name`, `email`, `password`, `tenant_id` (null = super admin), `status` (active/inactive), `locale`, `last_login_at`, `last_login_ip`
- **Relationships:** belongsTo Tenant; hasMany LoginLog
- **Traits:** HasFactory, SoftDeletes, HasRoles (Spatie)
- **Notes:** Super admins have `tenant_id = null`. Gate::before in AppServiceProvider gives them full access.

### `Tenant`
- **Table:** `tenants`
- **Purpose:** Organization / company unit in the multi-tenant system
- **Key fields:** `id` (UUID), `name`, `slug`, `status`, `default_currency`, `plan_id`, `setup_completed`, `trial_ends_at`
- **Relationships:** hasMany User, TenantSetting, Subscription, TenantDomain
- **Traits:** HasFactory, SoftDeletes
- **Notes:** Domain is resolved by `IdentifyTenantByDomain` middleware. Slug is used in URL routing for subdomains.

### `TenantSetting`
- **Table:** `tenant_settings`
- **Purpose:** JSON configuration blob for tenant preferences
- **Key fields:** `tenant_id`, `account_settings` (JSON), `company_settings` (JSON)
- **Relationships:** belongsTo Tenant
- **Notes:** Intentionally has `tenant_id` in fillable — loaded before TenantContext is fully initialized.

### `ActivityLog` (Spatie)
- **Table:** `activity_log`
- **Purpose:** Full audit trail of model changes
- **Managed by:** Spatie Laravel Activitylog
- **Notes:** Intentionally has `tenant_id` in fillable (system-generated log).

### `LoginLog`
- **Table:** `login_logs`
- **Purpose:** Track authentication events (success/failure, IP, user agent)
- **Key fields:** `user_id`, `ip_address`, `user_agent`, `status`, `tenant_id`

### `EmailLog`
- **Table:** `email_logs`
- **Purpose:** Track emails sent (invoice, quote, etc.)
- **Notes:** Intentionally has `tenant_id` in fillable.

### `NotificationLog`
- **Table:** `notification_logs`
- **Purpose:** Store user notification history
- **Notes:** Intentionally has `tenant_id` in fillable.

### `DocumentNumberSequence`
- **Table:** `document_number_sequences`
- **Purpose:** Auto-increment document numbering per type per tenant
- **Key fields:** `tenant_id`, `key` (document_type), `next_number`
- **Unique constraint:** `(tenant_id, key)`
- **Used by:** `DocumentNumberService` (singleton)

### `Document`
- **Table:** `documents`
- **Purpose:** Generic file/document storage for attachments
- **Relationships:** morphTo (polymorphic — can attach to invoices, quotes, etc.)

### `AccountRequest`
- **Table:** `account_requests`
- **Purpose:** New tenant signup requests awaiting superadmin approval
- **Used in:** SuperAdmin dashboard, AccountRequestController

### `DeleteAccountRequest`
- **Table:** `delete_account_requests`
- **Purpose:** GDPR tenant account deletion requests
- **Used in:** SuperAdmin DeleteAccountRequestController

### `UserInvitation`
- **Table:** `user_invitations`
- **Purpose:** Email invitations to join a tenant workspace
- **Key fields:** `email`, `token`, `tenant_id`, `created_by`, `expires_at`, `accepted_at`

### `ContactMessage`
- **Table:** `contact_messages`
- **Purpose:** Public website contact form submissions

### `NewsletterSubscriber`
- **Table:** `newsletter_subscribers`
- **Purpose:** Email newsletter signups from the public website

### `Announcement`
- **Table:** `announcements`
- **Purpose:** Platform-wide notices displayed in tenant backoffice
- **Features:** Multilingual support, active/inactive toggle

### `Integration`
- **Table:** `integrations`
- **Purpose:** Third-party API integrations and webhook configuration

---

## CRM

### `Customer`
- **Table:** `customers`
- **Purpose:** Clients / billing counterparties
- **Key fields:** `type` (individual/company — NOT `customer_type`), `name`, `email`, `phone`, `currency`, `payment_terms_days`, `tax_number`, `notes`
- **Relationships:** hasMany Invoice, Quote, Payment, CreditNote, CustomerAddress, CustomerContact
- **Traits:** BelongsToTenant, SoftDeletes
- **RISK:** Column is `type` not `customer_type`. Column is `currency` not `currency_id`. No `credit_limit`/`credit_used` in DB.

### `CustomerAddress`
- **Table:** `customer_addresses`
- **Purpose:** Billing/shipping addresses for customers
- **Key fields:** `type` (billing/shipping — NOT `address_type`), `line1` (NOT `address_line1`), `line2`, `city`, `region` (NOT `state`), `postal_code`, `country`
- **Relationships:** belongsTo Customer
- **Traits:** BelongsToTenant, SoftDeletes
- **RISK:** Column names differ from Laravel defaults — see corrected fillable.

### `CustomerContact`
- **Table:** `customer_contacts`
- **Purpose:** Named contacts within a customer company
- **Key fields:** `name` (NOT `contact_name`), `email`, `phone`, `position`, `is_primary`
- **Relationships:** belongsTo Customer
- **Traits:** BelongsToTenant, SoftDeletes

---

## Sales

### `Invoice`
- **Table:** `invoices`
- **Purpose:** Customer invoices (core sales document)
- **Key fields:** `invoice_number`, `customer_id`, `quote_id`, `status` (draft/sent/paid/partially_paid/overdue/cancelled), `issue_date`, `due_date`, `subtotal`, `tax_total`, `total`, `paid_amount`, `balance_due`, `currency`, `public_token`, `bill_from_snapshot` (JSON), `bill_to_snapshot` (JSON), `notes`, `terms`, `template_id`
- **Relationships:** belongsTo Customer, Quote; hasMany InvoiceItem, InvoiceCharge, PaymentAllocation, CreditNoteApplication
- **Unique constraint:** `(tenant_id, invoice_number)`

### `InvoiceItem`
- **Table:** `invoice_items`
- **Purpose:** Line items within an invoice
- **Key fields:** `invoice_id`, `product_id`, `description`, `quantity`, `unit_price`, `discount`, `tax_rate`, `total`, `calculation_mode` (quantity/measurement), `length`, `width`, `height`, `thickness`
- **Relationships:** belongsTo Invoice, Product, Unit, TaxGroup

### `InvoiceCharge`
- **Table:** `invoice_charges`
- **Purpose:** Additional charges/fees on an invoice (shipping, handling)

### `Quote`
- **Table:** `quotes`
- **Purpose:** Sales quotes and proforma invoices
- **Key fields:** same as Invoice + `document_type` (quote/proforma), `expiry_date`, `quote_number`
- **Relationships:** belongsTo Customer; hasMany QuoteItem, QuoteCharge; hasOne Invoice (when converted)

### `QuoteItem` / `QuoteCharge`
- Same structure as InvoiceItem / InvoiceCharge

### `Payment`
- **Table:** `payments`
- **Purpose:** Record money received from customers
- **Key fields:** `customer_id`, `payment_method_id`, `amount`, `payment_date`, `reference`, `notes`
- **Relationships:** belongsTo Customer, PaymentMethod; hasMany PaymentAllocation, Refund

### `PaymentAllocation`
- **Table:** `payment_allocations`
- **Purpose:** Many-to-many: which payments cover which invoices
- **Key fields:** `payment_id`, `invoice_id`, `amount_allocated`
- **Notes:** `$timestamps = false` — no created_at/updated_at columns.

### `CreditNote`
- **Table:** `credit_notes`
- **Purpose:** Issue credit back to customer (returns, adjustments)
- **Key fields:** `number`, `customer_id`, `invoice_id`, `status`, `subtotal`, `tax_total`, `total`
- **Relationships:** belongsTo Customer, Invoice; hasMany CreditNoteItem, CreditNoteApplication
- **RISK:** Column is `number` (not `credit_note_number`), `total` (not `total_amount`), `tax_total` (not `tax_amount`).

### `CreditNoteItem` / `CreditNoteApplication`
- Items on a credit note; Applications link credit notes to invoices.

### `DeliveryChallan`
- **Table:** `delivery_challans`
- **Purpose:** Delivery notes / shipping documents
- **Relationships:** belongsTo Customer, Quote, Invoice; hasMany Items, Charges

### `Refund`
- **Table:** `refunds`
- **Purpose:** Money returned to customer (tied to a Payment and Invoice)
- **Relationships:** belongsTo Payment, Invoice

### `PaymentMethod`
- **Table:** `payment_methods`
- **Purpose:** Payment types: Cash, Card, Bank Transfer, etc.
- **Relationships:** hasMany Payment

### `RecurringInvoice` (Pro)
- **Table:** `recurring_invoices`
- **Purpose:** Template for auto-generating invoices on a schedule
- **Relationships:** belongsTo Customer, templateInvoice

### `InvoiceReminder` (Pro)
- **Table:** `invoice_reminders`
- **Purpose:** Scheduled email reminders for overdue invoices
- **Relationships:** belongsTo Invoice

---

## Purchases

### `Supplier`
- **Table:** `suppliers`
- **Purpose:** Vendor / supplier management
- **Relationships:** hasMany PurchaseOrder, VendorBill, SupplierPayment, SupplierPaymentMethod

### `PurchaseOrder`
- **Table:** `purchase_orders`
- **Purpose:** Order sent to a supplier
- **Relationships:** belongsTo Supplier, Warehouse; hasMany PurchaseOrderItem, GoodsReceipt, DebitNote

### `VendorBill`
- **Table:** `vendor_bills`
- **Purpose:** Invoice received from supplier
- **Relationships:** belongsTo Supplier; hasMany VendorBillItem, SupplierPaymentAllocation

### `GoodsReceipt`
- **Table:** `goods_receipts`
- **Purpose:** Confirm receipt of goods (triggers stock increase)
- **Relationships:** belongsTo PurchaseOrder, Warehouse; hasMany GoodsReceiptItem

### `DebitNote`
- **Table:** `debit_notes`
- **Purpose:** Adjustment against a supplier (returns, price disputes)
- **Key fields:** `number` (NOT `debit_note_number`), `total` (NOT `total_amount`), `tax_total` (NOT `tax_amount`)
- **RISK:** Column naming differs from naive assumptions — check migration before writing code.

### `SupplierPayment`
- **Table:** `supplier_payments`
- **Purpose:** Money paid to supplier
- **Relationships:** belongsTo Supplier, PaymentMethod; hasMany SupplierPaymentAllocation

### `SupplierPaymentMethod`
- **Table:** `supplier_payment_methods`
- **Purpose:** Payment options configured per supplier

---

## Catalog

### `Product`
- **Table:** `products`
- **Purpose:** Sellable items and services
- **Key fields:** `item_type` (product/service), `billing_type` (one_time/recurring), `track_inventory`, `default_calc_mode` (quantity/measurement), `selling_price`, `purchase_price`, `hourly_rate`, `category_id`, `unit_id`, `tax_group_id`
- **Relationships:** belongsTo ProductCategory, Unit, TaxGroup; hasMany ProductStock, InvoiceItem, QuoteItem, StockMovement

### `ProductCategory`
- **Table:** `product_categories`
- **Purpose:** Group products by type
- **Relationships:** hasMany Product

### `Unit`
- **Table:** `units`
- **Purpose:** Measurement units (kg, pcs, litre, m², etc.)
- **Relationships:** hasMany Product, InvoiceItem

---

## Inventory

### `Warehouse`
- **Table:** `warehouses`
- **Purpose:** Physical storage locations
- **Relationships:** hasMany ProductStock, StockTransfer (from/to), StockMovement

### `ProductStock`
- **Table:** `product_stocks`
- **Purpose:** Stock level of a product at a specific warehouse
- **Key fields:** `product_id`, `warehouse_id`, `quantity`

### `StockMovement`
- **Table:** `stock_movements`
- **Purpose:** Manual stock adjustments (write-off, correction)
- **Relationships:** belongsTo Warehouse, Product

### `StockTransfer`
- **Table:** `stock_transfers`
- **Purpose:** Move stock between warehouses
- **Key fields:** `status` enum: `draft`, `in_transit`, `received`, `cancelled` (NOT pending)
- **Relationships:** belongsTo from_warehouse, to_warehouse; hasMany StockTransferItem

### `StockTransferItem`
- **Table:** `stock_transfer_items`
- **Relationships:** belongsTo StockTransfer, Product

---

## Finance

### `Expense`
- **Table:** `expenses`
- **Purpose:** Track company outgoings (rent, utilities, supplies)
- **Relationships:** belongsTo Supplier, FinanceCategory; hasMany ExpensePayment

### `Income`
- **Table:** `incomes`
- **Purpose:** Track non-invoice revenue (interest, rental income)
- **Relationships:** belongsTo FinanceCategory

### `Loan`
- **Table:** `loans`
- **Purpose:** Company loans and repayments
- **Relationships:** hasMany LoanInstallment, LoanPayment

### `LoanInstallment` / `LoanPayment`
- Loan repayment schedule and actual payment records

### `ExpensePayment`
- **Table:** `expense_payments`
- Settlement record linking payments to expenses

### `BankAccount`
- **Table:** `bank_accounts`
- **Purpose:** Company bank accounts for tracking
- **Key fields:** `type` enum: `current`, `savings`, `business`, `other` (NOT `checking`)

### `FinanceCategory`
- **Table:** `finance_categories`
- **Purpose:** Classify expenses and incomes
- **Relationships:** hasMany Expense, Income

### `Currency`
- **Table:** `currencies`
- **Purpose:** Supported currencies with symbol and code
- **Relationships:** hasMany ExchangeRate

### `ExchangeRate`
- **Table:** `exchange_rates`
- **Purpose:** Currency conversion rates (with date)
- **Relationships:** belongsTo Currency

---

## Tax

### `TaxCategory`
- **Table:** `tax_categories`
- **Purpose:** High-level tax classification for products (e.g., "Standard Rate", "Zero Rate")
- **Relationships:** hasMany Product

### `TaxGroup`
- **Table:** `tax_groups`
- **Purpose:** A named group of tax rates (e.g., "VAT 20%" containing multiple sub-rates)
- **Relationships:** hasMany TaxGroupRate, Product

### `TaxGroupRate`
- **Table:** `tax_group_rates`
- **Purpose:** Individual tax rate within a TaxGroup
- **Relationships:** belongsTo TaxGroup

---

## Billing / Pro

### `Plan`
- **Table:** `plans`
- **Purpose:** Subscription tiers (Free, Starter, Pro)
- **Key fields:** `interval` enum: `month`, `year`, `lifetime` (NOT monthly/yearly)
- **Relationships:** hasMany Subscription

### `Subscription`
- **Table:** `subscriptions`
- **Purpose:** Active subscription for a tenant
- **Key fields:** `status` enum: `active`, `trialing`, `past_due`, `cancelled`, `expired`
- **Relationships:** belongsTo Tenant, Plan; hasMany SubscriptionInvoice
- **Notes:** Intentionally has `tenant_id` in fillable — SuperAdmin-managed.

### `SubscriptionInvoice`
- **Table:** `subscription_invoices`
- **Purpose:** Billing invoice for subscription (separate from customer invoices)
- **Key fields:** `payment_status` enum: `pending`, `succeeded`, `failed`, `refunded`, `cancelled` (NOT `completed`)
- **Notes:** Intentionally has `tenant_id` in fillable.

### `Branch` (Pro)
- **Table:** `branches`
- **Purpose:** Multiple business locations under one tenant
- **Relationships:** belongsTo Tenant

---

## Support

### `SupportTicket`
- **Table:** `support_tickets`
- **Purpose:** Help desk tickets from tenants
- **Relationships:** belongsTo User, Tenant; hasMany SupportTicketReply

### `SupportTicketReply`
- **Table:** `support_ticket_replies`
- **Relationships:** belongsTo SupportTicket, User

---

## Blog

### `BlogPost`
- **Table:** `blog_posts`
- **Purpose:** Platform blog articles (public website)
- **Relationships:** belongsTo BlogCategory, User (author)

### `BlogCategory`
- **Table:** `blog_categories`
- **Purpose:** Organize blog posts
- **Relationships:** hasMany BlogPost

---

## Templates

### `TemplateCatalog`
- **Table:** `template_catalogs`
- **Purpose:** SaaS-wide invoice/document design templates
- **Used by:** SuperAdmin, TenantTemplatePreference

### `TenantTemplate`
- **Table:** `tenant_templates`
- **Purpose:** Tenant-customized document templates
- **Relationships:** belongsTo Tenant

### `TenantTemplatePreference`
- **Table:** `tenant_template_preferences`
- **Purpose:** Which template a tenant uses per document type

### `TemplatePurchase`
- **Table:** `template_purchases`
- **Purpose:** Templates for vendor/purchase documents

---

## Tenancy

### `Role` (Spatie)
- **Table:** `roles`
- **Notes:** Intentionally has `tenant_id` in fillable — custom Spatie tenant scoping.

### `Permission` (Spatie)
- **Table:** `permissions`
- **Notes:** Intentionally has `tenant_id` in fillable.

### `TenantDomain`
- **Table:** `tenant_domains`
- **Purpose:** Custom domain or subdomain mappings per tenant
- **Notes:** Intentionally has `tenant_id` in fillable — infrastructure, loaded before TenantContext is set.

---

## Common Patterns Across All Models

```php
// UUID primary key
public $incrementing = false;
protected $keyType = 'string';

// Tenant scoping (auto-applied to all queries)
use BelongsToTenant; // -> adds global scope filtering by tenant_id

// Soft deletes (financially critical models)
use SoftDeletes;

// Activity logging (most models)
use LogsActivity;
```

---

## Known Schema Gotchas

| Model | Wrong assumption | Correct column |
|-------|-----------------|----------------|
| Customer | `customer_type` | `type` |
| Customer | `currency_id` | `currency` |
| CustomerAddress | `address_type` | `type` |
| CustomerAddress | `address_line1` | `line1` |
| CustomerAddress | `state` | `region` |
| CustomerContact | `contact_name` | `name` |
| DebitNote | `debit_note_number` | `number` |
| DebitNote | `total_amount` | `total` |
| DebitNote | `tax_amount` | `tax_total` |
| BankAccount | `checking` (type) | `current` |
| StockTransfer | `pending` (status) | `draft` |
| Plan | `monthly` (interval) | `month` |
| Plan | `yearly` (interval) | `year` |
| SubscriptionInvoice | `completed` (payment_status) | `succeeded` |
| DocumentNumberSequence | `document_type` | `key` |
| DocumentNumberSequence | `current_number` | `next_number` |
