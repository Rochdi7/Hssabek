# TASK 5 -- Infrastructure & Frontend Production Readiness

**Priority:** P4 -- Final gate before production launch
**Estimated effort:** 3-4 days
**Dependency:** Tasks 1-4 completed (deploy what's proven)

---

## Prompt for Claude

You are a senior Laravel DevOps and frontend engineer working on a multi-tenant SaaS invoicing platform called "Facturation".

Your task is to complete **TASK 5: Infrastructure & Frontend Production Readiness** -- configure production infrastructure, optimize frontend asset loading, and set up CI/CD.

### Context

This is a Laravel 12 multi-tenant SaaS app with:
- Cache, queue, and session all using `database` driver -- not viable at scale
- 60+ JavaScript plugins loaded globally on every page (3-5s extra load time)
- Header partial: 500+ lines monolith, sidebar partial: 440 lines monolith
- No error monitoring (Sentry/Bugsnag)
- No CI/CD pipeline
- No healthcheck endpoint
- Email defaults to `log` driver
- File storage is local only
- No structured logging for production
- Vite for asset building with `vite-plugin-static-copy`

### What You Must Do

Complete ALL subtasks below. Verify each change works before moving on.
Do NOT add new features. Focus on production readiness only.

---

## Subtask Checklist

### 1. Configure Redis for cache, queue, and session

**Files:**
- `.env.example` -- update recommended production values
- `config/cache.php` -- verify Redis config exists
- `config/queue.php` -- verify Redis config exists
- `config/session.php` -- verify Redis config exists

1. Read each config file to confirm Redis connection details are properly configured.
2. Update `.env.example` to clearly show Redis as the production recommendation:
   ```env
   # Development (default)
   CACHE_STORE=database
   QUEUE_CONNECTION=database
   SESSION_DRIVER=database

   # Production (recommended)
   # CACHE_STORE=redis
   # QUEUE_CONNECTION=redis
   # SESSION_DRIVER=redis

   REDIS_CLIENT=phpredis
   REDIS_HOST=127.0.0.1
   REDIS_PASSWORD=null
   REDIS_PORT=6379
   ```
3. Verify `config/database.php` has proper Redis connection entries (it should from Laravel defaults).

### 2. Add healthcheck endpoint

**File:** `bootstrap/app.php` (already has `health: '/up'`)

1. Read `bootstrap/app.php` -- Laravel 12 already registers `/up` as health endpoint.
2. If `/up` exists, verify it works. If not, add it.
3. Create an enhanced healthcheck at `/health` that checks DB, cache, and queue connectivity:

**File to create:** `routes/api/health.php` or add to `routes/web.php`

```php
Route::get('/health', function () {
    $checks = [];

    // Database
    try {
        DB::connection()->getPdo();
        $checks['database'] = 'ok';
    } catch (\Exception $e) {
        $checks['database'] = 'error: ' . $e->getMessage();
    }

    // Cache
    try {
        Cache::put('health_check', true, 5);
        Cache::forget('health_check');
        $checks['cache'] = 'ok';
    } catch (\Exception $e) {
        $checks['cache'] = 'error: ' . $e->getMessage();
    }

    $allOk = collect($checks)->every(fn ($v) => $v === 'ok');

    return response()->json([
        'status' => $allOk ? 'healthy' : 'degraded',
        'checks' => $checks,
        'timestamp' => now()->toIso8601String(),
    ], $allOk ? 200 : 503);
})->name('health');
```

### 3. Configure error monitoring (Sentry)

**Steps:**
1. Add Sentry DSN placeholder to `.env.example`:
   ```env
   SENTRY_LARAVEL_DSN=
   SENTRY_TRACES_SAMPLE_RATE=0.1
   ```
2. Add `sentry/sentry-laravel` to `composer.json` require section (note: do NOT run composer install -- just add the line so the user knows what to install):
   ```
   "sentry/sentry-laravel": "^4.0"
   ```
3. Create `config/sentry.php` with basic configuration:
   ```php
   <?php
   return [
       'dsn' => env('SENTRY_LARAVEL_DSN'),
       'traces_sample_rate' => (float) env('SENTRY_TRACES_SAMPLE_RATE', 0.1),
       'send_default_pii' => false,
   ];
   ```
4. Add Sentry integration to `bootstrap/app.php` exception handler (guarded by DSN being set):
   ```php
   ->withExceptions(function (Exceptions $exceptions) {
       if (env('SENTRY_LARAVEL_DSN')) {
           $exceptions->reportable(function (\Throwable $e) {
               // Sentry will capture via its service provider
           });
       }
   })
   ```

**Note:** The actual Sentry package installation (`composer require sentry/sentry-laravel`) should be done by the user after this task. Just prepare the configuration.

### 4. Configure structured logging for production

**File:** `config/logging.php`

1. Read the existing logging config.
2. Add a `production` channel that outputs JSON-formatted logs:
   ```php
   'production' => [
       'driver' => 'single',
       'path' => storage_path('logs/laravel.log'),
       'level' => 'info',
       'formatter' => \Monolog\Formatter\JsonFormatter::class,
   ],
   ```
3. Update the `stack` channel to include `production` when `APP_ENV=production`:
   ```php
   'stack' => [
       'driver' => 'stack',
       'channels' => explode(',', env('LOG_CHANNELS', 'single')),
       'ignore_exceptions' => false,
   ],
   ```
4. Add to `.env.example`:
   ```env
   # For production: LOG_CHANNELS=production
   LOG_CHANNELS=single
   ```

### 5. Configure S3 filesystem for production

**File:** `config/filesystems.php`

1. Read the existing config -- S3 disk should already be defined by Laravel.
2. Update `.env.example` to include S3 configuration:
   ```env
   # File Storage (Production)
   # FILESYSTEM_DISK=s3
   # AWS_ACCESS_KEY_ID=
   # AWS_SECRET_ACCESS_KEY=
   # AWS_DEFAULT_REGION=eu-west-3
   # AWS_BUCKET=facturation-media
   # AWS_USE_PATH_STYLE_ENDPOINT=false
   ```
3. Verify `config/filesystems.php` has the `s3` disk configured.

### 6. Configure production email

**File:** `.env.example`

Add documented SMTP/SES configuration:
```env
# Email (Production)
# MAIL_MAILER=smtp
# MAIL_HOST=smtp.mailgun.org
# MAIL_PORT=587
# MAIL_USERNAME=
# MAIL_PASSWORD=
# MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@facturation.app"
MAIL_FROM_NAME="${APP_NAME}"
```

### 7. Split header.blade.php into sub-partials

**File:** `resources/views/backoffice/layout/partials/header.blade.php`

1. Read the entire header partial (500+ lines).
2. Identify logical sections (logo, breadcrumb, quick-add dropdown, notifications dropdown, user menu).
3. Extract each section into a separate partial file:
   - `resources/views/backoffice/layout/partials/header/logo.blade.php`
   - `resources/views/backoffice/layout/partials/header/breadcrumb.blade.php`
   - `resources/views/backoffice/layout/partials/header/quick-add.blade.php`
   - `resources/views/backoffice/layout/partials/header/notifications.blade.php`
   - `resources/views/backoffice/layout/partials/header/user-menu.blade.php`
4. Replace the extracted sections in `header.blade.php` with `@include` directives.
5. Verify the header still renders correctly by visually checking the app.

**Important:** Do NOT change any CSS classes, HTML structure, or JS behavior. Only split into files.

### 8. Split sidebar.blade.php into sub-partials

**File:** `resources/views/backoffice/layout/partials/sidebar.blade.php`

1. Read the entire sidebar partial (440 lines).
2. Identify the SuperAdmin menu section vs Tenant menu section (should be separated by an `@if` checking tenant_id).
3. Extract into:
   - `resources/views/backoffice/layout/partials/sidebar/superadmin-menu.blade.php`
   - `resources/views/backoffice/layout/partials/sidebar/tenant-menu.blade.php`
4. Replace in `sidebar.blade.php` with `@include` directives.

**Important:** Do NOT change any CSS classes, HTML structure, or JS behavior.

### 9. Implement conditional JavaScript loading

**File:** `resources/views/backoffice/layout/partials/footer-scripts.blade.php`

1. Read the current footer-scripts partial to see which plugins are loaded globally.
2. Identify plugins that should be page-specific:
   - Chart libraries (apexchart, chartjs) -- only on dashboard + reports
   - Calendar (fullcalendar) -- only if calendar page exists
   - DataTables -- keep global (used on most pages)
   - Date pickers (flatpickr) -- only on form pages
   - Rich text editors (summernote, quill) -- only on pages with notes/terms fields
3. Move page-specific plugins to `@stack('scripts')`:
   - In `footer-scripts.blade.php`, add `@stack('page-scripts')` at the end
   - In individual Blade views that need chart libraries, add:
     ```blade
     @push('page-scripts')
     <script src="{{ asset('plugins/apexchart/apexcharts.min.js') }}"></script>
     @endpush
     ```
4. Update the dashboard view (`resources/views/backoffice/dashboard.blade.php`) and report views to push their required chart scripts.
5. Update form views (create/edit) that use date pickers to push flatpickr.

**Important:** This is the highest-impact performance fix. Be careful not to break pages. If unsure whether a plugin is used on a page, leave it global.

### 10. Create CI/CD pipeline configuration

**File to create:** `.github/workflows/ci.yml`

```yaml
name: CI

on:
  push:
    branches: [main]
  pull_request:
    branches: [main]

jobs:
  test:
    runs-on: ubuntu-latest

    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_ROOT_PASSWORD: password
          MYSQL_DATABASE: facturation_test
        ports:
          - 3306:3306
        options: >-
          --health-cmd="mysqladmin ping"
          --health-interval=10s
          --health-timeout=5s
          --health-retries=3

    steps:
      - uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: pdo_mysql, mbstring, xml, bcmath, gd
          coverage: none

      - name: Install Composer dependencies
        run: composer install --no-progress --prefer-dist

      - name: Copy .env
        run: cp .env.example .env

      - name: Generate key
        run: php artisan key:generate

      - name: Run Pint (code style)
        run: vendor/bin/pint --test

      - name: Run Larastan (static analysis)
        run: vendor/bin/phpstan analyse --memory-limit=512M

      - name: Run tests
        run: php artisan test
        env:
          DB_CONNECTION: sqlite
          DB_DATABASE: ':memory:'

      - name: Build assets
        run: |
          npm ci
          npm run build
```

### 11. Document production deployment checklist

**File to create:** `DEPLOYMENT.md`

Create a concise production deployment checklist:
- Environment variables to set
- Database migration command
- Queue worker setup (Supervisor config)
- Scheduler setup (cron entry)
- Redis configuration
- S3 configuration
- Email configuration
- Sentry DSN
- Backup strategy (pg_dump or managed)
- SSL/TLS requirements

Keep it short and actionable -- not a tutorial, just a checklist.

---

## Audit Issues Covered by This Task

| # | Issue | Severity | Section |
|---|-------|----------|---------|
| 1 | Redis for cache/queue/session (database drivers not scalable) | CRITICAL | Performance > Scaling |
| 2 | All JS plugins loaded globally (60+ scripts) | HIGH | Frontend > JavaScript & CSS |
| 3 | No CI/CD pipeline | HIGH | Missing Pieces > High Priority |
| 4 | No error monitoring | CRITICAL | Missing Pieces > Critical |
| 5 | Massive header partial (500+ lines) | MEDIUM | Frontend > Blade Architecture |
| 6 | Massive sidebar partial (440 lines) | MEDIUM | Frontend > Blade Architecture |
| 7 | Email defaults to log driver | MEDIUM | Missing Pieces > High Priority |
| 8 | File storage local only | MEDIUM | Missing Pieces > High Priority |
| 9 | No healthcheck endpoint | MEDIUM | Missing Pieces > High Priority |
| 10 | No structured logging | MEDIUM | Missing Pieces > Critical |
| 11 | No backup strategy documented | MEDIUM | Missing Pieces > Critical |

---

## Definition of Done

- [ ] `.env.example` updated with Redis, S3, SMTP, Sentry, logging configs
- [ ] `/health` endpoint returns JSON with DB + cache check status
- [ ] `config/sentry.php` created with DSN placeholder
- [ ] `config/logging.php` has production JSON formatter channel
- [ ] `config/filesystems.php` S3 disk verified
- [ ] Header partial split into 5 sub-files, all pages render correctly
- [ ] Sidebar partial split into 2 sub-files (superadmin + tenant)
- [ ] `@stack('page-scripts')` added to footer-scripts
- [ ] Dashboard and report views push chart scripts via `@push`
- [ ] Form views push date picker scripts via `@push`
- [ ] `.github/workflows/ci.yml` created with lint + analyze + test + build
- [ ] `DEPLOYMENT.md` created with production checklist
- [ ] All existing tests pass: `php artisan test`
- [ ] Page load time visibly reduced on list pages (fewer scripts in network tab)

---

## Files Modified/Created

```
.env.example                                                     (MODIFIED - Redis, S3, SMTP, Sentry)
routes/web.php                                                   (add /health route)
config/sentry.php                                                (NEW)
config/logging.php                                               (MODIFIED - add production channel)
bootstrap/app.php                                                (MODIFIED - Sentry exception handler)
resources/views/backoffice/layout/partials/header.blade.php      (MODIFIED - replace with @includes)
resources/views/backoffice/layout/partials/header/logo.blade.php            (NEW)
resources/views/backoffice/layout/partials/header/breadcrumb.blade.php      (NEW)
resources/views/backoffice/layout/partials/header/quick-add.blade.php       (NEW)
resources/views/backoffice/layout/partials/header/notifications.blade.php   (NEW)
resources/views/backoffice/layout/partials/header/user-menu.blade.php       (NEW)
resources/views/backoffice/layout/partials/sidebar.blade.php     (MODIFIED - replace with @includes)
resources/views/backoffice/layout/partials/sidebar/superadmin-menu.blade.php (NEW)
resources/views/backoffice/layout/partials/sidebar/tenant-menu.blade.php     (NEW)
resources/views/backoffice/layout/partials/footer-scripts.blade.php          (MODIFIED - conditional loading)
resources/views/backoffice/dashboard.blade.php                   (MODIFIED - @push chart scripts)
resources/views/backoffice/reports/*.blade.php                   (MODIFIED - @push chart scripts)
.github/workflows/ci.yml                                         (NEW)
DEPLOYMENT.md                                                    (NEW)
```

---

## Risks & Dependencies

- **Redis must be installed** on the server before switching drivers. Document this, don't auto-switch.
- **Conditional JS loading** is the riskiest change. If a plugin is removed from global but a page depends on it, that page breaks silently. Test every page type (index, create, edit, show, dashboard, reports) after changes.
- **Splitting header/sidebar:** Pure refactoring -- no visual change should occur. If any `@include` path is wrong, the page breaks visibly.
- **Sentry:** Only prepare the config. The actual `composer require` is for the user to run.
- **CI/CD:** Uses SQLite in-memory for tests (fast), not the production DB. This is intentional.
- **Depends on Tasks 1-4:** All security fixes, DB indexes, tests, and refactoring should be done before deploying to production.
