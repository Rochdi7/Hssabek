# Authentication Quick Reference

## Facturation SaaS - Auth System Guide

---

## 🚀 Quick Start

### Login Flow

```
User → /backoffice/login
  ↓
LoginController::showLoginForm()
  ↓
displays: auth/login.blade.php
  ↓
User submits: email + password
  ↓
LoginController::login(LoginRequest)
  ↓
Checks: tenant exists? → tenant active? → credentials valid? → user in tenant?
  ↓
Logs to login_logs table
  ↓
On success → redirect to dashboard
On failure → return form with errors
```

---

## 📍 Route Structure

All auth routes are under `/backoffice/`:

```
/backoffice/login                               GET    Login form
/backoffice/login                               POST   Process login
/backoffice/logout                              POST   Logout
/backoffice/register                            GET    Registration form
/backoffice/register                            POST   Create account
/backoffice/forgot-password                     GET    Forgot form
/backoffice/forgot-password                     POST   Send reset email
/backoffice/reset-password/{token}              GET    Reset form
/backoffice/reset-password                      POST   Update password
/backoffice/email/verify                        GET    Verification notice
/backoffice/email/verify/{id}/{hash}            GET    Verify email
/backoffice/email/verification-notification    POST   Resend verification
/backoffice/lock-screen                         GET    Lock screen
/backoffice/two-step                            GET    2FA screen
```

---

## 🔒 Middleware Stack

All backoffice routes have:

```
web
  ↓
identifyTenant (resolve from domain)
  ↓
tenantActive (check status)
  ↓
setTenantContext (apply settings)
  ↓
guest OR auth (depending on route)
```

---

## 📝 Form Requests

### LoginRequest

```php
'email'     => 'required|string|email|max:190'
'password'  => 'required|string|min:6'
'remember'  => 'nullable|boolean'
```

### RegisterRequest

```php
'name'                   => 'required|string|max:120'
'email'                  => 'required|string|email|max:190|unique:users'
'password'               => 'required|string|confirmed|password_defaults'
'password_confirmation'  => 'required'
```

### ForgotPasswordRequest

```php
'email' => 'required|string|email|max:190|exists:users,email'
```

### ResetPasswordRequest

```php
'token'                  => 'required|string'
'email'                  => 'required|string|email|max:190'
'password'               => 'required|string|confirmed|password_defaults'
'password_confirmation'  => 'required'
```

---

## 🗂️ View Templates

All views are in `resources/views/auth/` and extend `backoffice.layout.mainlayout`

| View                      | Purpose             | Theme Source                    |
| ------------------------- | ------------------- | ------------------------------- |
| login.blade.php           | Login form          | login.blade.php                 |
| register.blade.php        | Registration form   | register.blade.php              |
| forgot-password.blade.php | Forgot form         | forgot-password.blade.php       |
| reset-password.blade.php  | Reset form          | reset-password.blade.php        |
| verify-email.blade.php    | Verification notice | email-verification.blade.php    |
| lock-screen.blade.php     | Lock screen         | custom                          |
| two-step.blade.php        | 2FA screen          | two-step-verification.blade.php |

---

## 🔑 Login Logging

**Table**: `login_logs`

**Recorded Events**:

1. **Success** — User logged in
2. **Failed** — Wrong password
3. **Blocked** — Tenant not found / Tenant inactive / User/tenant mismatch

**Fields Logged**:

- tenant_id
- user_id
- email
- ip
- user_agent
- status (success|failed|blocked)
- message (reason for failure)

**Query Example**:

```php
// Get today's login attempts
LoginLog::whereDate('created_at', today())->get();

// Failed logins for a tenant
LoginLog::where('tenant_id', $tenantId)
    ->where('status', 'failed')
    ->get();
```

---

## 👤 User Model Changes

**Implements**: `MustVerifyEmail` interface

**New Accessor**:

```php
$user->avatar_url  // Returns asset path
```

**Relationships**:

```php
$user->tenant()      // Tenant
$user->loginLogs()   // Login attempts
$user->invitations() // Invitations sent
```

---

## 🛡️ Multi-Tenant Validation

**Tenant Resolution** (in order):

1. Check `tenant_domains` table for exact domain match
2. Extract subdomain from hostname
3. Check `tenants` table for matching slug

**During Login**:

1. Resolve tenant from request host
2. Load user by email
3. Check user.tenant_id matches resolved tenant
4. If mismatch → log blocked, return error

**Never accept tenant_id from request input!**

---

## 🔐 Password Security

- Passwords hashed with **bcrypt** (Laravel default)
- Uses Laravel's **Password::defaults()** rules:
    - Minimum 8 characters
    - Requires uppercase letter
    - Requires numeric digit
    - Requires special character

---

## 📧 Email Features

### Password Reset Email

1. User submits forgot form
2. Laravel sends email with signed reset link
3. Link includes token + email
4. Link expires after 60 minutes (configurable in `config/password.php`)

### Verification Email

1. New user registers
2. Laravel sends email with signed verification link
3. Link includes user ID + hash
4. Clicking link marks email as verified

---

## ⚙️ Configuration

**Key Files**:

- `config/auth.php` — Guard/provider settings
- `config/password.php` — Reset link timeout
- `config/session.php` — Session timeout
- `.env` — SMTP settings

**SMTP Setup** (for emails):

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@facturation.local
MAIL_FROM_NAME="Facturation SaaS"
```

---

## 🧪 Testing Commands

```bash
# Run auth tests
php artisan test tests/Feature/Auth

# Run specific test
php artisan test tests/Feature/Auth/LoginTest

# Create test user
php artisan tinker
>>> $user = User::create([...])

# Check routes
php artisan route:list | grep auth

# Clear caches
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

---

## 🐛 Debugging

**Check Login Logs**:

```php
// Failed attempts
LoginLog::where('status', 'failed')->latest()->get();

// All attempts for tenant
LoginLog::where('tenant_id', $tenantId)->latest()->get();
```

**Check User Verification**:

```php
$user = User::find($userId);
$user->email_verified_at  // null = not verified, datetime = verified
```

**Check Session**:

```php
// In controller
Auth::check()                  // Is authenticated?
Auth::user()                   // Get current user
Auth::user()->tenant_id        // Get tenant
$request->attributes->get('tenant')  // Get tenant from request
```

---

## 🚨 Common Issues

### Login Fails - "User does not belong to this tenant"

**Cause**: User registered on different domain/tenant  
**Fix**: User must register on their own tenant domain

### Login Fails - "Tenant not found for this domain"

**Cause**: Domain not configured in tenant_domains table  
**Fix**: Add domain to tenant_domains via super admin

### Login Fails - "This tenant account is suspended"

**Cause**: Tenant status is not 'active'  
**Fix**: Update tenant status to 'active' in database

### Password reset email not received

**Cause**: SMTP settings not configured  
**Fix**: Check `.env` MAIL\_\* settings and test with `php artisan tinker`

### Verification email not received

**Cause**: User not implementing MustVerifyEmail  
**Fix**: Ensure User model implements `MustVerifyEmail` interface

---

## 📚 Related Documentation

- `AUTHENTICATION_IMPLEMENTATION.md` — Full implementation guide
- `AUTH_FILES_MANIFEST.md` — Complete file listing
- `UI_UX_TEMPLATE_REFERENCE.md` — Theme/template reference

---

## ✅ Verification Checklist

Before deploying:

- [ ] Database migrated (`php artisan migrate`)
- [ ] SMTP configured in `.env`
- [ ] Tenant domain added to `tenant_domains` table
- [ ] Test user created in database
- [ ] Login works with correct credentials
- [ ] Login fails gracefully with wrong credentials
- [ ] Password reset email sends
- [ ] Login logs recorded in database
- [ ] Tenant validation working
- [ ] Email verification flow works

---

**Last Updated**: February 27, 2026
