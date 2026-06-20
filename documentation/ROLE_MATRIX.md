# ROLE MATRIX — Facturation SaaS

> Roles and permissions come from `database/seeders/RoleSeeder.php` and `PermissionSeeder.php`. Permissions follow the format `{group}.{module}.{action}` and are enforced by the `permission:` route middleware. A `Gate::before` rule grants the tenant **admin** role a full bypass of all policies.

---

## 1. Role hierarchy

| Scope | Role | Description |
|-------|------|-------------|
| **Global (SaaS)** | `super_admin` | The SaaS operator. `tenant_id = null`. ALL global permissions. Manages tenants, plans, subscriptions. Lives in `/admin`. |
| **Tenant** | `admin` | Full access to the tenant workspace. Bypasses all policies via `Gate::before`. |
| **Tenant** | `manager` | CRUD on most operational modules; **no** Access-control or Settings. |
| **Tenant** | `accountant` | Finance, Sales, Purchases, Catalog, Reports + dashboard. |
| **Tenant** | `receptionist` | View/Create on Sales & CRM only. |
| **Tenant** | `viewer` | Read-only across everything (`.view` permissions). |

Roles are **tenant-scoped** (each tenant gets its own copy via Spatie with a `tenant_id` column).

---

## 2. Permission groups (from PermissionSeeder)

| Group | Modules | Actions |
|-------|---------|---------|
| `dashboard` | — | view |
| `crm` | customers | view, create, edit, delete |
| `sales` | invoices, quotes, payments, credit_notes, delivery_challans, refunds | view, create, edit, delete |
| `purchases` | suppliers, purchase-orders, vendor-bills, debit_notes, goods_receipts | view, create, edit, delete |
| `purchases` | supplier_payments | view, create, delete |
| `catalog` | categories, units, tax_rates | view, create, edit, delete |
| `inventory` | products, warehouses, stock_movements, stock_transfers | view, create, edit, delete |
| `finance` | bank_accounts, expenses, incomes, categories, loans, money_transfers | view, create, edit, delete |
| `pro` | recurring_invoices, invoice_reminders, branches | view, create, edit, delete |
| `pro` | rapports | view, create, edit, delete, export |
| `reports` | sales, customers, purchases, inventory, finance | view |
| `access` | roles, users | view, create, edit, delete |
| `access` | permissions | view, edit |
| `settings` | company, localization, invoices, notifications, templates, appearance, payment_methods, security, signatures, currencies, barcode, email_templates | view, create, edit, delete |
| `settings` | account | view, edit |
| `settings` | plans_billing | view |

---

## 3. Role → permission matrix

Legend: ✅ full CRUD · 👁 view only · 👁➕ view + create · ❌ none

| Module group | super_admin | admin | manager | accountant | receptionist | viewer |
|--------------|:----------:|:-----:|:-------:|:----------:|:------------:|:------:|
| Dashboard | ✅ | ✅ | ✅ | ✅ (view) | ❌ | 👁 |
| CRM (customers) | ✅ | ✅ | ✅ | ❌ | 👁➕ | 👁 |
| Sales | ✅ | ✅ | ✅ | ✅ | 👁➕ | 👁 |
| Purchases | ✅ | ✅ | ✅ | ✅ | ❌ | 👁 |
| Catalog | ✅ | ✅ | ✅ | ✅ | ❌ | 👁 |
| Inventory | ✅ | ✅ | ✅ | ❌ | ❌ | 👁 |
| Finance | ✅ | ✅ | ✅ | ✅ | ❌ | 👁 |
| Pro (recurring, reminders, branches, rapports) | ✅ | ✅ | ✅ | ❌ | ❌ | 👁 |
| Reports | ✅ | ✅ | ✅ | ✅ | ❌ | 👁 |
| Access (roles/users/permissions) | ✅ | ✅ | ❌ | ❌ | ❌ | ❌ |
| Settings | ✅ | ✅ | ❌ | ❌ | ❌ | ❌ |

> Derivation of each tenant role (exact seeder logic):
> - **admin** → ALL tenant permissions.
> - **manager** → all permissions **except** those starting with `access.` or `settings.`.
> - **accountant** → permissions starting with `finance.`, `sales.`, `purchases.`, `catalog.`, `reports.`, plus `dashboard.view`.
> - **receptionist** → `sales.*` and `crm.*` permissions ending in `.view` or `.create` only.
> - **viewer** → every permission ending in `.view`.

---

## 4. Responsibilities, menus & restrictions per role

### super_admin (SaaS operator)
- **Responsibilities**: Onboard tenants, set plans/pricing, manage subscriptions, approve account requests, broadcast announcements, answer support, monitor activity.
- **Menus**: `/admin` panel only (Tenants, Plans, Subscriptions, Templates, Announcements, Activity logs, Contact messages, Support, Account requests, Settings).
- **Restrictions**: Does not operate inside any single tenant's books; acts at the platform level.

### admin (business owner)
- **Responsibilities**: Run the whole company workspace; manage staff, roles, settings, billing.
- **Menus**: Every backoffice menu.
- **Restrictions**: Bound to own tenant (row scoping). Plan limits still apply (e.g. free plan = 50 invoices, 1 user).

### manager
- **Responsibilities**: Day-to-day operations across sales, purchases, inventory, finance, CRM, reports.
- **Menus**: All operational menus; **Access Control and Settings hidden**.
- **Restrictions**: Cannot add users, change roles, or edit company/billing settings.

### accountant
- **Responsibilities**: Bookkeeping — invoices, payments, expenses, loans, purchases, taxes, reports.
- **Menus**: Sales, Purchases, Finance, Catalog, Reports, Dashboard.
- **Restrictions**: No CRM editing, no inventory, no Pro, no Access/Settings.

### receptionist
- **Responsibilities**: Front-desk intake — register customers, draft quotes/invoices.
- **Menus**: CRM (view/create), Sales (view/create).
- **Restrictions**: Cannot edit/delete, cannot see finance, purchases, inventory, or settings.

### viewer
- **Responsibilities**: Read-only stakeholder (e.g. external accountant, investor).
- **Menus**: All list/detail pages, no action buttons.
- **Restrictions**: Cannot create, edit, or delete anything.

---

## 5. Enforcement layers
1. **Route middleware** `permission:{name}` blocks unauthorized requests.
2. **33 Policies** guard model-level actions (e.g. `InvoicePolicy`, `CustomerPolicy`).
3. **`Gate::before`** auto-allows tenant `admin`.
4. **`BelongsToTenant` global scope** guarantees a role can only ever touch its own tenant's rows.
5. **`plan.limit:` + `subscriptionActive`** add a commercial gate on top of permissions.
