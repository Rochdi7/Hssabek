# MARKETING STRATEGY — Facturation SaaS (Morocco)

> Built from the product's actual capabilities (invoicing, quotes, TVA, multi-user, recurring, inventory, finance) and its market signals (MAD currency, French UI, `forme_juridique`, dedicated `auto-entrepreneur` landing page). Pricing in the system: **Gratuit (0 MAD)** and **Premium (399 MAD lifetime)**.

---

## 1. Ideal Customer Profiles (ICPs)

| # | Profile | Pain | Why this product |
|---|---------|------|------------------|
| **1** | **Auto-entrepreneur / freelance** (consultants, devs, designers, artisans) | Invoices in Word/Excel, no TVA tracking, looks unprofessional | Free plan, fast pro invoices, auto-entrepreneur landing page already built |
| **2** | **TPE/PME (small companies 2–20 staff)** | Quotes & invoices scattered, no follow-up on unpaid, multi-user chaos | Multi-user roles, recurring invoices, reminders, reports |
| **3** | **Commerçants / retail & wholesale** | Stock + invoicing in separate tools | Inventory + sales + purchases in one place |
| **4** | **Service businesses with recurring billing** (agencies, SaaS resellers, maintenance, subscriptions) | Manual re-invoicing every month | Recurring invoices + automated reminders |
| **5** | **Accountants / bookkeepers** managing several clients | Juggling clients' billing | Multi-tenant feel, finance module, exports |

**Primary beachhead: ICP #1 (auto-entrepreneurs)** — lowest friction, free plan, landing page exists, huge & growing segment in Morocco.

---

## 2. Positioning & core message

**One-liner (FR):** *"Facturez comme un pro en 2 minutes — devis, factures et TVA, sans Excel."*

**Darija hook:** *"Sir 9adi tdir factura mzyana f 2 daqaye9, b TVA, bla Excel bla 9la9."*

**Value pillars:**
1. **Rapidité** — invoice/quote in 2 minutes.
2. **Conformité** — Moroccan TVA done right.
3. **Professionnalisme** — clean PDF, your logo, branded.
4. **Suivi** — know who hasn't paid; automatic reminders.
5. **Tout-en-un** — quotes, invoices, stock, purchases, finance.

---

## 3. Channel strategy

### Facebook & Instagram Ads (primary — best for Moroccan SMB)
- **Objective ladder**: Traffic/Engagement → Lead (form) → Conversion (signup).
- **Targeting**: Morocco, FR/AR, interests: entrepreneurship, e-commerce, "auto-entrepreneur", small business, accounting; behaviors: small-business-page admins, business-tool users.
- **Formats**: short vertical video (screen-record creating an invoice), carousel (before Excel vs after), single-image with a strong Darija hook.
- **Lead capture**: send to `/demande-compte` or a click-to-WhatsApp ad.

### Google Ads (high-intent capture)
- Search keywords (FR/AR-latin): *logiciel facturation maroc, facture auto entrepreneur maroc, devis facture maroc, programme facturation TVA, logiciel de facturation gratuit maroc.*
- Landing: `/auto-entrepreneur` and `/pricing`.

### SEO (compounding, low cost)
- Sitemap + `auto-entrepreneur` page already exist. Build content cluster:
  - "Comment faire une facture au Maroc (modèle + TVA)"
  - "Auto-entrepreneur Maroc : facturation et obligations"
  - "Modèle de devis Maroc gratuit"
  - "TVA Maroc : taux 20/14/10/7% expliqués"
- Each article → CTA to free signup. (Use the `/seo` skill in this repo to run a full audit.)

### WhatsApp Marketing (huge in Morocco)
- Click-to-WhatsApp ads → sales conversations (see WHATSAPP_SALES_PLAYBOOK_DARIJA.md).
- Broadcast lists for tips + offers (opt-in).
- WhatsApp as the **demo + onboarding** channel, not just chat.

### Email Marketing (already wired: newsletter, welcome mail)
- Welcome sequence for newsletter subscribers.
- Onboarding drip for new tenants (create first invoice → add logo → invite teammate → upgrade).
- Re-engagement for trials nearing `trial_ends_at`.

### Referral campaigns
- "Da3i sa7bek, akhud chahr premium b balach" (refer a friend, get a free premium month) — even on a lifetime plan, give template credits or priority support.
- B2B referral via accountants (each accountant brings many clients).

---

## 4. Messaging angles & hooks

| Angle | Hook (FR) | Hook (Darija) |
|-------|-----------|---------------|
| Speed | "Votre facture en 2 minutes." | "Factura f 2 daqaye9." |
| Excel pain | "Arrêtez de bricoler vos factures sur Excel." | "Baraka mn Excel f les factures." |
| Professionalism | "Une facture qui inspire confiance." | "Factura kat3ti confiance l client." |
| Unpaid follow-up | "Sachez enfin qui ne vous a pas payé." | "3ref chkoun mazal ma khallasek." |
| TVA compliance | "La TVA calculée automatiquement, sans erreur." | "TVA kat7sab b rasha, bla ghalat." |
| Free | "Commencez gratuitement, sans carte bancaire." | "Bda b balach, bla carte." |
| Recurring | "Facturez vos clients chaque mois, automatiquement." | "Faturi clients dyalek kol chhar otomatik." |

---

## 5. Ad creative concepts

1. **Screen-record reel (15s)**: empty screen → type customer → add product → click → polished PDF. Caption: *"Hakka kadir factura f Maroc f 2 daqaye9 🧾"*.
2. **Before/After carousel**: messy Excel sheet vs clean branded invoice.
3. **Testimonial-style**: auto-entrepreneur talking head: *"Knt kandir factures f Word… daba kolchi otomatik."*
4. **Problem hook static**: *"Chhal mn client mazal ma khallsek? 🤔" → "Daba ghadi t3ref."*
5. **Price anchor**: *"399 DH wahda o khlas — bla abonnement chhar b chhar."* (lifetime Premium as a strong anchor vs recurring competitors).

---

## 6. Landing page recommendations

For `/auto-entrepreneur` and a future paid-ads landing:
- **Above the fold**: one Darija/FR hook + 2-min video + single CTA ("Bda b balach").
- **Social proof**: number of invoices created, logos, testimonials.
- **3 benefit blocks**: Rapidité · Conformité TVA · Suivi des impayés.
- **Pricing clarity**: Free vs Premium (399 DH lifetime) side by side.
- **Objection killers**: "bla carte bancaire", "données sécurisées", "support en darija".
- **Sticky WhatsApp button** for instant questions.
- Keep one CTA per page; route to `/demande-compte` or click-to-WhatsApp.

---

## 7. Funnel & KPIs

```
Ad impression → Click → Landing/WhatsApp → Lead (account_request / chat) → Signup (free) → Activation (1st invoice) → Upgrade (Premium) → Referral
```
Track: CPL, signup rate, **activation rate (created first invoice)**, free→premium conversion, CAC vs 399 DH LTV, referral coefficient. Activation (first invoice) is the single metric most predictive of retention — optimize onboarding for it.
