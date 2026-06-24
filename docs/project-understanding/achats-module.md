# Achats (Purchasing) Module — Model Reference

> Context file for understanding the purchasing flow: **Bon de commande → Réception → Facture fournisseur → Paiement fournisseur**.
> Multi-tenant Laravel app. Every model uses the `BelongsToTenant` trait (auto-scopes by `tenant_id`), UUID primary keys, and French UI labels.

---

## 1. The flow at a glance

```
Supplier (Fournisseur)
   │
   ▼
PurchaseOrder (Bon de commande)      what we ORDER
   │  status: active → confirmed → partially_received → received → cancelled
   ▼
GoodsReceipt (Réception)             what physically ARRIVES (moves stock)
   │  status: draft → received
   ▼
VendorBill (Facture fournisseur)     what we OWE (money-driven)
   │  status: unpaid → partial → paid  (+ overdue, void)
   ▼
SupplierPayment (Paiement fournisseur)  what we PAY
       allocated to bills via SupplierPaymentAllocation
```

Three separate documents, linked by foreign keys. They do **not** auto-create each other unless an explicit action is taken.

---

## 2. Models

### Supplier — `app/Models/Purchases/Supplier.php`
The vendor. Fields: `name`, `email`, `phone`, `tax_id`, `payment_terms_days`, `status` (`active`/inactive), `notes`.
Relations: `purchaseOrders`, `vendorBills`, `payments`, `paymentMethods`.

### PurchaseOrder (Bon de commande) — `app/Models/Purchases/PurchaseOrder.php`
What you order. Has line items (`PurchaseOrderItem`) with `quantity` and `received_quantity`.

**Statuses** (legacy `draft`/`sent` were remapped to `active` by migration `2026_03_07_000004`):

| Status | Meaning |
|--------|---------|
| `active` | created, editable, can still receive goods (default on create) |
| `confirmed` | confirmed with supplier |
| `partially_received` | some line items received |
| `received` | fully received |
| `cancelled` | dead |

Key methods:
- `normalizedStatus()` — maps legacy `draft`/`sent` → `active`.
- `scopeReceivable()` — POs that can still receive goods (NOT `received`, NOT `cancelled`). **Use this for the receipt dropdown** — filtering by a hardcoded status list breaks because `active` gets excluded.

Relations: `supplier`, `warehouse`, `items`, `goodsReceipts`, `vendorBills`.

### GoodsReceipt (Réception) — `app/Models/Purchases/GoodsReceipt.php`
What physically arrived in a warehouse. Has line items (`GoodsReceiptItem`).

**Statuses:** `draft` → `received`.
- `draft` = recorded but **stock NOT moved yet**.
- `received` = confirmed; stock incremented, `StockMovement` written, linked PO updated.

Fields: `purchase_order_id` (nullable — a receipt can exist without a PO), `warehouse_id`, `received_at`, `created_by`.
Relations: `purchaseOrder`, `warehouse`, `items`, `creator`.

### VendorBill (Facture fournisseur) — `app/Models/Purchases/VendorBill.php`
The bill you owe and pay. **Status is money-driven**, not manual.

**Statuses** (legacy `draft`/`posted` remapped to `unpaid` by migration `2026_03_07_000002`):

| Status | Meaning |
|--------|---------|
| `unpaid` | nothing paid yet (default) |
| `partial` | partially paid |
| `paid` | fully paid |
| `overdue` | past due date, still owing |
| `void` | cancelled |

Money fields: `total`, `amount_paid`, `amount_due`.
Key methods:
- `normalizedStatus()` — maps legacy `draft`/`posted` → `unpaid`.
- `scopeAllocatable()` — bills a supplier payment can be applied to: `amount_due > 0` AND status NOT in (`paid`, `void`). **Money-based eligibility — never require `posted`.**

Relations: `supplier`, `purchaseOrder`, `goodsReceipt`, `payments`, `supplierPaymentAllocations`, `debitNotes`, `debitNoteApplications`.

### SupplierPayment (Paiement fournisseur) — `app/Models/Purchases/SupplierPayment.php`
Money paid to a supplier, split across one or more bills via `SupplierPaymentAllocation` (each allocation: `vendor_bill_id` + `amount_applied`).
Fields: `supplier_id`, `amount`, `status`, `payment_date`, `reference_number`, `payment_method_id`.

---

## 3. Services (business logic — controllers stay thin)

### PurchaseOrderService — `app/Services/Purchases/PurchaseOrderService.php`
- `create()` — builds PO + items via `TaxCalculationService`; always starts `active`.
- `update()` — **only allowed while `active`** (`normalizedStatus() === 'active'`), else throws `DomainException`.
- `transition($po, $newStatus)` — validates allowed status transitions.
- `receive($po)` — **one-shot receipt**: creates a `GoodsReceipt` already `received`, fills every remaining quantity, sets PO → `received`. (Does NOT go through the draft/confirm step below.)

### GoodsReceiptService — `app/Services/Purchases/GoodsReceiptService.php`
- `create()` — manual receipt form. Creates a **`draft`** receipt. **Stock is NOT moved here.**
- `confirm($receipt)` — the important step. For each line: increments `ProductStock`, writes a `StockMovement` (`purchase_in`), bumps the PO item's `received_quantity`, then recomputes the PO status (`partially_received` or `received`). Sets receipt → `received`.

> ⚠️ **Gotcha:** the manual receipt is a TWO-step process (create draft → confirm). Stock only updates on `confirm()`. The PO "Recevoir" button (`PurchaseOrderService::receive`) is one step. These two paths behave differently.

### VendorBillService — `app/Services/Purchases/VendorBillService.php`
- `isEditable()` — editable only if not paid/void and `amount_paid <= 0`.
- `void()` — the only manual status change.
- `updatePaymentTotals()` — recomputes `amount_paid` / `amount_due` from supplier payment allocations + debit note applications, then auto-resolves status. **Payments are the single source of truth for status.**

### SupplierPaymentService — `app/Services/Purchases/SupplierPaymentService.php`
- `create()` — records a payment, validates tenant + same-supplier + no overpayment, creates allocations, recomputes each bill's totals.
- `delete()` — reverses allocations and recomputes bills.

---

## 4. Controllers & where documents are picked from

| Screen | Controller | Source query for the dropdown |
|--------|-----------|-------------------------------|
| New PO | `PurchaseOrderController@create` | active suppliers |
| New Réception | `GoodsReceiptController@create` | `PurchaseOrder::receivable()` (POs not received/cancelled) |
| New Facture fournisseur | `VendorBillController@create` | `PurchaseOrder::where('status','received')->doesntHave('vendorBills')` (bill a received PO, once) |
| New Paiement fournisseur | `SupplierPaymentController@create` | `VendorBill::allocatable()` (open balance, not paid/void) |

---

## 5. Recurring bug class — status-list filters

The migrations `2026_03_07_000001..000004` widened status enums and **remapped legacy values**:
- Invoice / PurchaseOrder / Quote: `draft`,`sent` → `active`/`unpaid`
- VendorBill: `draft`,`posted` → `unpaid`

Any query that filters by a **hardcoded status list** (e.g. `whereIn('status', ['draft','confirmed',...])`) silently drops the remapped value and a document "disappears" from a dropdown. **Fix pattern:** use an intent-named scope (`receivable()`, `allocatable()`) that expresses the rule by what's NOT closed, instead of listing open statuses.

---

## 6. Quick mental model

- **Bon de commande** = intention to buy (editable while `active`).
- **Réception** = goods arrived; this is what moves **stock**.
- **Facture fournisseur** = the debt; status follows the **money**, not manual clicks.
- **Paiement fournisseur** = settle the debt, allocated across bills.
