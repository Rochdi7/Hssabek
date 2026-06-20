# BRUTAL SIMPLIFICATION AUDIT — Facturation SaaS

> Written as a SaaS founder, not a polite consultant. Every feature is assumed guilty until proven it earns revenue. The verdict up front:
>
> **You built an ERP. You're selling it for 399 DH to auto-entrepreneurs who want to make a clean invoice and know who hasn't paid them. ~60% of this codebase is dead weight that will bury you in bugs, support tickets, and abandoned onboardings before it ever earns a dirham.**

The strongest evidence is in your own pricing: the **Free plan exposes only `sales` + `crm`**. You already *know* what the product is. The other 8 modules are a museum of "what if a big client asks." Big clients aren't your market. Auto-entrepreneurs are.

---

## The core problem

| What you have | What your buyer needs |
|---------------|----------------------|
| 88 models, 90 migrations, 97 controllers | Make invoice → send → get paid |
| 6 roles, 130+ permissions | "Me" and maybe "my accountant" |
| Inventory, warehouses, stock transfers | A freelancer has no warehouse |
| Purchases (PO → goods receipt → vendor bill → debit note) | They buy a laptop once a year |
| Loans with installment schedules | This is a *bank* feature in an *invoicing* app |
| Template marketplace | Nobody is buying invoice skins for 399 DH |
| 5 report types + custom reports | "How much did I make this month?" |

You are paying full ERP maintenance cost to serve invoice-tool customers. That math kills SaaS companies.

---

## 1. Features to REMOVE

### 🔴 Inventory module (warehouses, product_stocks, stock_movements, stock_transfers)
- **Why it exists**: Someone imagined retail/wholesale clients.
- **Why unnecessary**: Your ICP (auto-entrepreneur, services, small biz) sells *services or simple products*. They don't run multi-warehouse stock. The free plan doesn't even include it.
- **Impact of removing**: Near zero for your real market. 5 models, ~5 migrations, `StockService`, 4 permission sets, a whole sidebar section, gone.
- **Complexity reduction**: ~8% of codebase.

### 🔴 Loans (loans, loan_installments, loan_payments, LoanService, ProcessLoanInstallmentsCommand)
- **Why it exists**: "Finance module should be complete."
- **Why unnecessary**: Loan installment tracking is a **banking/accounting product feature**. It has nothing to do with invoicing. Zero auto-entrepreneur asked for this.
- **Impact of removing**: None. A daily cron job and 3 tables disappear.
- **Complexity reduction**: ~3%.

### 🔴 Template marketplace (template_catalog, tenant_templates, template_purchases, TemplatePreferences)
- **Why it exists**: A dream of a second revenue stream ("sell invoice designs").
- **Why unnecessary**: At 399 DH lifetime, nobody micro-purchases a PDF skin. This is a whole sub-economy serving a market that doesn't exist yet. Give everyone 2–3 good templates and move on.
- **Impact of removing**: Removes 4 models, a SuperAdmin module, a purchase flow.
- **Complexity reduction**: ~4%.

### 🔴 Delivery Challans (delivery_challans + items + charges + service + job + notification)
- **Why it exists**: Mirrors a "complete sales suite."
- **Why unnecessary**: A delivery note is a logistics document for goods-shippers — a sliver of your market. It duplicates ~80% of invoice plumbing for a document most users never touch.
- **Impact of removing**: 3 models, a service, a job, a notification, a sidebar item.
- **Complexity reduction**: ~3%.

### 🔴 Multi-currency + Exchange Rates (currencies, exchange_rates, CurrencyService beyond display)
- **Why it exists**: "International clients."
- **Why unnecessary**: Your market bills in **MAD**. Keep a simple currency *label* on the tenant; rip out exchange-rate management and per-customer currency conversion. Travel agencies (the one multi-currency ICP) are a niche you can serve later.
- **Impact**: Simplifies every money calculation.
- **Complexity reduction**: ~2%.

### 🔴 Branches (Pro)
- **Why it exists**: Multi-location dream.
- **Why unnecessary**: Solo and micro businesses have one location. Adds a dimension to every query for ~1% of users.
- **Complexity reduction**: ~1%.

### 🟠 Money Transfers, Incomes (separate from invoices), Expense Payments granularity
- **Why it exists**: "Mini accounting."
- **Why unnecessary**: You're building Wave/QuickBooks inside an invoicing app. Keep **expenses** (people want "what did I spend"). Drop **money_transfers** (bank-to-bank — that's their banking app's job) and collapse **incomes** into payments. Don't model **expense_payments** as a separate partial-payment ledger; an expense is paid or not.
- **Complexity reduction**: ~3%.

### 🟠 Refunds as a separate entity
- A refund is a negative payment / a credit note application. You have **three overlapping concepts**: credit notes, refunds, and payment reversal. Pick one (credit notes). Remove the standalone Refund model/flow.
- **Complexity reduction**: ~1%.

**Total from removals: ~28–30% of the codebase, serving <10% of your real users.**

---

## 2. Features to MERGE

### Devis + Facture → one "Document" engine
Quotes and invoices are **the same object** with a status. You already snapshot bill-from/to and run both through the same `TaxCalculationService`. Stop maintaining two parallel stacks (Quote*, Invoice*, two services, two jobs, two notifications). One `Document` with `type = quote|invoice` and a status machine. "Convert" becomes "change type."
- **Saves**: ~6 models collapse to 3, 2 services → 1, 2 jobs → 1.

### Payments + Refunds + Credit Notes → one "money movement" ledger
All three adjust `amount_due`. Model them as signed entries against an invoice. One reconciliation path instead of three.

### Sales reports + Dashboard + Custom reports → one Reports surface
You have a Dashboard, 5 fixed report types, **and** a custom-report builder. That's three reporting systems. Keep the Dashboard (it's the answer to 80% of questions) + **one** "Revenue / Unpaid / Expenses" report with a date filter. Kill the custom-report builder until a paying customer demands it.

### Notifications + Email logs + Notification logs → one activity/notification feed
Three logging tables (`email_logs`, `notification_logs`, `activity_logs`) + the Spatie `notifications` table. Users need **one** feed: "what happened." Collapse the logs; keep one audit table for compliance.

### Purchases suite → "Expenses with a supplier" (if kept at all)
If you keep any purchasing, a vendor bill *is an expense attached to a supplier*. The PO → Goods Receipt → Vendor Bill → Debit Note → Supplier Payment chain is full double-entry procurement. Collapse to: **Supplier + Bill (paid/unpaid)**. Drop POs, goods receipts, debit notes, supplier payment allocations.

---

## 3. Over-Engineering Detection

| Area | Current complexity | Simpler alternative |
|------|-------------------|---------------------|
| **Invoice statuses** | draft, sent, partial, paid, void (+ overdue logic) | draft, sent, paid, cancelled. "Partial" = derive from amount_due. "Overdue" = derive from due_date. Don't *store* derivable states. |
| **Permissions** | 130+ granular `{group}.{module}.{action}` | ~15 capability flags. Auto-entrepreneurs don't configure permission matrices. |
| **Roles** | 6 (super_admin, admin, manager, accountant, receptionist, viewer) | 3 (see §4). |
| **Tax model** | tax_categories + tax_groups + tax_group_rates (3 tables) | A `tax_rate` field with presets (20/14/10/7/0). Multi-rate tax groups are an enterprise need. |
| **Settings** | 16 settings modules (company, localization, invoices, notifications, templates, appearance, payment_methods, security, signatures, currencies, barcode, email_templates, account, plans_billing…) | 4 tabs: Company, Invoice defaults, Team, Billing. **Barcode settings** in an invoicing app for freelancers is comedy. |
| **Document numbering** | Per-tenant per-type locked sequence service | Correct and keep — this one is *good* engineering. Don't touch it. |
| **Dashboards** | Dashboard + 5 reports + custom builder | One dashboard + one report. |
| **Jobs** | 9 email jobs (one per document type) | One generic `SendDocumentEmailJob`. |
| **Notifications** | 18 types | ~6: document sent, payment received, invoice overdue, support reply, subscription expiring, teammate invited. |

The document-numbering service and the tenant-isolation layer are genuinely well done — **keep them**. The over-engineering is in the *breadth* of modules, not the *core plumbing*.

---

## 4. Role Simplification

**Current (6):** super_admin · admin · manager · accountant · receptionist · viewer

A 1–5 person business does **not** distinguish manager vs accountant vs receptionist. They log in as "the boss" or "the helper."

**Recommended (3 tenant roles + 1 platform):**

| Role | Who | Can |
|------|-----|-----|
| **super_admin** | You (SaaS) | Everything at platform level (keep) |
| **Owner** | The business owner | Everything in their workspace, incl. settings/billing/team |
| **Staff** | An employee | Create/edit invoices, quotes, customers, record payments. No settings, no team, no delete of paid docs |
| **Accountant** *(optional)* | External bookkeeper | Read-only + export |

Collapse manager+accountant+receptionist → **Staff**. Collapse viewer → **Accountant (read-only)**. That's it. You can ship with **just Owner + Staff** and add Accountant when someone asks.

**Permission system**: replace 130 permissions with role checks + ~6 capability flags. Delete the per-tenant role-copying machinery's complexity surface.

---

## 5. Menu Simplification

**Current sidebar** (after all modules): Dashboard, CRM, Catalog, Inventory, Sales (6 sub), Purchases (5 sub), Finance (6 sub), Pro (3 sub), Reports, Access, Users, Settings (16), Support, Trash, Export, Notifications, Documentation. **~50 nav targets.** A new user is lost in 10 seconds.

**Recommended navigation (7 items):**

```
🏠 Tableau de bord
🧾 Ventes          → Factures · Devis · Paiements
👥 Clients
📦 Produits        (flat list, no categories/units/warehouses)
💸 Dépenses        (+ suppliers folded in, optional)
📊 Rapports        (one page)
⚙️  Paramètres     (Entreprise · Facture · Équipe · Abonnement)
```

- **Disappear**: Inventory, Purchases suite, Pro section, Catalog (folded into Produits), Templates, Trash (move to Settings), Export (it's a button, not a menu), Documentation (link in footer/help).
- **Group**: Invoices/Quotes/Payments under "Ventes". Credit notes live *inside* an invoice, not as a top-level menu.
- **Move**: Notifications → bell icon in header (not sidebar). Support → header help menu.

7 items beats 50. Onboarding gets 5× easier for free.

---

## 6. Database Simplification

**Archive / remove (tables tied to removed features):**
- Inventory: `warehouses`, `product_stocks`, `stock_movements`, `stock_transfers`, `stock_transfer_items`
- Loans: `loans`, `loan_installments`, `loan_payments`
- Templates: `template_catalog`, `tenant_templates`, `tenant_template_preferences`, `template_purchases`
- Delivery: `delivery_challans`, `delivery_challan_items`, `delivery_challan_charges`
- Purchases (if cut to "supplier+bill"): `purchase_orders(+items)`, `goods_receipts(+items)`, `debit_notes(+items,+applications)`, `supplier_payment_allocations`
- Finance extras: `money_transfers`, `incomes`, `exchange_rates`, `currencies`, `expense_payments`
- `branches`, `refunds`
- Tax: collapse `tax_categories`/`tax_groups`/`tax_group_rates` → a rate field
- Logs: merge `email_logs` + `notification_logs` into one delivery log

**That's roughly 35–40 of 90 migrations gone.**

**Unnecessary relations**: per-customer `currency`, per-document `bank_account_id` (one default bank is enough), `quote_id` linkage once quotes/invoices unify.

**Keep clean & untouched**: `tenants`, `users`, `customers` (+ addresses/contacts), `products`, `invoices(+items,+charges)`, `payments(+allocations)`, `credit_notes`, `expenses`, `suppliers`, `plans`, `subscriptions`, `document_number_sequences`, `tenant_settings`, Spatie + Sanctum + media tables.

---

## 7. The SaaS Version (80% value, 20% complexity)

### ✅ Essential (the whole product)
1. **Invoices** — create, send (email + **WhatsApp**), PDF, mark paid.
2. **Quotes** — same engine, convert to invoice.
3. **Customers** — name, contact, payment terms. (Addresses/contacts optional fields, not sub-modules.)
4. **Products/services** — flat list with price + tax rate.
5. **Payments** — record, see who's unpaid/overdue.
6. **Dashboard** — revenue, unpaid, this month.
7. **Expenses** — simple "what did I spend."
8. **Settings** — company info + logo, invoice defaults, team (Owner/Staff), billing.
9. **TVA** — preset Moroccan rates.
10. **Recurring invoices + reminders** — *the* retention feature; keep, it's cheap and sticky.

### 🟡 Optional (add when a paying customer asks)
- Suppliers + simple bills
- Credit notes
- Accountant (read-only) role
- Custom reports
- Multi-currency
- Public API + webhooks
- Customer portal
- Online payments (CMI) — actually move this to **Essential** the moment you can; it's the revenue multiplier from FUTURE_IMPROVEMENTS.

### ❌ Remove completely
Inventory · Warehouses · Stock transfers · Loans · Goods receipts · Purchase orders · Debit notes · Delivery challans · Money transfers · Template marketplace · Branches · Barcode settings · Exchange-rate management · Separate Refunds · Custom-report builder (v1).

---

## 8. Onboarding Simplification (target: <10 min)

**What blocks onboarding today:**
- 50 menu items → decision paralysis.
- 16 settings tabs before you can do anything.
- Tax groups/categories must be understood to add a product.
- "What's a delivery challan / debit note / goods receipt?" in French to a freelancer.
- Plan/permission/role setup before first invoice.

**Simpler first-run flow (5 steps, 3 minutes):**
```
1. Company name + logo + ICE/IF  →  (one screen)
2. "Create your first invoice"   →  add customer inline, add line item, pick TVA preset
3. Preview the PDF               →  instant "wow"
4. Send via WhatsApp/email
5. (Later) "Add your bank details so clients can pay you"
```
Defer everything else. Seed sensible defaults (one bank slot, standard TVA, default invoice template). The user should make a real invoice **before** seeing a single settings page.

---

## 9. UI/UX Simplification

| Screen | Problem | Fix |
|--------|---------|-----|
| **Invoice list** | Too many statuses, columns, filters, an action dropdown with 8 items | Columns: #, Client, Total, Status, Due. Filters: status + date only. Row actions: View · Send · ⋯ |
| **Invoice create** | Charges, multi-tax groups, recurring config, snapshots, bank picker all on one form | Progressive disclosure: line items + total visible; "Advanced" collapses tax/charges/recurring |
| **Dashboard** | Risk of KPI soup once all modules report | 4 cards: Revenue (month), Unpaid total, Overdue count, Expenses (month). One chart. |
| **Settings** | 16 tabs | 4 tabs |
| **Sidebar** | 50 targets | 7 |
| **Customer detail** | Addresses + contacts as modal sub-CRUD | Inline fields; most freelancers need name+phone+email only |
| **Every "send"** | Email only | Add WhatsApp button — it's how Morocco communicates |

Principle: **one primary action per screen.** Hide the 20% power-features behind "Advanced," never on the default path.

---

## 10. Final Recommendation

### KEEP (the value core)
Invoices · Quotes · Customers · Products (flat) · Payments · Dashboard · Expenses · Recurring invoices + reminders · TVA presets · Document numbering · Tenant isolation · Subscription/plan gating.

### IMPROVE (keep but simplify)
- Statuses → derive partial/overdue, don't store.
- Settings → 16 → 4 tabs.
- Reports → one page.
- Notifications → one feed, ~6 types.
- Roles → 6 → 2–3.
- Send → add WhatsApp.

### MERGE
- Quote + Invoice → one Document engine.
- Payment + Refund + Credit note → one money ledger.
- Dashboard + reports + custom reports → one reporting surface.
- 9 email jobs → 1 generic job.
- 3 log tables → 1.
- Supplier + vendor bill → "expense with supplier" (if kept).

### REMOVE
Inventory · Loans · Templates marketplace · Delivery challans · Purchase orders · Goods receipts · Debit notes · Money transfers · Incomes · Branches · Multi-currency/exchange rates · Barcode · Standalone refunds · Custom-report builder (v1).

### Estimated reductions
> Honest engineering estimates, not marketing numbers.

| Metric | Reduction | Reasoning |
|--------|----------:|-----------|
| **Code / complexity** | **~55–60%** | ~35–40 of 90 migrations, ~40 of 88 models, ~half the controllers/services/jobs gone |
| **Maintenance cost** | **~60%** | Fewer modules = fewer bugs, fewer migrations, fewer cron/queue paths, smaller test surface |
| **Support load** | **~65%** | Most tickets come from features users don't understand (challans, debit notes, tax groups, stock, permissions). Removing them removes the questions |
| **Onboarding time** | **~80% faster** | 50 menus → 7; 16 settings → 4; first invoice before any config |
| **Time-to-first-value** | **minutes, not a session** | The metric that actually drives free→paid conversion |

---

## The founder's bottom line

You don't have an invoicing product with extra modules. You have an **ERP wearing an invoicing product's pricing**. Every module you kept "to look complete" is a tax on the one thing that sells: *a freelancer making a clean, TVA-correct invoice and seeing who owes them money.*

Cut to that. Add **WhatsApp sending** and **online payment (CMI)** — the two things your market actually screams for — with the engineering time you free up. Ship the 7-menu version. You'll spend less, break less, support less, and convert more.

The hardest part isn't building the simple version. It's deleting the code you're proud of. Do it anyway.
