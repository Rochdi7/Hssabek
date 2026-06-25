# Update Log

> **Rule:** Append a new entry to this file after EVERY change to the project.
> This file is the first thing to check before editing any module.

## 2026-06-25 — Fix contact form duplicate submissions

- `routes/frontoffice.php` — added `throttle:3,5` middleware to `POST /contact` (max 3 submissions per 5 minutes per IP)
- `resources/views/frontoffice/pages/contact.blade.php` — disable submit button + show "Envoi en cours…" on form submit to prevent double-click; re-enables after 8s as safety net

## 2026-06-25 — Stock movements linked to Credit Notes & Debit Notes + movements index reference column

- `app/Services/Purchases/DebitNoteService.php` — added `StockService` dependency; `create()` calls `deductStockOnce()` (return_out = goods leave to supplier); `update()` reverses then re-deducts; `void()` reverses via `reverseStockMovements()` (return_in to restore stock)
- `resources/views/backoffice/inventory/movements/index.blade.php` — added "Référence" column with clickable badge linking to Invoice/CreditNote/DebitNote/VendorBill/StockTransfer; added `return_in`/`return_out` to filter dropdown and label switch

## 2026-06-25 — Credit Note form: auto-fill from linked invoice + stock return on CN create/update/void

- `database/migrations/2026_06_25_100001_add_product_fields_to_credit_note_items.php` — NEW: adds `product_id` (FK→products, nullOnDelete) and `invoice_item_id` (FK→invoice_items, nullOnDelete) to `credit_note_items`
- `app/Models/Sales/CreditNoteItem.php` — added `product_id`, `invoice_item_id` to `$fillable`; added `product()` and `invoiceItem()` relationships
- `app/Services/Sales/CreditNoteService.php` — `create()`/`update()` now persist `product_id`/`invoice_item_id` per item and call `returnStockOnce()`; `void()` calls `reverseStockMovements()`; added `StockService` constructor dependency
- `app/Http/Controllers/Backoffice/Sales/CreditNoteController.php` — added `invoiceItems()` endpoint: returns invoice lines with per-item credited qty, remaining returnable qty, product info, for AJAX auto-populate
- `routes/backoffice/sales.php` — added `GET /credit-notes/invoice-items/{invoice}` route (before wildcard)
- `app/Http/Requests/Sales/Store/StoreCreditNoteRequest.php` — added `items.*.product_id` and `items.*.invoice_item_id` validation rules
- `app/Http/Requests/Sales/Update/UpdateCreditNoteRequest.php` — same
- `resources/views/backoffice/sales/credit-notes/create.blade.php` — added `fetchInvoiceItems()` JS: on invoice select, fetches lines, auto-fills customer, populates items table with original/credited/remaining qty per line, stock badge for tracked products; "add item" rows include hidden `product_id`/`invoice_item_id` inputs
- `resources/views/backoffice/sales/credit-notes/edit.blade.php` — added `product_id`/`invoice_item_id` hidden inputs to existing item rows; added `fetchInvoiceItems()` JS (only fires on invoice change, not on page load — existing DB items already pre-filled); "add item" rows include hidden inputs

## 2026-06-24 — Hide tax/frais section; fix oversized logo in document forms
- `resources/views/backoffice/sales/invoices/create.blade.php` — hide Taxe row + frais supplémentaires (d-none)
- `resources/views/backoffice/sales/invoices/edit.blade.php` — same
- `resources/views/backoffice/sales/credit-notes/create.blade.php` — logo: bigger (max-height 100px), removed company name text
- `resources/views/backoffice/sales/credit-notes/edit.blade.php` — same
- `resources/views/backoffice/purchases/purchase-orders/create.blade.php` — logo: bigger, removed address/contact info block
- `resources/views/backoffice/purchases/purchase-orders/edit.blade.php` — same

## 2026-06-24 — Fix MAD currency symbol (د.م. → DH)
- Updated `currencies` table directly (no migration): MAD symbol set to `DH`

## 2026-06-24 — HTML minification for backoffice and frontoffice

### Package added
- `renatomarinho/laravel-page-speed` v4.4 — minifies HTML responses via middleware

### What was done
- Installed package via `composer require renatomarinho/laravel-page-speed`
- Registered `RemoveComments` and `CollapseWhitespace` middlewares in the `web` group inside `bootstrap/app.php`
- Both middlewares apply to **all** web routes (backoffice + frontoffice) automatically
- Vite already minifies JS/CSS via esbuild during `npm run build` — no change needed there
- Cleared config, view, and cache after change

### Files changed
- `bootstrap/app.php` — added 2 middleware to `web` group
- `composer.json` / `composer.lock` — new package

---

## 2026-06-24 — Notification system bugs fixed

### Bugs fixed
1. **Reminder command never ran on new invoices** — `whereIn('status', ['unpaid','sent','partial','overdue'])` excluded `'active'` (the current default status for all created invoices). Fixed to `whereNotIn('status', ['paid','void'])`.
2. **`new_invoice` in-app notification never fired** — `LogInvoiceCreatedActivity` only logged; never checked `notification_settings['invoices']['new_invoice']['in_app']` or dispatched a notification. Fixed: now dispatches `InvoiceCreatedNotification` (new) to owner/admin when setting is enabled.
3. **`transactions` email/in_app notification ignored settings** — `SendPaymentConfirmationListener` always sent email regardless of `notification_settings['sales']['transactions']`. Fixed: respects `email` and `in_app` channel settings.
4. **`$settings` null crash** — `NotificationSettingsController::edit()` passed null `$settings` to view when no TenantSetting row exists, causing blade null-access errors. Fixed: falls back to `new TenantSetting()`.
5. **`reminder_settings` fields not validated** — `UpdateNotificationSettingsRequest` had no rules for `reminder_settings.*`. Added proper rules with French error messages.
6. **Currency code in PDF reminders** — `SendInvoiceRemindersCommand` passed `'MAD'` (code) to PDF templates. Fixed to look up symbol from DB.

### New file
- `app/Notifications/InvoiceCreatedNotification.php` — database-only notification for new invoice event

### Files changed
- `app/Console/Commands/SendInvoiceRemindersCommand.php`
- `app/Listeners/LogInvoiceCreatedActivity.php`
- `app/Listeners/SendPaymentConfirmationListener.php`
- `app/Http/Controllers/Backoffice/Settings/NotificationSettingsController.php`
- `app/Http/Requests/Settings/UpdateNotificationSettingsRequest.php`
- `app/Notifications/InvoiceCreatedNotification.php` (new)

## 2026-06-24 — Currency symbol display fixed system-wide (EUR→€, USD→$, MAD→DH)

### Problem
Currency was stored as code (`EUR`, `MAD`) but displayed as code in all views. EUR showed as "EUR" instead of "€". The `MAD→DH` mapping was hardcoded in 10+ places; all other currencies got no symbol lookup.

### Fix
- `AppServiceProvider` view composer: now queries `currencies.symbol` from DB instead of hardcoding `MAD→DH`.
- `UsesTenantCurrency` trait: now returns the currency **symbol** (looked up from DB).
- `PdfService`: passes symbol to all PDF templates.
- `InvoiceTemplateSettingsController`: uses symbol for preview PDFs.
- `DashboardController`: uses symbol from DB.
- Removed inline `$currencyCode = ...; $currency = ... MAD → DH` override block from 10 blade views (invoices, quotes, credit notes, delivery challans, purchase orders create/edit).

### Files changed
- `app/Providers/AppServiceProvider.php`
- `app/Traits/UsesTenantCurrency.php`
- `app/Services/Sales/PdfService.php`
- `app/Http/Controllers/Backoffice/Settings/InvoiceTemplateSettingsController.php`
- `app/Http/Controllers/Backoffice/DashboardController.php`
- `resources/views/backoffice/sales/invoices/create.blade.php`
- `resources/views/backoffice/sales/invoices/edit.blade.php`
- `resources/views/backoffice/sales/quotes/create.blade.php`
- `resources/views/backoffice/sales/quotes/edit.blade.php`
- `resources/views/backoffice/sales/credit-notes/create.blade.php`
- `resources/views/backoffice/sales/credit-notes/edit.blade.php`
- `resources/views/backoffice/sales/delivery-challans/create.blade.php`
- `resources/views/backoffice/sales/delivery-challans/edit.blade.php`
- `resources/views/backoffice/purchases/purchase-orders/create.blade.php`
- `resources/views/backoffice/purchases/purchase-orders/edit.blade.php`

## 2026-06-24 — Localization settings now fully applied system-wide

### Change
Saving localization settings (langue, fuseau horaire, devise, format de date, format d'heure) now correctly propagates to all parts of the system:
- `LocalizationSettingsController::update` syncs currency to both `localization_settings['currency']` AND `account_settings['default_currency']`, and also updates `tenants.timezone` / `tenants.default_currency` columns.
- `SetTenantContext` middleware now reads currency from `localization_settings['currency']` first (then falls back to `account_settings`, then tenant column); also applies `date_format` and `time_format` as `config('app.date_format')` / `config('app.time_format')` on every request.

### Files changed
- `app/Http/Controllers/Backoffice/Settings/LocalizationSettingsController.php`
- `app/Http/Middleware/SetTenantContext.php`

## 2026-06-24 — PO create/edit: product auto-fills label (matching invoice behavior)

### Change
Purchase Order create and edit forms now behave like the invoice form for line items:
- Product dropdown is shown **above** the label input (product first, label second).
- Selecting a product auto-fills the label with the product name and sets the field `readonly` (greyed out).
- Selecting a product also auto-fills the unit cost from `purchase_price` when the cost field is 0.
- Clearing the product dropdown removes `readonly` so the user can type a free-text label.
- On edit page load, rows that already have a product selected are immediately set `readonly`.
- Dynamic rows added via "Ajouter un article" follow the same behavior.

### Files changed
- `resources/views/backoffice/purchases/purchase-orders/create.blade.php`
- `resources/views/backoffice/purchases/purchase-orders/edit.blade.php`

## 2026-06-24 — Fix "Ajouter un article" button (invoices + quotes create/edit)

### Root cause
`buildTaxOptions()` in invoices/create, invoices/edit, quotes/create, quotes/edit called `tg.rates.reduce(...)` unconditionally. The `$taxGroupsJson` PHP block serializes only `{id, name, rate}` — no `rates` array. This threw `TypeError: Cannot read properties of undefined (reading 'reduce')` inside `DOMContentLoaded`, crashing the entire script before `addBtn.addEventListener` could register — making the button dead.

The other forms (credit-notes, debit-notes, purchase-orders, delivery-challans) already used the safe `tg.rates ? tg.rates.reduce(...) : 0` guard and were unaffected.

### Files changed
- `resources/views/backoffice/sales/invoices/create.blade.php` — safe guard in `buildTaxOptions()`
- `resources/views/backoffice/sales/invoices/edit.blade.php` — same
- `resources/views/backoffice/sales/quotes/create.blade.php` — same
- `resources/views/backoffice/sales/quotes/edit.blade.php` — same

### Notes for future Claude sessions
Whenever `$taxGroupsJson` is serialized in a `@php` block without including the `rates` sub-array, any JS that calls `tg.rates.reduce(...)` will crash. Always use `tg.rates ? tg.rates.reduce(...) : (tg.rate ?? 0)` as the safe pattern, matching what the other forms already use.

---

## Template — Copy this for each update

```md
## YYYY-MM-DD — Update Title

### Summary
What changed and why.

### Files changed
- `path/to/file.php` — what changed

### Database impact
None / Describe migration if applicable

### UI impact
None / Describe visual change if applicable

### Security impact
None / Describe security implications if applicable

### Tests/checks done
- [ ] Route tested manually
- [ ] Validation tested with invalid inputs
- [ ] No design change confirmed
- [ ] No production error exposure confirmed

### Notes for future Claude sessions
Anything important to remember about this change.
```

---

## 2026-06-24 — Company Logo Delete Feedback + PO Edit Logo Size

### Summary
(1) Company-settings logo trash button gave no visual feedback (only set `delete_logo=1` server-side); now clicking it swaps the preview to the placeholder, sets the flag, clears the file input, and hides itself — and uploading shows the trash + resets the flag. (2) On the Bon de commande EDIT form, the "Commandé par" logo `<img>` had no size constraint and rendered huge; matched it to the create form (`max-height: 48px; width: auto;` + `d-inline-block`).

### Files changed
- `resources/views/backoffice/settings/company.blade.php` — logo preview/delete JS + markup
- `resources/views/backoffice/purchases/purchase-orders/edit.blade.php` — "Commandé par" logo size

### Database impact
None

### UI impact
Logo delete now reacts instantly; PO edit logo no longer oversized.

### Security impact
None

### Notes for future Claude sessions
Backend logo delete still keys off `delete_logo` (file collection) — JS only adds feedback.

---

## 2026-06-24 — Fix: receipt rejects label-only PO lines ("product_id must be a valid UUID")

### Summary
Saving a receipt for a PO whose line is a free-text label (no catalog product, `product_id = null` — e.g. line "gg") failed with "The items.0.product_id field must be a valid UUID": the hidden product_id input rendered empty. A receipt moves stock, and stock needs a real product, so label-only lines are not receivable. Fix: the `po-lines` endpoint now excludes lines with null `product_id` and returns `has_product_lines`; the form shows a dedicated warning ("Ce bon de commande ne contient aucun produit du catalogue à réceptionner.") and disables save when a PO has no product lines. Found and fixed the same latent crash in one-click `PurchaseOrderService::receive()` — it would have passed a null product_id into `GoodsReceiptItem`/`StockService::adjust` (Product::findOrFail(null)); it now skips label lines.

### Files changed
- `app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php` — `purchaseOrderLines()` filters null-product lines; adds `has_product_lines`.
- `app/Services/Purchases/PurchaseOrderService.php` — `receive()` skips label-only lines.
- `resources/views/backoffice/purchases/goods-receipts/create.blade.php` — new no-product-lines notice; JS branches on `has_product_lines`.
- `tests/Feature/Purchases/GoodsReceiptStockTest.php` — +2 tests (endpoint excludes label lines; one-click receive skips them).

### Database impact
None.

### UI impact
Receipt form shows a clear warning for label-only POs instead of erroring on submit.

### Security impact
None.

### Tests/checks done
- [x] 22 tests pass

### Notes for future Claude sessions
PO items allow `product_id = null` (free-text label lines via TaxCalculationService). Any receiving/stock path MUST skip null-product lines — they cannot be stocked. Both the manual receipt endpoint and one-click receive now do.

---

## 2026-06-24 — Fix: receipt form PO lines 404 (wrong po-lines URL)

### Summary
Selecting a PO on the goods-receipt form raised "La ressource demandée est introuvable" (404) and falsely showed "Toutes les lignes … déjà été reçues" even though nothing was received. Cause: the view built the lines URL with `url('purchases/goods-receipts/po-lines')`, which omits the route group's `backoffice` prefix, so the fetch 404'd. The `.then(r => r.json())` then parsed the 404 page → empty `lines` → "all received". Fixed by generating the URL from the named route (`bo.purchases.goods-receipts.po-lines`) with a `__POID__` placeholder substituted in JS, and by throwing on non-OK responses so a failed fetch falls back to manual entry instead of a misleading "all received". Also fixed the to-receive default value to use the raw number (was a `fr-FR` localized string whose non-breaking thousand separators broke the numeric input).

### Files changed
- `resources/views/backoffice/purchases/goods-receipts/create.blade.php` — named-route URL + `__POID__` substitution; `!r.ok` guard; raw numeric default.
- `tests/Feature/Purchases/GoodsReceiptStockTest.php` — +1 test asserting the po-lines endpoint returns product_id/ordered/received/remaining.

### Database impact
None.

### UI impact
Receipt form now correctly lists the PO's products with Commandé / Déjà reçu / Restant / À recevoir. No layout change.

### Security impact
None.

### Tests/checks done
- [x] 20 tests pass (incl. new HTTP endpoint test)
- [x] Named route verified to include `/backoffice` prefix

### Notes for future Claude sessions
For backoffice AJAX URLs, ALWAYS use `route('bo.*', ['param' => '__PLACEHOLDER__'])` + JS substitution, never `url('relative/path')` — the latter drops the `backoffice` group prefix and 404s.

---

## 2026-06-24 — Automatic Purchase Order completion (status derived from quantities)

### Summary
Users must no longer manually mark a PO "Reçu"/"Partiellement reçu" — the system derives it from line quantities. Added `PurchaseOrder::recalculateStatus()` as the single source of truth: for every line `remaining = ordered − received`; all lines complete → `received`, any received → `partially_received`, nothing received → `active` (a manual `confirmed` is preserved; `cancelled` is never reopened). It persists the derived status and is called at every receiving point (`confirm()`, one-click `receive()`). The controller's `changeStatus()` now rejects manual `received`/`partially_received`, and those two options were removed from the status modal (replaced by an info note). Status is always recomputed from quantities, never trusted from storage alone.

### Files changed
- `app/Models/Purchases/PurchaseOrder.php` — new `recalculateStatus()` (canonical derive-and-persist).
- `app/Services/Purchases/GoodsReceiptService.php` — confirm() now calls `recalculateStatus()`; removed the duplicated private status method.
- `app/Http/Controllers/Backoffice/Purchases/PurchaseOrderController.php` — `changeStatus()` blocks the two auto-derived statuses (manual set list is now active/confirmed/cancelled).
- `resources/views/backoffice/purchases/purchase-orders/show.blade.php` — status modal drops received/partially_received options + adds explanatory note. Receive button already hidden once `received`.
- `tests/Feature/Purchases/GoodsReceiptStockTest.php` — +5 tests (multi-line partial→partially_received, multi-line full→received auto, derive-from-quantities ignores stale stored status, one-click auto-close, manual `received` rejected).

### Database impact
None.

### UI impact
PO show page only: status modal no longer lets you pick the two received states; an info note explains they are automatic. No redesign.

### Security impact
None negative — removes a way to put a PO in an inconsistent state vs its actual received quantities.

### Tests/checks done
- [x] 19 tests pass in GoodsReceiptStockTest (14 prior + 5 new)
- [x] Full purchases suite green (28 passed)
- [x] Manual received/partially_received now server-rejected

### Notes for future Claude sessions
PO received status is OWNED by `PurchaseOrder::recalculateStatus()`. Call it after anything that changes `received_quantity`. Do not `update(['status' => 'received'])` by hand anywhere — confirm()/receive() already route through it. `active`/`confirmed`/`cancelled` remain manual via changeStatus().

---

## 2026-06-24 — Goods Receipt receiving workflow + stock engine fixes

### Summary
The goods receipt form was a blank manual form: it never loaded PO lines, never tracked ordered/received/remaining, and never persisted `purchase_order_item_id`, so the PO received-quantity tracking and status progression were dead code. Two stock bugs were also found and fixed:
- **`PurchaseOrderService::receive()` (one-click receive) never moved stock** — it created a `received` receipt and bumped `received_quantity` but never touched `ProductStock` and never wrote a `StockMovement`. Inventory silently never increased.
- **`GoodsReceiptService::confirm()`** did a raw, unlocked read-modify-write on `ProductStock` and never synced `Product.quantity` (the cross-warehouse total `StockService` maintains), so product totals/history drifted.

Both paths now go through the single stock engine `StockService::adjust()` (row lock, product-total sync, movement write). Confirm is now idempotent (no-op when already `received`, plus a per-line `purchase_in` movement guard) so a double click can't double-add stock. The create form now loads PO lines on selection with Ordered / Déjà reçu / Restant / Quantité à recevoir, hides fully-received lines, shows "Toutes les lignes … déjà reçues", and over-receiving is blocked both client-side (clamp) and server-side (request rule against remaining qty).

### Files changed
- `app/Services/Purchases/GoodsReceiptService.php` — confirm() routes stock through StockService + idempotency guard; create()/update() persist `purchase_order_item_id` via `syncItems()`; update() blocked once received.
- `app/Services/Purchases/PurchaseOrderService.php` — receive() now builds a draft and delegates to `GoodsReceiptService::confirm()` so it actually moves stock; injected GoodsReceiptService.
- `app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php` — create() exposes a pre-selected PO; new `purchaseOrderLines()` JSON endpoint (ordered/received/remaining).
- `app/Http/Requests/Purchases/Store/StoreGoodsReceiptRequest.php` — accepts `purchase_order_item_id`; `withValidator()` blocks over-receiving against remaining qty.
- `resources/views/backoffice/purchases/goods-receipts/create.blade.php` — PO-line table (ordered/received/remaining/to-receive), all-received notice, JS line loader + qty clamp. Manual table kept for PO-less receipts.
- `routes/backoffice/purchases.php` — `goods-receipts/po-lines/{purchaseOrder}` route (placed before `{goodsReceipt}` to avoid param collision).
- `tests/Feature/Purchases/GoodsReceiptStockTest.php` — NEW, 14 tests.

### Database impact
None. No migrations. `purchase_order_item_id` column already existed on `goods_receipt_items` (migration 2026_02_01_000043) — it was simply never populated.

### UI impact
Create form only. Same theme/classes; adds a PO-line table and an all-received info alert. No redesign. All strings French.

### Security impact
None negative. Stock now goes through the tenant-scoped, row-locking `StockService` (safer than the previous raw increment). Over-receive validated server-side.

### Tests/checks done
- [x] 14 new tests pass (draft no-stock, confirm +stock, movement created, received_quantity, remaining math, over-receive blocked, accumulation, partial/received status, double-confirm idempotency, warehouse + product history, one-click receive)
- [x] Existing purchases + model suites still green (24 passed)
- [x] Routes resolve (po-lines before {goodsReceipt})
- [x] No design change beyond the requested receiving UI
- [x] No accounting/payment/invoice logic touched

### Notes for future Claude sessions
The one-click `PurchaseOrderService::receive()` and the manual confirm flow now share ONE stock engine (`GoodsReceiptService::confirm()` → `StockService::adjust()`). If you change how purchase stock is applied, change it there only. Confirm is idempotent via status + a `purchase_in` movement existence guard on `(reference_type, reference_id, product_id)`.

---

## 2026-06-23 — Fix Goods Receipt PO Dropdown (Active POs Missing)

### Summary
The "Nouvelle réception de marchandises" form showed an empty "Bon de commande" dropdown even with open POs. `GoodsReceiptController::create()` filtered `whereIn('status', ['draft','confirmed','partially_received'])`, but the status-enum migration (2026_03_07_000004) remaps legacy `draft`/`sent` → `active`, so active POs were excluded. Added a `receivable()` scope (not received, not cancelled) on `PurchaseOrder` and used it.

### Files changed
- `app/Models/Purchases/PurchaseOrder.php` — added `scopeReceivable()`
- `app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php` — `create()` uses `receivable()`
- `tests/Unit/Models/PurchaseOrderReceivableScopeTest.php` — NEW

### Database impact / UI impact / Security impact
None — design unchanged; active POs now correctly listed.

### Tests/checks done
- `PurchaseOrderReceivableScopeTest` passes (6 assertions).
- Audited other "create-from-related-document" dropdowns: QuoteController already includes `active`; VendorBill PO dropdown intentionally `received` only (bill after receipt) — both correct, left alone.

### Notes for future Claude sessions
Same class of bug as the payment allocation fix: a hardcoded status list excludes the legacy-remapped value. Reuse `PurchaseOrder::receivable()`. When migrations remap `draft`/`sent` to `active`/`unpaid`, audit every dropdown query that filters by status list.

## 2026-06-23 — Fix ActivityLog Insert (created_at default + nullable subject)

### Summary
Data export (`/settings/data-export/download`) threw `SQLSTATE[HY000] 1364 Field 'created_at' doesn't have a default value`. `ActivityLog` has `$timestamps = false` so Eloquent never set `created_at`, while the column is NOT NULL with no default. Also, the data-export audit log passes `subject_id => null`, but the column was NOT NULL. Fixed both: model now auto-fills `created_at` on creating; migration makes `subject_type`/`subject_id` nullable.

### Files changed
- `app/Models/System/ActivityLog.php` — `booted()` creating hook fills `created_at` (since `$timestamps = false`)
- `database/migrations/2026_06_23_000001_make_activity_log_subject_nullable.php` — NEW, makes subject columns nullable

### Database impact
Migration: `activity_logs.subject_type` and `subject_id` → nullable.

### Security impact
None — audit logging still records all fields; only allows subject-less entries (e.g. data exports).

### Notes for future Claude sessions
`ActivityLog` keeps `$timestamps = false` (no `updated_at`); rely on the creating hook for `created_at`. Subject-less audit logs are valid for non-model actions like `data_export`.

## 2026-06-23 — Company Capital Hint (SARL AU) + Invoice Image Block Restyle

### Summary
Two settings tweaks: (1) On company settings, the SARL AU capital hint now reads "Minimum légal : 100 000 DH pour une SARL AU" instead of "1 DH" (updated both the Blade and the JS `change` handler). (2) On invoice settings, replaced the `avatar-cropper` include for the invoice image with markup mirroring the company "Logo" block (`new-logo` thumbnail + trash button), showing the current uploaded image and allowing delete. Backend unchanged — still posts base64 via `cropped_invoice_image` / `cropped_invoice_image_deleted`.

### Files changed
- `resources/views/backoffice/settings/company.blade.php` — SARL AU min hint 1 DH → 100 000 DH (Blade + JS)
- `resources/views/backoffice/settings/invoice.blade.php` — invoice image now uses logo-style block with current pic + delete; added `@push('scripts')` for upload/delete
- `lang/ar.json` — updated SARL AU key, added "Téléchargez l'image affichée sur vos factures"

### Database impact
None

### UI impact
Invoice image upload now matches the company logo card style (thumbnail with delete trash icon). SARL AU capital hint text changed.

### Security impact
None — reuses existing `SecureBase64Image` validation and base64 field names.

### Notes for future Claude sessions
Invoice image still flows through `InvoiceSettingsController` base64 handling; only the front-end markup changed. The avatar-cropper component is no longer used on this page.

## 2026-06-23 — Allow Partial Payment Allocation (Don't Force Every Invoice)

### Summary
On the customer/supplier payment forms, validation required `amount_applied` on EVERY listed invoice row (`allocations.*.amount_applied => required`). Leaving a row blank (paying only the invoice you want) triggered "Le montant appliqué est obligatoire." Added `prepareForValidation()` to both store requests to drop blank allocation rows before validation, so only invoices/bills with a real amount > 0 are paid.

### Files changed
- `app/Http/Requests/Sales/Store/StorePaymentRequest.php` — strip blank allocations in `prepareForValidation()`
- `app/Http/Requests/Purchases/Store/StoreSupplierPaymentRequest.php` — same
- `tests/Feature/Sales/PaymentControllerTest.php` — added `test_can_pay_one_invoice_while_leaving_others_blank`

### Database impact
None.

### UI impact
None — design unchanged. Blank allocation rows are now accepted (only filled rows are paid).

### Security impact
None — overpayment guard and tenant/same-customer checks unchanged.

### Tests/checks done
- 15 tests pass (PaymentControllerTest + PaymentAllocationEligibilityTest).

### Notes for future Claude sessions
`amount_applied` is still `required`+`min:0.01` per row, but blank rows are removed before validation, so the user only pays the invoices they fill in.

## 2026-06-23 — Payment Allocation Eligibility Made Money-Based

### Summary
Customer payment allocation excluded `unpaid` invoices: `customerInvoices()` filtered on `whereIn('status', ['sent','partial','overdue'])`. Since the status-enum migration remaps legacy `draft`/`sent` → `unpaid`, a genuinely unpaid invoice never appeared in the allocation dropdown, blocking payment recording. "Sent" must never be required — clients may deliver invoices outside the system. Replaced status-list filtering with a money-based `allocatable()` scope (`amount_due > 0` and status not in `paid`/`void`) on both `Invoice` and `VendorBill`, and used it in both allocation queries.

### Files changed
- `app/Models/Sales/Invoice.php` — added `scopeAllocatable()`
- `app/Models/Purchases/VendorBill.php` — added `scopeAllocatable()`
- `app/Http/Controllers/Backoffice/Sales/PaymentController.php` — `customerInvoices()` now uses `allocatable()` (was `whereIn status sent/partial/overdue`)
- `app/Http/Controllers/Backoffice/Purchases/SupplierPaymentController.php` — `create()` now uses `allocatable()` (logic unchanged, was already money-based)
- `tests/Unit/Services/PaymentAllocationEligibilityTest.php` — NEW, 10 regression tests

### Database impact
None.

### UI impact
None — design unchanged. More invoices/bills now correctly listed for allocation.

### Security impact
None — tenant + same-client/supplier checks in `PaymentService`/`SupplierPaymentService` unchanged. Overpayment guard unchanged.

### Tests/checks done
- 20 tests pass (PaymentAllocationEligibility + PaymentService + SupplierPaymentService).

### Notes for future Claude sessions
Eligibility is money-based, not delivery-based. Reuse `Invoice::allocatable()` / `VendorBill::allocatable()` for any future allocation query. Do not reintroduce `status = sent`/`posted` requirements.

## 2026-06-23 — Token Efficiency & Model Selection Rules Added to CLAUDE.md

### Summary
Added two new mandatory sections to `CLAUDE.md` at the very top (before all other rules):
1. **TOKEN EFFICIENCY — CAVEMAN SKILL**: instructs Claude to read minimum files, write minimum code, say minimum words. No extras, no fluff.
2. **MODEL & EFFORT SELECTION**: tells Claude when to switch to `claude-opus-4-8` (auth, payments, multi-tenancy, migrations) and defines effort levels by task type. Includes 5 hard rules before touching production-risk areas.

### Files changed
- `CLAUDE.md` — added TOKEN EFFICIENCY and MODEL & EFFORT SELECTION sections at the top

### Database impact
None.

### UI impact
None.

### Security impact
Positive — Claude is now explicitly instructed to use maximum effort and a stronger model before touching auth, payments, tenant isolation, and live migrations.

### Notes for future Claude sessions
These two sections come FIRST in CLAUDE.md so they load into context before any other instruction. The caveman rule: do only what is asked, read only what you need. The model rule: when in doubt on production-risk tasks, switch to Opus and confirm with the user.

---

## 2026-06-23 — Full Project Documentation Created

### Summary
Initial comprehensive documentation scan and creation. No code was changed.
Documentation created from automated project scan covering routes, models, controllers, middleware, services, migrations, views, and security.

### Files created
- `docs/project-understanding/README.md` — How to use this documentation folder
- `docs/project-understanding/models.md` — All 85+ models with fields, relationships, schema gotchas
- `docs/project-understanding/routes.md` — All route files, naming conventions, middleware stacks
- `docs/project-understanding/controllers.md` — All controllers with purpose and key patterns
- `docs/project-understanding/database.md` — Migration history, schema conventions, seeders
- `docs/project-understanding/permissions.md` — RBAC system, roles, permissions, policies
- `docs/project-understanding/backoffice-ui-theme.md` — Layout rules, components, CSS classes, rules for new pages
- `docs/project-understanding/frontoffice.md` — Public website structure
- `docs/project-understanding/security.md` — Known risks, CSRF, mass assignment, headers, deployment checklist
- `docs/project-understanding/validation.md` — Form request conventions, patterns, French messages rule
- `docs/project-understanding/known-issues.md` — Schema gotchas, fixed bugs, test issues
- `docs/project-understanding/update-log.md` — This file

### Database impact
None — documentation only.

### UI impact
None — documentation only.

### Security impact
None — documentation only.

### Tests/checks done
- No code changed — documentation scan only.

### Notes for future Claude sessions
- The project is a mature multi-tenant SaaS Laravel 12 application.
- Phases 0, 2, and 3 are complete (foundation hardening, CRM, testing).
- Phase 4 is next — see `tasks/roadmap/` for the plan.
- Always check `docs/project-understanding/known-issues.md` before touching models — many schema column names differ from assumptions.
- The Gate::before bypass means admin/owner users bypass ALL policy checks.
- Test domain routing requires `URL::forceRootUrl()`, not `withHeader('Host', ...)`.
- 90 tests pass, 1 skipped (UserInvitation view bug on public route).

---

## Previous Changes (from memory — pre-documentation)

### Phase 0 — Foundation Hardening (2026-03-01)
- Removed `tenant_id` from `$fillable` on 30+ models
- Added `BelongsToTenant` trait to all tenant-owned models
- Added `SoftDeletes` to 12 financially critical models
- Created `DocumentNumberService` with unique sequence locking
- Added unique constraints on `document_number_sequences` and `invoices`
- `IdentifyTenantByDomain` now aborts 404 on unknown domains (was returning null)

### Phase 2 — CRM (2026-03-xx)
- Created `CustomerController`, `CustomerAddressController`, `CustomerContactController`
- Created 6 CRM Form Requests (French messages, tenant-scoped unique rules)
- Created 4 CRM Blade views (index, create, edit, show) following reference templates
- Fixed schema column names (type, line1, region, name, currency, payment_terms_days)
- Added `CustomerPolicy` and registered in AppServiceProvider
- Added `crm.php` routes file with 13 routes
- Updated sidebar with CRM section

### Phase 3 — Testing Foundation (2026-03-xx)
- Configured phpunit.xml with SQLite in-memory database
- Added `createTenantWithAdmin()`, `createTenant()`, `seedPermissionsOnce()` helpers to TestCase
- Created 28 factories in `database/factories/`
- Added `HasFactory` trait to all 30+ models
- Fixed `DocumentNumberService` column names (`key`, `next_number`)
- Fixed `LoginLog` fillable columns
- Fixed `PaymentAllocation` (`$timestamps = false`)
- Fixed `TenantSetting` (CREATED_AT = null)
- Fixed `RoleSeeder` (admin role now has permissions)
- Fixed `PlanFactory` (correct enum values)
- Result: 90 passed, 1 skipped, 0 failed

### Feature — Public Tokens (2026-06-20)
- Added `public_token` column to `invoices` and `quotes` tables
- Enables unauthenticated share links: `/invoice/{token}`, `/document/{token}/pdf`

### Feature — Measurement Line Items (2026-06-21)
- Added `length`, `width`, `height`, `thickness` columns to `invoice_items` and `quote_items`
- Supports `calculation_mode = measurement` for area/volume billing

### Refactor — Credit Notes & Debit Notes: No-Draft Workflow (2026-06-25)

**Goal:** Align Credit Notes (Avoirs) and Debit Notes with the same no-draft philosophy as invoices.

**New status enum:** `active | applied | void` (removed `draft` and `issued`)

**Business behaviour:**
- Document created → immediately `active`, immediately applied to linked invoice/vendor bill
- `void` action reverses all applications and restores linked document balances
- Edit is allowed on `active` and `applied` notes; re-applies with new total
- No manual "Issue" or "Apply" step required

**Files changed:**
- `database/migrations/2026_06_25_000001_simplify_credit_debit_note_statuses.php` — migrates existing `draft`/`issued` rows to `active`
- `app/Services/Sales/CreditNoteService.php` — rewritten: create → active + auto-apply; update reverses & re-applies; void reverses
- `app/Services/Purchases/DebitNoteService.php` — same pattern for purchase side
- `app/Http/Controllers/Backoffice/Sales/CreditNoteController.php` — removed apply/changeStatus, added void action
- `app/Http/Controllers/Backoffice/Purchases/DebitNoteController.php` — same
- `routes/backoffice/sales.php` — removed apply/change-status routes, added void route
- `routes/backoffice/purchases.php` — same
- `app/Services/Reports/ReportService.php` — salesSummary and dashboardKpis now subtract non-void credit notes from revenue (revenueMtd, revenueYtd, total_revenue)
- `resources/views/backoffice/sales/credit-notes/index.blade.php` — new badges (Actif/Appliqué/Annulé), updated filter dropdown
- `resources/views/backoffice/sales/credit-notes/show.blade.php` — removed change-status modal & apply form; added Void button
- `resources/views/backoffice/purchases/debit-notes/index.blade.php` — new badges, updated filter dropdown, fixed `total_amount` → `total`
- `resources/views/backoffice/purchases/debit-notes/show.blade.php` — removed change-status modal & apply form; added Void button

### Audit & Fix — Dashboard & Report Calculations After Credit Note / Debit Note Workflow Change (2026-06-25)

**Audit scope:** All controllers, services, views, and exports that calculate revenue, purchases, or reference credit notes / debit notes.

**Issues found and fixed:**

1. **`DashboardController` — `$creditNotesTotal` widget (line 84)**
   - Bug: `CreditNote::sum('total')` — no void filter, included cancelled notes
   - Fix: Added `->where('status', '!=', 'void')` filter
   - Impact: "Total Avoirs" card on dashboard now shows only effective credit notes

2. **`ReportService::salesSummary()` — monthly revenue chart (`$byMonth`)**
   - Bug: Showed gross invoice totals per month; credit notes not offset per-month
   - Fix: Fetch credit notes grouped by month and subtract from each month's invoice total
   - Impact: Sales report revenue chart now shows net revenue per month

3. **`ReportService::customerSummary()` — total revenue KPI**
   - Bug: `$totalRevenue` was gross invoice sum, not net of credit notes
   - Fix: Compute `$grossRevenue - $creditNotesDeducted` (both with `status != void` filter)
   - Impact: Customer report revenue summary now reflects credit notes

4. **`ReportService::dashboardKpis()` — revenue trend chart (`$revenueTrend`)**
   - Bug: 12-month revenue line chart used gross invoice totals without credit note offsets
   - Fix: Fetch credit notes for last 12 months grouped by month; subtract per-month from invoice totals
   - Impact: Dashboard revenue trend chart now shows net monthly revenue

5. **`ReportService::purchaseSummary()` — total purchases KPI and monthly chart**
   - Bug: `$totalPurchases` and `$purchasesByMonth` showed gross vendor bill totals without deducting debit notes
   - Fix: Compute `grossPurchases - debitNotesTotal` (both non-void); same monthly offset for `purchasesByMonth`
   - Import added: `use App\Models\Purchases\DebitNote;`
   - Impact: Purchase report now shows net purchase costs after debit note adjustments

**Calculations NOT changed (already correct):**
- `dashboardKpis()` MTD/YTD revenue — already subtracts credit notes ✓
- `salesSummary()` `total_revenue` summary card — already subtracts credit notes ✓
- `InvoiceService::updatePaymentTotals()` — correctly sums `paymentAllocations + creditNoteApplications` ✓
- `VendorBillService::updatePaymentTotals()` — correctly sums `supplierPaymentAllocations + debitNoteApplications` ✓
- `financeSummary()` — uses `Income`/`Expense` models, not invoices; unaffected ✓
- Export CSVs — export raw invoice/bill rows; per-row `amount_paid` and `amount_due` are already correct ✓
- `outstandingTotal`, `overdueTotal`, `receivedTotal` — use `amount_due`/`amount_paid` columns which are kept up-to-date by service layer ✓

**Files changed:**
- `app/Http/Controllers/Backoffice/DashboardController.php`
- `app/Services/Reports/ReportService.php`

### Feature — Credit Note Form: Invoice Summary Panel & Over-Credit Validation (2026-06-25)

**Goal:** When a user selects a linked invoice on the Credit Note create/edit form, show a live summary panel with invoice totals and prevent over-crediting.

**Changes:**

**Route added — `routes/backoffice/sales.php`**
- `GET /credit-notes/invoice-summary/{invoice}` → `CreditNoteController::invoiceSummary()` (placed before `/{creditNote}` wildcard to avoid conflict)

**Controller — `app/Http/Controllers/Backoffice/Sales/CreditNoteController.php`**
- Added `invoiceSummary(Invoice $invoice)` method: returns JSON with `invoice_number`, `customer_name`, `total`, `amount_paid` (payments only), `amount_credited` (non-void credit note applications), `amount_due`, `currency`
- Added `use App\Models\Finance\Currency;` import
- Edit action: added `applications` to eager load (`$creditNote->load(['items', 'applications'])`) so edit view can compute own prior application amount

**Form Requests — server-side over-credit guard**
- `app/Http/Requests/Sales/Store/StoreCreditNoteRequest.php`: added closure validator on `items` that computes credit total from submitted line items and rejects if `creditTotal > invoice.amount_due + 0.01`
- `app/Http/Requests/Sales/Update/UpdateCreditNoteRequest.php`: same guard, but adds back the credit note's own prior application to `amount_due` before comparing (so editing within original allocation is allowed)

**Views — `resources/views/backoffice/sales/credit-notes/create.blade.php` and `edit.blade.php`**
- Helper text updated: "Optionnel. Si vous liez cet avoir à une facture, le montant de l'avoir sera appliqué automatiquement et réduira le reste à payer de cette facture."
- Invoice summary panel added (hidden by default, shown on invoice select): Total facture / Déjà payé / Déjà crédité / Reste à payer / Cet avoir / Reste après avoir
- Over-credit warning alert added (shown when credit note total > invoice amount_due)
- Submit button disabled client-side when over-credit detected
- JS: `fetchInvoiceSummary()` fetches from new endpoint on invoice change; `recalcWithSummary()` wraps existing `recalc()` to update panel live on any item/tax/discount change
- Edit view: `ownCreditApplication` computed from `$creditNote->applications` to correctly show effective remaining due (restores own prior application before comparing)


## 2026-06-25 — SuperAdmin: Créer compte + Campagne Email tenants

### Nouvelles fonctionnalités
- `app/Console/Commands/CreateSuperAdminCommand.php` — commande `superadmin:create <email>` pour créer/promouvoir un utilisateur super admin (tenant_id=null + rôle super_admin)
- Compte `rochdi.karouali1234@gmail.com` créé et promu super admin via la commande
- `app/Http/Controllers/SuperAdmin/CampaignEmailController.php` — compose + send + export CSV des emails tenant
- `routes/superadmin/campaign.php` — routes `sa.campaign.compose / send / export`
- `resources/views/backoffice/superadmin/campaign/compose.blade.php` — page de campagne avec sélection des destinataires, éditeur Summernote, export CSV
- `routes/web.php` — ajout `require campaign.php`
- Sidebar : lien "Campagne Email" ajouté dans section Communication

## 2026-06-25 — Fix logo PDF + Chantier field sur devis/factures

### Logo fix (tous les templates PDF)
- Remplacé `height="50"` par `max-height:70px; max-width:180px; width:auto; height:auto` sur tous les templates free (model-1 à model-4, ~35 fichiers)
- Corrigé `.logo-circle img` et `.logo-box img` CSS dans model-2/3/4 (même règle responsive)

### Chantier field (sans migration)
- `app/Traits/HasChantierField.php` — trait qui pack/unpack `chantier_name` + `chantier_location` dans le champ `notes` existant (format JSON `{"__c":{"n":"...","l":"..."},"__notes":"..."}`)
- Trait ajouté à `Quote` et `Invoice` models
- `QuoteService::create/update` et `InvoiceService::create/update` — appellent `packNotes()` pour stocker les données chantier
- Inputs "Chantier" ajoutés dans les 4 vues : quotes/create, quotes/edit, invoices/create, invoices/edit
- Bloc chantier conditionnel ajouté dans tous les templates PDF quote/invoice (model-1 à model-4)

## 2026-06-25 — Fix encodage PDF + champ Addition (Chantier)

### Fix encodage UTF-8
- Corrigé tous les caractères `\xef\xbf\xbd` (U+FFFD) dans les 4 templates quote (model-1 à 4)
- Textes corrigés : `Validité jusqu'au`, `Arrêté le présent document à la somme de :`, `N° Devis`, `Passé cette date`

### Champ Addition (remplace Chantier dans notes)
- Supprimé `HasChantierField` trait + packing dans `notes` (approche précédente annulée)
- Nouveau champ `addition` (input texte libre) dans les 4 formulaires create/edit (quotes + invoices)
- Stocké dans `bill_to_snapshot['addition']` (colonne JSON déjà existante, sans migration)
- Affiché en gras sous le bloc client dans tous les templates PDF (model-1 à 4, quotes + invoices + credit-note + debit-note)
- Exemple d'utilisation : `Chantier : villa riad al menzeh meknes`
