# Frontoffice Documentation

## Overview

The frontoffice is the public-facing website — accessible without authentication.
It is separate from the backoffice (tenant area) and the superadmin panel.

---

## Routes

**File:** `routes/frontoffice.php`

| Route | Controller | View | Purpose |
|-------|-----------|------|---------|
| `GET /` | (inline or dedicated) | home or landing page | Main landing page |
| `GET /blog` | `BlogController@index` | `frontoffice/blog.blade.php` | Blog post list |
| `GET /blog/{slug}` | `BlogController@show` | `frontoffice/blog-single.blade.php` | Single blog post |
| `GET /contact` | `Web/ContactController@show` | contact form | Contact page |
| `POST /contact` | `Web/ContactController@submit` | — | Submit contact form |
| `POST /newsletter` | `Web/NewsletterController@subscribe` | — | Newsletter signup |
| `GET /account-request` | `Web/AccountRequestController@show` | account request form | New tenant signup form |
| `POST /account-request` | `Web/AccountRequestController@submit` | — | Submit new tenant request |
| `GET /invoice/{token}` | `PublicDocumentController@invoice` | public invoice view | Share invoice link |
| `GET /document/{token}/pdf` | `PublicDocumentController@pdf` | — | Download document PDF |

---

## Public Document Sharing

Invoices and quotes have a `public_token` (UUID) column.
This allows sharing a link with customers who do not need an account:

```
https://yourdomain.com/invoice/550e8400-e29b-41d4-a716-446655440000
```

- No authentication required
- Token is a random UUID — not guessable
- Displays invoice details in a clean print-friendly view
- Download PDF button available

---

## Localization

- **Default locale:** `fr` (French)
- Arabic (`ar`) RTL versions exist for auth pages: `resources/views/ar/auth/`
- Frontoffice locale set by `SetFrontofficeLocale` middleware

---

## Views

```
resources/views/
├── frontoffice/
│   ├── blog.blade.php           ← Blog list page
│   └── blog-single.blade.php   ← Single blog post
├── auth/                        ← Login, register, password reset
│   ├── login.blade.php
│   ├── register.blade.php
│   ├── forgot-password.blade.php
│   └── reset-password.blade.php
└── ar/auth/                     ← Arabic RTL versions of auth pages
```

---

## Blog System

- Posts are managed by SuperAdmin via `BlogPostController`
- Published posts appear on the frontoffice `/blog` route
- Posts have `slug`, `title`, `content`, `featured_image`, `published_at`
- Categories managed via `BlogCategoryController`

---

## Contact Form

- Submissions stored in `contact_messages` table
- SuperAdmin can view all submissions at `sa.contact-messages.index`
- Rate limited: 5 submissions per IP per hour (see AppServiceProvider)

---

## Account Request (New Tenant Signup)

When registration is invite-only or approval-required:
1. Visitor fills in `AccountRequest` form (company name, email, phone)
2. Stored in `account_requests` table
3. SuperAdmin reviews and approves/rejects at `sa.account-requests.index`
4. On approval: tenant is created, invitation email sent

**Form Request:** `app/Http/Requests/Web/AccountRequestFormRequest.php`

---

## Assets

The frontoffice may share assets with the backoffice or have separate CSS/JS.
Check `public/` and `resources/` for frontoffice-specific files.

---

## SEO / Meta

Page titles and meta descriptions are managed via:
```blade
@include('backoffice.components.title-meta', ['title' => 'Page Title'])
```

Or inline in frontoffice templates.
