# Security Documentation

> **Rule:** Do not expose SQL errors, Laravel exceptions, or stack traces to users in production.
> All risks documented here — do not make changes without reading this file first.

---

## Authentication & Authorization

### Multi-Tenant Domain Resolution
- **Middleware:** `IdentifyTenantByDomain`
- **Behavior:** Extracts tenant from request domain/subdomain. On backoffice routes with unknown domain → `abort(404)` (no information leakage).
- **Risk if broken:** Users could access wrong tenant data.

### Session Guard
- **Guard:** `web` (standard Laravel session-based auth)
- **Token:** CSRF token on all POST/PUT/DELETE forms
- **Session timeout:** 3 hours (configured in `config/auth.php`)

### Super Admin Detection
- Super admins have `tenant_id = null` in the users table
- `IsSuperAdmin` middleware: rejects any user with `tenant_id != null`
- `Gate::before`: returns `true` (full access) for `tenant_id === null`

---

## CSRF Protection

- All forms must include `@csrf`
- Laravel verifies CSRF token automatically on all POST/PUT/PATCH/DELETE routes
- The `.htaccess` passes the `X-XSRF-Token` header for JavaScript AJAX requests:
  ```apache
  RewriteCond %{HTTP:x-xsrf-token} .
  RewriteRule .* - [E=HTTP_X_XSRF_TOKEN:%{HTTP:X-XSRF-Token}]
  ```

---

## Mass Assignment Protection

**Phase 0 hardening applied:**
- `tenant_id` removed from `$fillable` on all 30+ core domain models
- Auto-assigned via `BelongsToTenant` trait's `creating` observer
- **Models intentionally keeping `tenant_id` in fillable** (infrastructure only):
  - `Tenancy/Role`, `Tenancy/Permission` — Spatie models
  - `Tenancy/TenantDomain`, `Tenancy/TenantSetting` — Infrastructure
  - `Billing/Subscription`, `Billing/SubscriptionInvoice` — SuperAdmin-managed
  - `System/ActivityLog`, `EmailLog`, `NotificationLog` — System-generated logs
  - `Pro/` models — Future phase

---

## Cross-Tenant Access Prevention

Every controller that retrieves a single resource uses:
```php
private function assertSameTenant($model): void
{
    if ($model->tenant_id !== tenant()->id) {
        abort(403);
    }
}
```

The `BelongsToTenant` trait adds a global query scope so `Model::find($id)` only returns records belonging to the current tenant. The `assertSameTenant()` call is a second layer of defense.

---

## File Upload Security

### .htaccess Rules
Dangerous file types blocked from execution in public storage:
```apache
RewriteRule ^storage/.*\.(php[0-9]?|phtml|phar|sh|bash|exe|dll|js|mjs|html?|shtml|cgi|pl|py)$ - [F,NC]
```

### Spatie Media Library
- Used for avatar uploads and document attachments
- File types should be validated in Form Requests before storing

### Risk
- Ensure all upload Form Requests validate `mimes` and `max` file size
- Check that `storage/app/public` uploads are served through Nginx/Apache rules

---

## Production Error Handling

### Current Status
- `APP_DEBUG=false` in production (config/app.php default)
- Laravel's default exception handler hides stack traces in production
- Custom 404/500 error views should be in `resources/views/errors/`

### Risk
- Verify `APP_DEBUG` is `false` in the production `.env` file
- Check `config/app.php` does not hardcode `APP_DEBUG=true`
- Confirm error views do NOT print `$exception->getMessage()` directly

---

## SQL Injection

- All database queries use Eloquent or Query Builder with parameterized bindings
- No raw SQL with user input detected
- `DB::raw()` usage should be audited if added in future

---

## Security Headers (.htaccess)

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
Header unset X-Powered-By
Header unset Server
```

### Missing Headers (Known Gap)
- No `Content-Security-Policy` header in `.htaccess` (a `ContentSecurityPolicy` middleware exists — verify it is applied)
- No `Strict-Transport-Security` (HSTS) header — should be added for HTTPS production

---

## Rate Limiting (AppServiceProvider)

| Limiter | Limit | Purpose |
|---------|-------|---------|
| `login` | 5/minute per IP | Brute force protection |
| `register` | 3/minute per IP | Bot registration prevention |
| `password.reset` | 3/minute per IP | Reset abuse prevention |
| `exports` | 10/minute per user | Prevent data scraping |

---

## Public Routes (No Authentication)

These routes are accessible without login — verify they expose only intended data:

| Route | Risk |
|-------|------|
| `GET /invoice/{token}` | Token is a random UUID — only accessible if you have the exact token |
| `GET /document/{token}/pdf` | Same — UUID token, no auth |
| `POST /contact` | Public form — has rate limiting, no sensitive data |
| `POST /newsletter` | Public signup — no sensitive data |
| `GET /account-request` | New tenant signup form |

**Risk:** If `public_token` values are sequential or guessable, they leak customer data. Verify tokens are UUIDs (random, not sequential).

---

## Authorization Policies

33 policies cover all core models. Policies enforce:
1. User belongs to same tenant as the resource (`tenant_id` match)
2. User has the specific permission (`sales.invoices.view`, etc.)

**Bypassed for:** admin, owner, super_admin (via `Gate::before`).

---

## Subscription Access Control

**Middleware:** `EnsureActiveSubscription`
- Blocks all backoffice routes if subscription is expired/cancelled
- Plan limits checked via `CheckPlanLimit` middleware on specific routes

---

## Known Security Risks

### HIGH
- None currently identified requiring immediate action.

### MEDIUM
1. **HSTS missing** — add `Strict-Transport-Security` header for HTTPS-only production.
2. **CSP header** — `ContentSecurityPolicy` middleware should be verified as active on all routes.
3. **Upload MIME validation** — audit all Form Requests that accept file uploads to confirm `mimes` validation.

### LOW
1. **Email enumeration** — forgot password form may reveal whether an email exists. Standard Laravel behavior.
2. **User agent logging** — LoginLog stores user agents. Ensure no PII concerns with storage retention.

---

## Deployment Safety Checklist

Before deploying to production:
- [ ] `APP_DEBUG=false` in `.env`
- [ ] `APP_ENV=production` in `.env`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Verify `.env` is NOT committed to git
- [ ] Verify `storage/` and `bootstrap/cache/` are writable
- [ ] Verify HTTPS is enforced
- [ ] Verify error views in `resources/views/errors/` do not expose debug info
