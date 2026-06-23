# Ventes, Achats & Paiements — How It Works (Full Explanation)

> Generated from a full scan of the codebase (models, migrations, services).
> Purpose: hand this file to ChatGPT (or any teammate) so they understand exactly
> how Sales documents, Purchase documents, their statuses, and payments work in this
> Laravel multi-tenant invoicing platform.

---

## 1. The Big Picture — Two Separate Levels

This system always separates **two things**:

| Level | What it is | Does creating it move money? |
|-------|-----------|------------------------------|
| **The document** (facture, devis, bon de commande, etc.) | A commercial record with a `total` and an `amount_due` (remaining balance) | ❌ No — creating a document never marks it paid |
| **The payment** (Paiement client / Paiement fournisseur) | A separate record of money actually received or sent, **allocated** to one or more documents | ✅ Yes — it credits/debits the bank and reduces `amount_due` |

**Key rule:** You are **never forced** to pay a document you create. Payment is an
**optional, separate step** you record only when money actually changes hands.

This is also why **Chiffre d'affaires (CA)** ≠ **Encaissé**:

- **Chiffre d'affaires** = sum of invoiced `total` (accrual basis — counts as soon as the invoice is issued, paid or not).
- **Encaissé / collected** = only invoices fully `paid`.
- **Outstanding / en attente** = `amount_due` of unpaid invoices.

---

## 2. VENTES (Sales) — Documents & Statuses

### 2.1 Devis / Quote (`quotes` table)

A price proposal sent to a customer. **No payment, no money movement.**

**Statuses:** `draft` → `sent` → `accepted` / `rejected` / `expired` / `cancelled`

| Status | Meaning |
|--------|---------|
| `draft` | Being prepared, not sent yet |
| `sent` | Sent to the customer |
| `accepted` | Customer accepted it (can be converted to an invoice) |
| `rejected` | Customer refused |
| `expired` | Validity date passed |
| `cancelled` | Cancelled manually |

➡️ A quote does **not** affect CA and is **never paid**. It can be **converted into an invoice**, and only the invoice counts.

---

### 2.2 Facture / Invoice (`invoices` table) — ⭐ the core money document

This is the document that drives **Chiffre d'affaires** and **payments**.

**Statuses:** `draft`, `sent`, `partial`, `paid`, `overdue`, `void`

| Status | Meaning | Counts in CA? | Counts in Encaissé? |
|--------|---------|:-------------:|:-------------------:|
| `draft` | Being prepared, not issued | ✅ (except in dashboard which excludes only `void`) | ❌ |
| `sent` | Issued and sent to customer, awaiting payment | ✅ | ❌ |
| `partial` | Partially paid (some money received, balance remains) | ✅ | ❌ |
| `paid` | Fully paid | ✅ | ✅ |
| `overdue` | `sent`/`partial` past its `due_date` | ✅ | ❌ |
| `void` | Cancelled / annulled — excluded from everything | ❌ | ❌ |

**Money fields on the invoice:**
- `total` — full invoiced amount
- `amount_paid` — how much has been received + credit notes applied
- `amount_due` — remaining balance (`total - amount_paid`)

**How status changes automatically** (in `InvoiceService::updatePaymentTotals()`):
1. Every time a payment (or credit note) is allocated, the system recomputes
   `amount_paid` and `amount_due`.
2. If `amount_due <= 0` → status auto-becomes **`paid`**.
3. If some money received but balance remains, and current status is `sent` → auto-becomes **`partial`**.

➡️ So you create a `draft` invoice → mark it `sent` → record customer payments → it
becomes `partial` then `paid` automatically. **You don't manually set `paid`** — the
payment allocation does it.

---

### 2.3 Bon de livraison / Delivery Challan (`delivery_challans` table)

A delivery note (goods shipped to customer). **No payment, no money movement.**

**Statuses:** `draft` → `issued` → `delivered` / `cancelled`

---

### 2.4 Avoir / Credit Note (`credit_notes` table)

A credit issued to a customer (e.g. a return, a correction). It **reduces** what a
customer owes — it is **applied** to an invoice, not "paid".

**Statuses:** `draft`, `issued`, `applied`, `void`

➡️ When a credit note is applied to an invoice, it increases the invoice's
`amount_paid` (via `creditNoteApplications`), which can push the invoice toward `paid`
**without any cash actually being received**.

---

## 3. ACHATS (Purchases) — Documents & Statuses

Mirror image of Sales, but money flows **out** (you pay suppliers).

### 3.1 Bon de commande / Purchase Order (`purchase_orders` table)

An order you send to a supplier. **No payment, no money movement.**

**Statuses:** `draft`, `sent`, `confirmed`, `partially_received`, `received`, `cancelled`

| Status | Meaning |
|--------|---------|
| `draft` | Being prepared |
| `sent` | Sent to supplier |
| `confirmed` | Supplier confirmed the order |
| `partially_received` | Some goods received |
| `received` | All goods received |
| `cancelled` | Cancelled |

➡️ Receiving goods generates a **Goods Receipt** (`goods_receipts`, statuses: `draft`, `received`, `cancelled`). Still no money — it's about stock, not payment.

---

### 3.2 Facture fournisseur / Vendor Bill (`vendor_bills` table) — ⭐ the core purchase money document

The supplier's invoice **you owe**. This drives **purchases total** and **supplier payments**.

**Statuses (from migration):** `draft`, `posted`, `paid`, `void`

| Status | Meaning | Counts in purchases total? |
|--------|---------|:--------------------------:|
| `draft` | Being prepared | depends on report (most exclude only `cancelled`/`void`) |
| `posted` | Validated, you owe it, awaiting payment | ✅ |
| `paid` | Fully paid to supplier | ✅ |
| `void` | Cancelled | ❌ |

**Money fields:** `total`, `amount_paid`, `amount_due` (same model as invoices).

**Auto-transition** (`VendorBillService::updatePaymentTotals()`):
- When a supplier payment is allocated → recompute `amount_paid` / `amount_due`.
- If `amount_due <= 0` → status auto-becomes **`paid`**.

> ⚠️ **KNOWN BUG (see §6):** the vendor-bill auto-transition code references statuses
> `pending` and `partial`, but the DB enum only allows `draft, posted, paid, void`.
> A partial supplier payment may therefore fail to set a sensible intermediate status.

---

### 3.3 Note de débit / Debit Note (`debit_notes` table)

The purchase-side equivalent of a credit note — a credit **you** claim from a supplier
(e.g. you returned goods). It is **applied** to a vendor bill, reducing what you owe,
**without** sending cash.

➡️ Applied via `debitNoteApplications`, which increases the vendor bill's `amount_paid`.

---

## 4. PAIEMENTS — How Payments Actually Work

There are **two separate payment modules**, one per side:

| Menu | Module / Service | Records | Effect on bank | Effect on document |
|------|------------------|---------|----------------|--------------------|
| **Paiements clients** (Ventes) | `PaymentService` (`payments` table) | Money a **customer pays you** | **Credits** the bank | Reduces invoice `amount_due` |
| **Paiements fournisseurs** (Achats) | `SupplierPaymentService` (`supplier_payments` table) | Money you **pay a supplier** | **Debits** the bank | Reduces vendor bill `amount_due` |

### 4.1 Payment statuses

Both `payments` and `supplier_payments` use:
`pending`, `succeeded`, `failed`, `refunded`, `cancelled`
→ When created through the app, they are recorded directly as **`succeeded`**.

### 4.2 The allocation mechanism (identical on both sides)

A payment is **allocated** to one or more documents. This is the heart of the system:

1. You create a payment with a total `amount` and a list of **allocations**
   (each = `{ document_id, amount_applied }`).
2. **Guardrails enforced by the service:**
   - Each allocation amount must be `> 0`.
   - The sum of allocations cannot exceed the payment `amount` (no over-allocation of the payment).
   - An allocation cannot exceed a document's remaining `amount_due` (no over-paying a single invoice/bill).
   - The document must belong to the **same tenant** and the **same customer/supplier** as the payment.
   - (Sales only) the invoice must be in `sent` / `partial` / `overdue` before it can receive a payment.
3. For each allocation, the service:
   - Locks the document row (`lockForUpdate`) to prevent race conditions.
   - Creates a `PaymentAllocation` / `SupplierPaymentAllocation` row.
   - Calls `updatePaymentTotals()` → recomputes `amount_paid` / `amount_due` and
     auto-transitions the status (e.g. → `partial` or `paid`).

### 4.3 Deleting a payment reverses everything

Deleting a payment (`PaymentService::delete()` / `SupplierPaymentService::delete()`):
- Removes its allocations,
- Recomputes each affected document's totals (so `amount_due` goes back up, status
  reverts from `paid`/`partial` accordingly),
- Reverses the bank movement.

---

## 5. End-to-End Flow Examples

### 5.1 A sale that gets paid in two installments

```
1. Create invoice  → status: draft        (total = 1000, due = 1000)
2. Mark as sent    → status: sent          (counts in CA now)
3. Paiement client #1 = 400, allocated to invoice
                   → amount_paid = 400, due = 600
                   → status auto → partial
4. Paiement client #2 = 600, allocated to invoice
                   → amount_paid = 1000, due = 0
                   → status auto → paid     (counts in Encaissé now)
```

### 5.2 A purchase you owe and then pay

```
1. Create vendor bill → status: draft       (total = 500, due = 500)
2. Post the bill      → status: posted       (you owe 500)
3. Paiement fournisseur = 500, allocated to the bill
                      → amount_paid = 500, due = 0
                      → status auto → paid
```

### 5.3 A sale closed by a credit note (no cash)

```
1. Invoice sent, total = 300, due = 300
2. Customer returns goods → create Credit Note 300, apply to invoice
                          → amount_paid = 300, due = 0 → status paid
   (No money was received — the credit note settled it.)
```

---

## 6. ⚠️ Known Inconsistencies Found During the Scan

These are real findings from the code — worth knowing / fixing:

1. **Invoice status filter is inconsistent across reports.**
   - `dashboardKpis()` excludes only `status != 'void'`.
   - `salesSummary()` / `customerSummary()` exclude `status != 'cancelled'`.
   - But the invoice enum has **no `cancelled`** — its cancel status is **`void`**.
   - ➡️ The Sales/Customers reports filter on a status (`cancelled`) that invoices
     never have, so their "exclude cancelled" filter effectively does nothing, while
     the dashboard correctly excludes `void`. Numbers between dashboard and reports
     can diverge.

2. **Vendor bill auto-transition uses statuses that don't exist in the enum.**
   - `vendor_bills` enum = `draft, posted, paid, void`.
   - `VendorBillService::updatePaymentTotals()` checks for `pending` and tries to set
     `partial` — neither is a valid enum value.
   - ➡️ A **partial** supplier payment will not produce a clean intermediate status
     (and on strict MySQL enums could error). Recommend aligning the enum and the
     service (e.g. add `partial`, and use `posted` instead of `pending`).

---

## 7. Quick Reference — All Statuses at a Glance

**SALES**
| Document | Table | Statuses |
|----------|-------|----------|
| Quote / Devis | `quotes` | draft, sent, accepted, rejected, expired, cancelled |
| Invoice / Facture | `invoices` | draft, sent, partial, paid, overdue, void |
| Delivery Challan / Bon de livraison | `delivery_challans` | draft, issued, delivered, cancelled |
| Credit Note / Avoir | `credit_notes` | draft, issued, applied, void |
| Payment / Paiement client | `payments` | pending, succeeded, failed, refunded, cancelled |
| Refund / Remboursement | `refunds` | pending, succeeded, failed |

**PURCHASES**
| Document | Table | Statuses |
|----------|-------|----------|
| Purchase Order / Bon de commande | `purchase_orders` | draft, sent, confirmed, partially_received, received, cancelled |
| Goods Receipt / Réception | `goods_receipts` | draft, received, cancelled |
| Vendor Bill / Facture fournisseur | `vendor_bills` | draft, posted, paid, void |
| Debit Note / Note de débit | `debit_notes` | (applied to vendor bills) |
| Supplier Payment / Paiement fournisseur | `supplier_payments` | pending, succeeded, failed, refunded, cancelled |

---

## 8. TL;DR (one paragraph for ChatGPT)

> In this platform, creating a Sales or Purchase document (quote, invoice, purchase
> order, vendor bill) **never** marks it as paid — payment is a separate, optional step.
> Invoices and vendor bills carry `total`, `amount_paid`, and `amount_due`. You record
> money through two dedicated modules: **Paiements clients** (money in, credits the bank,
> reduces invoice balance) and **Paiements fournisseurs** (money out, debits the bank,
> reduces vendor bill balance). A payment is **allocated** to specific documents with
> strict anti-over-payment guardrails; allocating it auto-transitions the document to
> `partial` or `paid`. **Chiffre d'affaires** counts invoiced totals regardless of
> payment (accrual), while **Encaissé** counts only fully-paid invoices. Credit/debit
> notes can settle a balance without any cash. Two known bugs exist: reports filter
> invoices on a non-existent `cancelled` status (should be `void`), and the vendor-bill
> payment code references `pending`/`partial` statuses missing from its enum.
