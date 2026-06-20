# FEATURE INVENTORY — Facturation SaaS

> Complete module-by-module inventory. For each module: purpose, business value, primary users, main screens, and related tables.

---

## BACKOFFICE (tenant workspace, `/backoffice`, `bo.*`)

### 1. Dashboard
- **Purpose**: At-a-glance KPIs — revenue, outstanding invoices, recent activity.
- **Business value**: Owner sees cash health in one screen.
- **Users**: All roles (`dashboard.view`).
- **Screens**: `admin-dashboard`.
- **Tables**: aggregates invoices, payments, expenses.

### 2. CRM — Customers
- **Purpose**: Manage customers, their addresses and contacts.
- **Business value**: Single source of truth for who you sell to; payment terms per customer.
- **Users**: Admin, Manager, Receptionist (view/create), Accountant.
- **Screens**: customers (list), add/edit-customer, customer-details (addresses & contacts via modals).
- **Tables**: `customers`, `customer_addresses`, `customer_contacts`.

### 3. Catalog — Products, Categories, Units, Taxes
- **Purpose**: Define what you sell and how it's taxed.
- **Business value**: Reusable line items, correct Moroccan TVA on every document.
- **Users**: Admin, Manager, Accountant.
- **Screens**: products, add/edit-product, categories, units, tax rates.
- **Tables**: `products`, `product_categories`, `units`, `tax_categories`, `tax_groups`, `tax_group_rates`.

### 4. Inventory
- **Purpose**: Track stock per warehouse, movements, and transfers.
- **Business value**: Know what's in stock; invoices can decrement stock automatically.
- **Users**: Admin, Manager.
- **Screens**: products/inventory, warehouses, stock movements, stock transfers.
- **Tables**: `warehouses`, `product_stocks`, `stock_movements`, `stock_transfers(+items)`.

### 5. Sales (the core revenue engine)
| Sub-module | Purpose | Key actions |
|------------|---------|-------------|
| **Quotes** | Proposals to prospects | create, send, download PDF, **convert to invoice** |
| **Invoices** | Bill customers | create, send, void, download/stream PDF, recurring |
| **Payments** | Record money in, allocate to invoices | create, allocate, receipt PDF |
| **Credit Notes** | Reduce/refund invoiced value | create, apply, send |
| **Delivery Challans** | Dispatch/delivery notes | create, send, download |
| **Refunds** | Return money to customer | create, edit |
- **Business value**: The whole quote→cash cycle. This is what the customer pays the SaaS for.
- **Users**: Admin, Manager, Accountant, Receptionist (view/create).
- **Tables**: `quotes`, `invoices(+items,+charges)`, `payments(+allocations)`, `credit_notes`, `delivery_challans`, `refunds`, `payment_methods`.

### 6. Purchases (supplier side, mirrors sales)
- **Purpose**: Suppliers, purchase orders, goods receipts, vendor bills, debit notes, supplier payments.
- **Business value**: Full procurement & accounts-payable tracking.
- **Users**: Admin, Manager, Accountant.
- **Tables**: `suppliers`, `purchase_orders(+items)`, `goods_receipts(+items)`, `vendor_bills`, `debit_notes(+items,+applications)`, `supplier_payments(+allocations)`.

### 7. Finance
- **Purpose**: Bank accounts, expenses, incomes, loans, money transfers, categories, currencies.
- **Business value**: Lightweight bookkeeping beyond invoicing — true P&L visibility.
- **Users**: Admin, Accountant.
- **Tables**: `bank_accounts`, `expenses(+payments)`, `incomes`, `loans(+installments,+payments)`, `money_transfers`, `finance_categories`, `currencies`, `exchange_rates`.

### 8. Pro features
- **Recurring invoices**: auto-generate invoices on a schedule (daily cron).
- **Invoice reminders**: automated unpaid-invoice nudges.
- **Branches**: multiple business locations.
- **Business value**: Premium-tier upsell; reduces manual work and late payments.
- **Tables**: `recurring_invoices`, `invoice_reminders`, `branches`.

### 9. Reports
- **Purpose**: Sales, customers, purchases, inventory, finance reports + custom reports + exports.
- **Business value**: Decision-making data; exportable to Excel/PDF/Word.
- **Users**: Admin, Manager, Accountant (view).
- **Tables**: `custom_reports` + read-only aggregation over domain tables. Services: `ReportService`, `ListExportService`, `ExportReportJob`.

### 10. Access Control (Roles & Users)
- **Purpose**: Manage tenant roles, permissions, users, and invitations.
- **Business value**: Delegate work safely with least-privilege.
- **Users**: Admin only.
- **Tables**: Spatie `roles/permissions`, `users`, `user_invitations`.

### 11. Settings
- **Purpose**: Company info, localization, invoice settings, notifications, templates, appearance, payment methods, security, signatures, currencies, barcode, email templates, plan & billing, account.
- **Users**: Admin (most), each user (account).
- **Tables**: `tenant_settings`, `signatures`, `integrations`.

### 12. Support (tenant → SaaS)
- **Purpose**: Open tickets, reply, track status.
- **Tables**: `support_tickets`, `support_ticket_replies`.

### 13. Trash & Export
- **Trash**: restore soft-deleted records.
- **Export**: list/report exports (Excel/CSV/Word/PDF).

### 14. Notifications & Documentation
- In-app notification center; built-in product documentation pages.

---

## SUPERADMIN (SaaS control panel, `/admin`, `sa.*`)

| Module | Purpose | Tables |
|--------|---------|--------|
| **Dashboard** | SaaS-wide KPIs (tenants, MRR, signups) | aggregates |
| **Tenants** | CRUD tenants, suspend/activate, view & override usage limits | `tenants`, `subscriptions` |
| **Plans** | Manage pricing plans & features | `plans` |
| **Subscriptions** | Manage tenant subscriptions & billing | `subscriptions`, `subscription_invoices` |
| **Templates** | Manage the sellable document-template catalog | `template_catalog`, `template_purchases` |
| **Access** | Super-admin roles/permissions | Spatie (global) |
| **Announcements** | Broadcast messages to tenants | `announcements` |
| **Activity logs** | Audit trail | `activity_logs` |
| **Contact messages** | Read public contact-form leads | `contact_messages` |
| **Support tickets** | Answer tenant tickets | `support_tickets` |
| **Account requests** | Approve/reject "request an account" leads → provision tenant | `account_requests` |
| **Settings** | Global SaaS settings | config |

---

## FRONTOFFICE (public site, `/`)

| Page | Route | Purpose / lead-gen value |
|------|-------|--------------------------|
| Home | `home` | Marketing landing |
| Pricing | `pricing` | Plans (pulled live from `plans` table, cached 1h) |
| Features | `features` | Feature showcase |
| Contact | `contact` (+ send) | Lead capture → `contact_messages` + email |
| Request account | `request-account` (+ send) | **Primary conversion** → `account_requests` (super-admin approves) |
| Newsletter | `newsletter.subscribe` | List building → `newsletter_subscribers` + welcome mail |
| Auto-entrepreneur | `auto-entrepreneur` | **SEO landing page** targeting Moroccan freelancers |
| Legal | terms / privacy / legal | Compliance |
| Help / Support / FAQ | help-center / support / faq | Self-serve support |
| Sitemap | `sitemap.xml` | SEO |

---

## Cross-cutting features

- **Multi-language** (French primary; locale switch on all three apps).
- **PDF generation** for every document type (DomPDF) with downloadable & streamable variants.
- **Email delivery** queued for all outbound documents.
- **Activity logging** + **login logging** + **email/notification logs**.
- **Soft-delete + Trash recovery**.
- **Plan-based feature gating** + per-resource usage limits.
- **Template marketplace** (sellable invoice designs).

---

## Screenshots / static references
The UI is driven by 318 static Blade templates in `resources/views/*.blade.php` (mapped in `UI_UX_TEMPLATE_REFERENCE.md`). These double as the visual spec for every screen — no separate screenshot assets were found, but each template file is the canonical look of its page.
