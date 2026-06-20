# FUTURE IMPROVEMENTS — Facturation SaaS

> Prioritized roadmap derived from gaps found during the codebase audit, cross-referenced with `addons.md` and the empty API placeholders. Organized by impact × effort.

---

## 🔴 High impact — fill the obvious gaps

### 1. Online payment collection (biggest revenue lever)
There is **no payment-gateway integration in code** — payments are recorded manually. Add:
- **CMI** (Centre Monétique Interbancaire — the Moroccan standard) for card payments.
- **PayPal / Stripe** for international clients.
- A **"Pay this invoice" link** on the invoice PDF/email → customer pays online → payment auto-recorded.
- Wire SaaS subscription billing (Premium 399 DH) to the same gateway so upgrades are self-serve.

### 2. Public / tenant REST API + Webhooks
`routes/api/tenant.php` and `routes/api/webhooks.php` are **empty**, but Sanctum is already installed.
- Expose customers, invoices, products, payments via authenticated API.
- Webhooks for `invoice.paid`, `invoice.created`, `payment.received` → enables Zapier/Make/n8n integrations.
- This unlocks the whole integration economy with very little new infra.

### 3. WhatsApp integration (Morocco-critical)
The entire sales motion is WhatsApp-based, yet there's no in-product WhatsApp.
- Send invoices/quotes/reminders **directly via WhatsApp Business API** (not just email).
- Click-to-WhatsApp on every document.
- This matches how Moroccan SMBs actually communicate and would be a headline feature.

### 4. AI Tokens system (already speced in `addons.md`)
A ready-made **second revenue stream**: sell AI actions (invoice-from-text/photo, smart-fill, email compose, expense categorization, OCR, report insights) per token pack. Tables, services, and action catalog are already designed in `addons.md` — just needs building. Use the latest Claude models (e.g. `claude-opus-4-8` / `claude-haiku-4-5` for cheap high-volume actions).

---

## 🟠 Medium impact — strengthen the core

### 5. Onboarding & activation flow
Activation (first invoice created) is the retention-predictive metric (see MARKETING_STRATEGY). Add:
- Guided checklist (add logo → first customer → first invoice → invite teammate → upgrade).
- Demo data seeder a tenant can load/clear (`DemoTenantSeeder` exists — surface it in-app).

### 6. Two-factor authentication (2FA)
An `authentication-settings` view exists but 2FA isn't enforced in code. Add TOTP/2FA for admins — important for financial data.

### 7. Self-serve subscription upgrade
Today plan changes appear super-admin-driven. Let tenants upgrade/downgrade themselves (ties to #1 gateway work). Reduces sales friction on the 399 DH plan.

### 8. Moroccan e-invoicing / DGI compliance
As Morocco moves toward mandatory e-invoicing, build:
- Structured export formats the DGI accepts.
- Sequential, tamper-evident numbering (sequences already exist — extend with audit hash).
- This becomes a major selling point ("DGI-ready").

### 9. Dashboard & reporting depth
- Cash-flow forecast, aged-receivables report, top-customers, sales trend charts.
- Scheduled report emails (weekly P&L to the owner).

---

## 🟡 Lower impact — polish & scale

### 10. Telegram bot (speced in `addons.md`)
Document workflows via Telegram for power users.

### 11. Mobile experience / PWA
Recent commits show mobile-responsive fixes. Next step: installable PWA or a thin mobile app for on-the-go invoicing.

### 12. Template marketplace activation
`template_catalog` + `template_purchases` tables exist — turn invoice-design sales into a live revenue stream.

### 13. Multi-language completion
French is primary; add full Arabic UI (and Darija microcopy) to widen the market.

### 14. Bulk operations & imports
- CSV import for customers/products (lowers switching cost from Excel — directly answers the #1 sales objection).
- Bulk invoice send/reminders.

### 15. Customer portal
Let a tenant's customers log in to view/pay their invoices and download history — reduces "where's my invoice?" support load.

---

## 🛠️ Technical / quality debt

- **Expand test coverage** beyond the security core (90 passing) into sales/purchases/finance service logic.
- **Fix skipped test** `UserInvitationTest::test_valid_token_shows_accept_form` (view calls `unreadNotifications()` on a public route).
- **Remove `themeroutes.php`** test scaffolding before production.
- **Audit `integrations` model usage** — it's defined but unused; design it as the home for #1–#3 above.
- **Static analysis**: run Larastan/PHPStan + PHPInsights in CI (configs present) to keep the 88-model codebase healthy.
- **Queue worker + scheduler** must be running in production (Supervisor for `queue:work`, cron for `schedule:run`) — document in deploy runbook (see README).

---

## Suggested sequencing
1. **Online payments (CMI)** + self-serve upgrade → directly grows revenue.
2. **WhatsApp send** → matches market behavior, headline differentiator.
3. **REST API + webhooks** → integration ecosystem.
4. **AI Tokens** → second revenue stream.
5. **DGI e-invoicing** → moat as regulation tightens.
