# Known Issues & Gotchas

> This file documents discovered bugs, schema inconsistencies, and things to watch out for.
> Read this before editing any module.

---

## Schema Column Name Gotchas

These columns differ from what you might naively assume. **Always check the migration** before writing model/controller code.

| Model | Assumed column | Actual column | Fixed in |
|-------|---------------|---------------|---------|
| `Customer` | `customer_type` | `type` | Phase 2 |
| `Customer` | `currency_id` | `currency` | Phase 2 |
| `Customer` | `payment_terms` | `payment_terms_days` | Phase 2 |
| `CustomerAddress` | `address_type` | `type` | Phase 2 |
| `CustomerAddress` | `address_line1` | `line1` | Phase 2 |
| `CustomerAddress` | `state` | `region` | Phase 2 |
| `CustomerContact` | `contact_name` | `name` | Phase 2 |
| `DebitNote` | `debit_note_number` | `number` | Phase 0 |
| `DebitNote` | `total_amount` | `total` | Phase 0 |
| `DebitNote` | `tax_amount` | `tax_total` | Phase 0 |
| `DocumentNumberSequence` | `document_type` | `key` | Phase 3 |
| `DocumentNumberSequence` | `current_number` | `next_number` | Phase 3 |
| `BankAccount` | `checking` (type enum) | `current` | Phase 3 |
| `StockTransfer` | `pending` (status enum) | `draft` | Phase 3 |
| `Plan` | `monthly` (interval enum) | `month` | Phase 3 |
| `Plan` | `yearly` (interval enum) | `year` | Phase 3 |
| `SubscriptionInvoice` | `completed` (payment_status) | `succeeded` | Phase 3 |

---

## Model Configuration Issues (Fixed)

### PaymentAllocation
- **Issue:** Model was using timestamps but table has no `created_at`/`updated_at` columns.
- **Fix:** Added `public $timestamps = false;`

### TenantSetting
- **Issue:** Table has `updated_at` but no `created_at`.
- **Fix:** Added `const CREATED_AT = null;` and `const UPDATED_AT = 'updated_at';`

### LoginLog
- **Issue:** Wrong fillable columns were defined.
- **Fix:** Corrected to match migration.

---

## DocumentNumberService

- **Issue found in Phase 3:** Service was using wrong column names (`document_type` instead of `key`, `current_number` instead of `next_number`).
- **Fix:** Corrected column references in `DocumentNumberService::generate()`.
- **Critical:** This service uses `lockForUpdate()` in a DB transaction to prevent duplicate numbers — do NOT change this logic without testing under concurrent load.

---

## Test Infrastructure Issues

### Domain Routing in Tests
- **Issue:** `withServerVariables(['HTTP_HOST' => $domain])` and `withHeader('Host', $domain)` do NOT work for tenant domain resolution.
- **Reason:** `url()` generates URLs with `APP_URL` host, and Symfony parses host from the URL, ignoring HTTP_HOST header.
- **Fix:** Must use `URL::forceRootUrl('http://' . $domain)` in test setup.

### Subscription Required for Backoffice Tests
- **Issue:** `EnsureActiveSubscription` middleware blocks backoffice routes without an active subscription.
- **Fix:** `createTenantWithAdmin()` helper in TestCase automatically creates a valid subscription.

---

## Skipped Tests

### `UserInvitationTest::test_valid_token_shows_accept_form`
- **Status:** Skipped
- **Reason:** The accept-invite view calls `auth()->user()->unreadNotifications()` on a public (unauthenticated) route, causing a null pointer error.
- **Needs fix:** The view must guard this call with `@auth` or the route must load a guest user.

---

## RoleSeeder Issue (Fixed)
- **Issue:** Admin role was created but had no permissions assigned.
- **Fix:** `RoleSeeder` now explicitly assigns all permissions to the `admin` role.
- **Note:** If you reseed a development database and find admin users can't access anything, re-run `php artisan db:seed --class=RoleSeeder`.

---

## PlanFactory Issue (Fixed)
- **Issue:** Factory was using `monthly`/`yearly` for interval but the enum requires `month`/`year`.
- **Fix:** Updated `PlanFactory` to use correct enum values.

---

## Arabic / RTL Layout
- RTL support is applied via locale detection in `mainlayout.blade.php`
- Separate Arabic auth views exist in `resources/views/ar/auth/`
- If you add new auth pages, you need both a French and an Arabic version if RTL is required.

---

## Multi-Tenant User Email
- User emails are **global** (not per-tenant) — the `users` table has a global unique constraint on `email`.
- This means the same email cannot be used in two different tenants.
- `LoginController` finds users by email globally, then verifies tenant context.

---

## File Upload via Spatie Media Library
- Products, customers, and company settings use Spatie Media Library for file storage.
- Media files are stored in `storage/app/public/media/`.
- The `.htaccess` blocks execution of PHP/JS/HTML in the `storage/` path — this is intentional and must not be removed.

---

## Gate Bypass for Admin/Owner
- `Gate::before` in `AppServiceProvider` returns `true` for admin and owner roles.
- This means ALL policy checks are skipped for these roles.
- This is intentional design — admins/owners have unrestricted access.
- Do NOT add policy checks that assume admins can be blocked by policies.

---

## Subscription Expiry
- When a subscription expires, `EnsureActiveSubscription` middleware blocks all backoffice routes.
- The `CheckExpiredSubscriptionsCommand` runs on a schedule to fire `SubscriptionExpired` events.
- `HandleSubscriptionExpired` listener handles the event (notify user, etc.).
