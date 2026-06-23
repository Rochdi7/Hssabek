# Routes Documentation

## Route Files Overview

| File | Scope | Prefix | Guard |
|------|-------|--------|-------|
| `routes/web.php` | Dispatcher — routes to backoffice or superadmin | — | — |
| `routes/auth.php` | Public authentication pages | — | guest/auth |
| `routes/frontoffice.php` | Public website | — | — |
| `routes/backoffice/*.php` | Tenant backoffice (17 files) | `bo.*` | auth, tenant |
| `routes/superadmin/*.php` | SaaS admin panel (11 files) | `sa.*` | auth, superadmin |
| `routes/api/tenant.php` | Tenant API endpoints | `api.*` | sanctum |
| `routes/api/webhooks.php` | Incoming webhooks | — | webhook signature |

---

## Route Naming Conventions

```
Backoffice:    bo.<module>.<resource>.<action>
SuperAdmin:    sa.<module>.<resource>.<action>
Auth:          login, register, logout, password.request, etc.
Public:        invoice.public, document.download, etc.
```

### Examples

```
bo.dashboard                             → Backoffice home
bo.sales.invoices.index                  → Invoice list
bo.sales.invoices.create                 → New invoice form
bo.sales.invoices.store                  → POST save invoice
bo.sales.invoices.show                   → Invoice detail
bo.sales.invoices.edit                   → Edit invoice form
bo.sales.invoices.update                 → PUT update invoice
bo.sales.invoices.destroy                → DELETE invoice
bo.crm.customers.index                   → Customer list
bo.crm.customers.addresses.store         → POST add address (nested)
sa.dashboard                             → SuperAdmin home
sa.tenants.index                         → Tenant list
sa.plans.index                           → Subscription plans
```

---

## Backoffice Route Files

| File | Routes |
|------|--------|
| `routes/backoffice/crm.php` | Customers, Addresses, Contacts |
| `routes/backoffice/sales.php` | Invoices, Quotes, Payments, Credit Notes, Delivery Challans, Refunds |
| `routes/backoffice/purchases.php` | Suppliers, POs, Vendor Bills, Goods Receipts, Debit Notes, Supplier Payments |
| `routes/backoffice/inventory.php` | Warehouses, Stock, Transfers, Movements |
| `routes/backoffice/catalog.php` | Products, Categories, Units, Tax Rates |
| `routes/backoffice/finance.php` | Expenses, Incomes, Loans, Bank Accounts |
| `routes/backoffice/reports.php` | Sales, Purchases, Inventory, Finance, Customer, Custom Reports |
| `routes/backoffice/settings.php` | Company, Invoice, Currency, Notifications, Security, Email templates |
| `routes/backoffice/access.php` | Roles & Permissions |
| `routes/backoffice/users.php` | User management, Invitations |
| `routes/backoffice/billing.php` | Subscription, Plan |
| `routes/backoffice/pro.php` | Branch, RecurringInvoice, InvoiceReminder |
| `routes/backoffice/dashboard.php` | Dashboard, notifications |
| `routes/backoffice/support.php` | Support tickets |
| `routes/backoffice/export.php` | List exports (Excel) |
| `routes/backoffice/trash.php` | Soft-delete recycle bin |
| `routes/backoffice/setup.php` | Setup wizard |

---

## Middleware Stacks

### Backoffice Routes
All backoffice routes pass through:
1. `IdentifyTenantByDomain` — resolve tenant from domain
2. `RequireTenantContext` — abort if tenant not found
3. `SetTenantContext` — populate TenantContext service
4. `EnsureTenantIsActive` — tenant must be active
5. `auth` — user must be logged in
6. `EnsureActiveSubscription` — subscription must be valid
7. `permission:<name>` — per-route permission check (where applicable)

### SuperAdmin Routes
1. `auth` — logged in
2. `IsSuperAdmin` — user must have `tenant_id = null`

### Auth Routes
- Guest-only: login, register, forgot-password, reset-password
- Auth-only: logout, verify-email, resend-verification

---

## Public Routes (No Auth Required)

- `GET /invoice/{token}` — Public invoice view by `public_token`
- `GET /document/{token}/download` — Download invoice/quote as PDF
- `GET /blog` — Public blog list
- `GET /blog/{slug}` — Single blog post
- `GET /contact` — Contact form
- `POST /contact` — Submit contact form
- `POST /newsletter` — Newsletter signup

---

## Important Route Patterns

### Nested Resources (Addresses & Contacts)
```
POST   bo.crm.customers.addresses.store      /customers/{customer}/addresses
PUT    bo.crm.customers.addresses.update     /customers/{customer}/addresses/{address}
DELETE bo.crm.customers.addresses.destroy    /customers/{customer}/addresses/{address}
```

### Soft Delete / Restore
```
GET    bo.trash.index                        /trash
POST   bo.trash.restore                      /trash/{model}/{id}/restore
DELETE bo.trash.force-delete                 /trash/{model}/{id}
```

### Public Document Access
```
GET    /invoice/{public_token}               No auth — share invoice link
GET    /document/{public_token}/pdf          No auth — download PDF
```

---

## Rate Limiting (Configured in AppServiceProvider)

| Limiter | Max | Per |
|---------|-----|-----|
| login | 5 | minute per IP |
| register | 3 | minute per IP |
| password.reset | 3 | minute per IP |
| exports | 10 | minute per user |
