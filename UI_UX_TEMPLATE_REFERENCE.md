# UI/UX Template Reference Guide

## Facturation SaaS — Design System & Implementation Standards

**Document Version**: 1.0  
**Last Updated**: February 27, 2026  
**Status**: Active Design Reference

---

## Overview

This project contains a comprehensive collection of static Blade template pages (`resources/views/*.blade.php`) that represent the **EXACT UI/UX design system and theme** for the Facturation SaaS platform.

These template files are the **"Single Source of Truth"** for all visual design, layout patterns, component styling, spacing, typography, icons, and user interaction flows across the entire application.

**Key Principle**: When implementing any dynamic CRUD resource or module page, developers **MUST replicate the UI/UX from these template files exactly**, replacing only static dummy content with dynamic Blade variables and data loops. The HTML structure, CSS classes, component organization, and visual hierarchy must remain consistent with these reference templates.

---

## How to Use This Documentation

### For Developers Implementing Dynamic Pages

1. **Identify the Resource**: Determine which business domain and operation you're implementing (e.g., creating a Customer Edit form, Invoice List, etc.)

2. **Find the Reference Template**: Locate the closest matching static template file in the "Mapping" section below

3. **Copy the Structure**: Copy the Blade template file as the starting point for your dynamic implementation

4. **Inject Dynamic Data**: Replace static/dummy content with:
    - Blade variables and data expressions (`{{ }}`)
    - Loops for table rows and list items (`@foreach`, `@forelse`)
    - Form inputs with `old()` helper for validation persistence
    - Dynamic URLs via `route()` helper

5. **Preserve Design Integrity**: Keep all HTML structure, CSS classes, component hierarchy, and styling intact

6. **Refactor Progressively**: As you add dynamic functionality, consider extracting repeated HTML patterns into Blade partials (in `resources/views/partials/` or `resources/views/components/`), but only after confirming the structure matches the reference

### For UI/UX Designers

- Use these template files as the current design system specification
- All future templates should follow the same patterns, spacing, typography, and component library
- When proposing design changes, update the reference templates first
- Maintain consistency across all pages by reusing components

---

## Core Principles

### ✅ DO (Best Practices)

- **Keep the same HTML structure** — Don't reorganize divs or sections
- **Maintain CSS class names** — Classes drive styling and JS behavior
- **Reuse components** — Use the same card layouts, tables, forms, buttons, modals
- **Follow the theme assets** — Use the same CSS framework, icon library, color variables
- **Preserve spacing & alignment** — Padding, margins, and grid layout must be consistent
- **Keep responsive patterns** — Mobile breakpoints and media queries must work the same
- **Use existing color scheme** — Don't introduce new colors or CSS variables
- **Refactor into partials** — Share common UI patterns (headers, footers, filters, tables) across pages
- **Test on all breakpoints** — Ensure dynamic content respects mobile/tablet/desktop layouts

### ❌ DON'T (Anti-Patterns)

- **Don't redesign the UI** — The templates are the approved design; follow them
- **Don't change class names** — Even if they seem odd, they may be required for styling or JS
- **Don't replace layout wrappers** — Page containers, sidebars, and main content areas must stay the same
- **Don't introduce new CSS frameworks** — Stick with the existing system (Bootstrap, Tailwind, etc. as used in templates)
- **Don't add custom stylesheets** — Use inline styles only as last resort; prefer existing theme variables
- **Don't skip responsive design** — All dynamic content must work on mobile/tablet/desktop
- **Don't create new component types** — Extend existing components rather than inventing new ones
- **Don't modify template assets** — Icon libraries, fonts, and theme colors stay as-is
- **Don't ignore validation feedback** — Keep error/success message styling and placement

---

## Implementation Checklist

When implementing a CRUD resource (index, create, edit, show views):

### Pre-Implementation

- [ ]   1. Choose the closest reference template file(s) from the mapping below
- [ ]   2. Review the template's HTML structure and class organization
- [ ]   3. Identify static content that will become dynamic data
- [ ]   4. Note any form fields, tables, buttons, or modals to be adapted

### During Implementation

- [ ]   5. Keep UI wrapper elements (page container, header, sidebar) unchanged
- [ ]   6. Replace dummy table rows with `@foreach` loops over model collections
- [ ]   7. Replace form input values with `old()` helper and model data
- [ ]   8. Maintain validation feedback UI (error classes, success messages, validation icons)
- [ ]   9. Keep action dropdown UI and menu structure
- [ ]   10. Keep pagination UI and query string parameter structure

### Post-Implementation

- [ ]   11. Keep empty-state UI for when no data is available (`@forelse`, `@empty`)
- [ ]   12. Verify responsiveness on mobile/tablet/desktop viewports
- [ ]   13. Ensure no CSS changes were made; use only theme classes
- [ ]   14. Test form validation feedback styling
- [ ]   15. Verify accessibility (color contrast, keyboard navigation, alt text)

---

## Template Mapping by Domain

This section groups all reference template files by business domain and feature area. Use this to quickly find the template that matches your implementation task.

---

### 📊 DASHBOARD & OVERVIEW

**Admin/System Dashboard**

- `admin-dashboard.blade.php` — Main SaaS admin dashboard with KPIs, charts, and metrics
- `super-admin-dashboard.blade.php` — Super admin panel for multi-tenant SaaS operations
- `customer-dashboard.blade.php` — Customer-facing dashboard with personal summary
- `starter.blade.php` — Starter/landing dashboard for new users

**Reports & Analytics**

- `annual-report.blade.php` — Yearly financial and business overview report
- `balance-sheet.blade.php` — Accounting balance sheet report
- `cash-flow.blade.php` — Cash flow analysis and projection report
- `expense-report.blade.php` — Expense tracking and categorization report
- `income-report.blade.php` — Income/revenue tracking report
- `inventory-report.blade.php` — Stock levels, movements, and valuation report
- `profit-loss-report.blade.php` — P&L statement (Income Statement)
- `purchase-order-report.blade.php` — Purchase order analysis and trends
- `purchase-orders-report.blade.php` — Aggregated purchase orders report
- `purchase-return-report.blade.php` — Purchase returns tracking
- `purchases-report.blade.php` — Comprehensive purchases analysis
- `quotation-report.blade.php` — Quotation pipeline and conversion metrics
- `sales-report.blade.php` — Sales performance and revenue tracking
- `supplier-report.blade.php` — Supplier performance and analysis
- `tax-report.blade.php` — Tax liabilities and compliance reporting
- `trial-balance.blade.php` — Accounting trial balance report
- `customer-due-report.blade.php` — Customer outstanding payment report
- `customer-invoice-report.blade.php` — Customer invoice history and metrics
- `customers-report.blade.php` — Customer demographics and activity report

---

### 💰 SALES & INVOICING

**Invoices**

- `invoices.blade.php` — Invoice list with filters, search, bulk actions
- `add-invoice.blade.php` — Create new invoice form
- `edit-invoice.blade.php` — Edit existing invoice form
- `invoice.blade.php` — Invoice detail/preview page
- `invoice-details.blade.php` — Detailed invoice view with line items
- `invoice-settings.blade.php` — Invoice configuration and defaults
- `invoice-templates-settings.blade.php` — Invoice template customization
- `invoice-templates.blade.php` — Template library and management
- `recurring-invoices.blade.php` — Recurring invoice list and scheduling
- `customer-invoice-details.blade.php` — Customer-facing invoice detail view
- `customer-invoices.blade.php` — Customer's invoice history

**Invoice Variants (Special Industry Templates)**

- `general-invoice-1.blade.php` through `general-invoice-10.blade.php` — General business invoice templates (10 variants)
- `general-invoice-1a.blade.php`, `general-invoice-2a.blade.php` — Invoice template alternatives
- `bus-booking-invoice.blade.php` — Bus booking/transportation invoice
- `car-booking-invoice.blade.php` — Car rental/booking invoice
- `coffee-shop-invoice.blade.php` — Retail/coffee shop receipt invoice
- `domain-hosting-invoice.blade.php` — SaaS/hosting service invoice
- `ecommerce-invoice.blade.php` — E-commerce/retail invoice
- `fitness-center-invoice.blade.php` — Fitness/membership invoice
- `flight-booking-invoice.blade.php` — Flight booking invoice
- `hotel-booking-invoice.blade.php` — Hotel reservation invoice
- `internet-billing-invoice.blade.php` — Internet service provider invoice
- `invoice-medical.blade.php` — Medical/healthcare invoice
- `money-exchange-invoice.blade.php` — Currency exchange invoice
- `movie-ticket-booking-invoice.blade.php` — Entertainment ticket invoice
- `receipt-invoice-1.blade.php` through `receipt-invoice-4.blade.php` — Receipt-style invoices (4 variants)
- `restaurants-invoice.blade.php` — Restaurant POS receipt invoice
- `student-billing-invoice.blade.php` — Educational institution billing invoice
- `train-ticket-invoice.blade.php` — Train ticket/booking invoice

**Quotations**

- `quotations.blade.php` — Quotation list with status, amounts, dates
- `add-quotation.blade.php` — Create new quotation form
- `edit-quotation.blade.php` — Edit existing quotation form
- `customer-add-quotation.blade.php` — Customer creates quotation request
- `customer-quotations.blade.php` — Customer's quotation history

**Credit Notes & Refunds**

- `credit-notes.blade.php` — Credit note list with filters and actions
- `add-credit-notes.blade.php` — Create new credit note
- `edit-credit-notes.blade.php` — Edit credit note
- `sales-returns.blade.php` — Sales return tracking

**Delivery Challans**

- `delivery-challans.blade.php` — Delivery challan list
- `add-delivery-challan.blade.php` — Create delivery challan
- `edit-delivery-challan.blade.php` — Edit delivery challan

**Payments & Transactions**

- `payments.blade.php` — Payment record list
- `payment-methods.blade.php` — Payment method configuration
- `payment-summary.blade.php` — Payment summary and status
- `customer-payment-summary.blade.php` — Customer payment overview
- `customer-transactions.blade.php` — Customer transaction history
- `transactions.blade.php` — All transaction log
- `money-transfer.blade.php` — Bank transfer/money movement
- `sales-orders.blade.php` — Sales order management

---

### 🛒 PURCHASES & VENDOR MANAGEMENT

**Purchase Orders**

- `purchase-orders.blade.php` — Purchase order list with status and amounts
- `add-purchases-orders.blade.php` — Create new purchase order
- `edit-purchases-orders.blade.php` — Edit purchase order
- `purchase-transaction.blade.php` — Purchase transaction detail
- `purchase-order-report.blade.php` — PO analysis and reporting

**Vendor Bills & Payments**

- `purchases.blade.php` — Vendor bill/purchase receipt list
- `add-purchases.blade.php` — Create new vendor bill/purchase
- `edit-purchases.blade.php` — Edit vendor bill
- `supplier-payments.blade.php` — Supplier payment records and history

**Debit Notes**

- `debit-notes.blade.php` — Debit note list
- `add-debit-notes.blade.php` — Create debit note
- `edit-debit-notes.blade.php` — Edit debit note

**Suppliers**

- `suppliers.blade.php` — Supplier list with contact and rating info
- `add-customer.blade.php` — Add new supplier (reuses customer form pattern)
- `edit-customer.blade.php` — Edit supplier details
- `supplier-report.blade.php` — Supplier performance analytics

---

### 📦 INVENTORY & WAREHOUSE

**Inventory Management**

- `inventory.blade.php` — Inventory list with quantities and locations
- `inventory-report.blade.php` — Inventory analysis and valuation
- `low-stock.blade.php` — Low stock alerts and replenishment list
- `sold-stock.blade.php` — Sold stock history and trending
- `stock-summary.blade.php` — Summary of stock by warehouse
- `stock-history.blade.php` — Stock movement audit log

**Products**

- `products.blade.php` — Product catalog list with categories and pricing
- `add-product.blade.php` — Create new product
- `edit-product.blade.php` — Edit product details
- `category.blade.php` — Product category list and hierarchy
- `units.blade.php` — Measurement units (kg, liters, pieces, etc.)

---

### 💳 FINANCE & ACCOUNTING

**Bank Accounts & Currency**

- `bank-accounts.blade.php` — Bank account list with balances
- `bank-accounts-settings.blade.php` — Bank account configuration
- `bank-accounts-type.blade.php` — Bank account type definitions
- `currencies.blade.php` — Currency master data (codes, symbols, precision)

**Expenses & Incomes**

- `expenses.blade.php` — Expense tracking and categorization
- `incomes.blade.php` — Income/revenue records

**Financial Reports**

- `cash-flow.blade.php` — Cash position and flow analysis
- `balance-sheet.blade.php` — Balance sheet statement
- `profit-loss-report.blade.php` — P&L income statement
- `trial-balance.blade.php` — Accounting trial balance
- `tax-report.blade.php` — Tax liability summary

---

### 👥 CRM & CUSTOMER MANAGEMENT

**Customers**

- `customers.blade.php` — Customer list with contact info and metrics
- `add-customer.blade.php` — Create new customer
- `edit-customer.blade.php` — Edit customer details
- `customer-details.blade.php` — Customer profile and overview
- `customer-invoice-details.blade.php` — Customer's individual invoice
- `customer-invoices.blade.php` — Customer's invoice history
- `customer-payment-summary.blade.php` — Customer payment status
- `customer-quotations.blade.php` — Customer's quotation list
- `customer-recurring-invoices.blade.php` — Customer's recurring invoices
- `customer-transactions.blade.php` — Customer transaction history
- `customers-report.blade.php` — Customer analytics and segmentation

**Contacts**

- `contacts.blade.php` — Contact list (general contacts/leads)
- `contact-messages.blade.php` — Contact form messages and inquiries

---

### ⚙️ SETTINGS & CONFIGURATION

**Account & Company Settings**

- `account-settings.blade.php` — User account profile and preferences
- `company-settings.blade.php` — Company information and branding
- `customer-account-settings.blade.php` — Customer portal account settings
- `delete-account-request.blade.php` — Account deletion workflow

**System Settings**

- `appearance-settings.blade.php` — Theme, colors, logo, branding
- `authentication-settings.blade.php` — Login, password, 2FA, SSO options
- `security-settings.blade.php` — Password policy, IP whitelist, session management
- `email-settings.blade.php` — SMTP, email templates, notifications
- `sms-gateways.blade.php` — SMS provider configuration
- `integrations-settings.blade.php` — Third-party service connections
- `localization-settings.blade.php` — Language, timezone, number/date formats
- `language-settings.blade.php`, `language-setting2.blade.php`, `language-setting3.blade.php` — Multilingual configuration
- `preference-settings.blade.php` — User preferences and defaults
- `notification-settings.blade.php` — Alert and notification preferences
- `customer-notification-settings.blade.php` — Customer notification preferences

**Invoice & Document Configuration**

- `invoice-settings.blade.php` — Invoice defaults and numbering
- `invoice-templates-settings.blade.php` — Template selection and customization
- `barcode-settings.blade.php` — Barcode generation and printing options
- `thermal-printer.blade.php` — Thermal printer configuration
- `prefixes-settings.blade.php` — Document number prefix settings

**Data & Administration**

- `tax-rates.blade.php` — Tax rate master data
- `custom-fields.blade.php` — Custom field definitions
- `custom-css.blade.php` — Custom CSS overrides
- `custom-js.blade.php` — Custom JavaScript injection
- `seo-setup.blade.php` — SEO configuration and meta tags
- `sitemap.blade.php` — Sitemap generation and management
- `clear-cache.blade.php` — Application cache management
- `system-backup.blade.php` — Database and file backup management
- `system-update.blade.php` — Software version and updates
- `database-backup.blade.php` — Database-specific backup options
- `maintenance-mode.blade.php` — Maintenance mode configuration
- `plugin-manager.blade.php` — Plugin/extension management
- `gdpr-cookies.blade.php` — GDPR compliance and cookie consent

**Advanced Configuration**

- `ai-configuration.blade.php` — AI features and LLM settings
- `api-keys.blade.php` — API key generation and management
- `sass-settings.blade.php` — SaaS-specific multi-tenant settings
- `permission.blade.php` — Permission management
- `roles-permissions.blade.php` — Role and permission assignment

**Plans & Billing**

- `plans-billings.blade.php` — Billing plan list and pricing
- `membership-plans.blade.php` — Membership tier definitions
- `membership-addons.blade.php` — Add-on products and pricing
- `membership-transactions.blade.php` — Transaction history for memberships
- `subscriptions.blade.php` — Customer subscription management
- `pricing.blade.php` — Public pricing page

---

### 🔐 AUTHENTICATION & USER MANAGEMENT

**Authentication Pages**

- `login.blade.php` — Login form
- `register.blade.php` — User registration form
- `forgot-password.blade.php` — Password reset request
- `reset-password.blade.php` — Password reset confirmation
- `email-verification.blade.php` — Email verification flow
- `two-step-verification.blade.php` — Two-factor authentication setup
- `lock-screen.blade.php` — Screen lock/session timeout page

**User Management**

- `users.blade.php` — User list and directory
- `profile.blade.php` — User profile page
- `customer-account-settings.blade.php` — Customer profile settings
- `customer-security-settings.blade.php` — Customer security preferences
- `customer-plans-settings.blade.php` — Customer plan/subscription settings

---

### 📱 COMMUNICATION & NOTIFICATIONS

**Email & Messages**

- `email.blade.php` — Email inbox list
- `email-reply.blade.php` — Email reply/compose
- `email-templates.blade.php` — Email template management
- `contact-messages.blade.php` — Contact form submission messages

**Notifications**

- `notifications.blade.php` — Notification center and history
- `notifications-settings.blade.php` — Notification preferences
- `customer-notification-settings.blade.php` — Customer notifications

**Communication**

- `chat.blade.php` — Chat/messaging interface
- `call-history.blade.php` — Phone call log
- `incoming-call.blade.php` — Incoming call interface
- `outgoing-call.blade.php` — Outgoing call interface
- `video-call.blade.php` — Video call interface
- `voice-call.blade.php` — Voice call interface

---

### 📊 BLOGS & CONTENT MANAGEMENT

**Blogs**

- `blogs.blade.php` — Blog post list
- `add-blog.blade.php` — Create new blog post
- `edit-blog.blade.php` — Edit blog post
- `blog-details.blade.php` — Blog post detail view
- `blog-categories.blade.php` — Blog category management
- `blog-tags.blade.php` — Blog tag management
- `blog-comments.blade.php` — Blog comment moderation

**CMS Pages**

- `pages.blade.php` — CMS page list
- `faq.blade.php` — FAQ page
- `privacy-policy.blade.php` — Privacy policy page
- `terms-condition.blade.php` — Terms & conditions page

---

### 🎫 PROJECT & TASK MANAGEMENT

**Tickets & Issues**

- `tickets.blade.php` — Ticket list view
- `tickets-list.blade.php` — Alternative ticket list
- `ticket-details.blade.php` — Ticket detail and comments
- `ticket-kanban.blade.php` — Kanban view of tickets
- `kanban-view.blade.php` — Alternative kanban board

**Tasks & Todo**

- `todo.blade.php` — Todo list management
- `todo-list.blade.php` — Alternative todo view
- `calendar.blade.php` — Calendar/event scheduling

**Timeline & Notes**

- `timeline.blade.php` — Activity timeline
- `notes.blade.php` — Notes and documentation

---

### 📈 CHARTS, VISUALIZATIONS & DATA

**Charts**

- `chart-apex.blade.php` — ApexCharts examples
- `chart-c3.blade.php` — C3.js chart examples
- `chart-flot.blade.php` — Flot chart examples
- `chart-js.blade.php` — Chart.js examples
- `chart-morris.blade.php` — Morris.js chart examples
- `chart-peity.blade.php` — Peity.js chart examples

**Maps**

- `maps-leaflet.blade.php` — Leaflet map integration
- `maps-vector.blade.php` — Vector map visualization

**Data Tables & Lists**

- `data-tables.blade.php` — Advanced data table with sorting/filtering
- `tables-basic.blade.php` — Basic HTML table examples
- `search-list.blade.php` — Search result list

---

### 🛠️ UI COMPONENTS & DESIGN KIT

**Basic UI Elements**

- `ui-buttons.blade.php` — Button styles and states
- `ui-buttons-group.blade.php` — Button groups and toolbars
- `ui-cards.blade.php` — Card component library
- `ui-alerts.blade.php` — Alert/notification components
- `ui-badges.blade.php` — Badge styles
- `ui-avatars.blade.php` — Avatar components
- `ui-breadcrumb.blade.php` — Breadcrumb navigation
- `ui-pagination.blade.php` — Pagination controls
- `ui-list-group.blade.php` — List group component

**Typography & Content**

- `ui-typography.blade.php` — Font sizes, weights, line heights
- `ui-colors.blade.php` — Color palette reference
- `ui-links.blade.php` — Link styles and states
- `ui-images.blade.php` — Image handling and responsive images

**Form Elements**

- `form-basic-inputs.blade.php` — Input field types (text, email, etc.)
- `form-floating-labels.blade.php` — Floating label inputs
- `form-input-groups.blade.php` — Input groups with icons/addons
- `form-checkbox-radios.blade.php` — Checkbox and radio options
- `form-select2.blade.php` — Select2 dropdown integration
- `form-elements.blade.php` — Complete form element showcase
- `form-validation.blade.php` — Form validation display
- `form-mask.blade.php` — Input masking (phone, SSN, etc.)
- `form-pickers.blade.php` — Date/time pickers
- `form-range-slider.blade.php` — Range slider component
- `form-editors.blade.php` — Rich text editors
- `form-fileupload.blade.php` — File upload component
- `form-grid-gutters.blade.php` — Form grid layout options
- `form-horizontal.blade.php` — Horizontal form layout
- `form-vertical.blade.php` — Vertical form layout
- `form-wizard.blade.php` — Multi-step form wizard

**Navigation & Layout**

- `ui-nav-tabs.blade.php` — Tab navigation component
- `ui-dropdowns.blade.php` — Dropdown menu patterns
- `ui-offcanvas.blade.php` — Offcanvas/sidebar menu
- `ui-modals.blade.php` — Modal dialog boxes
- `ui-collapse.blade.php` — Collapsible accordion
- `ui-accordion.blade.php` — Accordion component

**Interactive & Advanced**

- `ui-tooltips.blade.php` — Tooltip hover text
- `ui-popovers.blade.php` — Popover information boxes
- `ui-notifications.blade.php` — Toast notifications
- `ui-toasts.blade.php` — Toast message component
- `ui-sweetalerts.blade.php` — SweetAlert dialog styling
- `ui-carousel.blade.php` — Image carousel/slider
- `ui-lightbox.blade.php` — Lightbox image gallery
- `ui-grid.blade.php` — CSS grid layout patterns
- `ui-utilities.blade.php` — Utility classes reference
- `ui-counter.blade.php` — Counter animation
- `ui-rating.blade.php` — Star rating component
- `ui-progress.blade.php` — Progress bar variations
- `ui-spinner.blade.php` — Loading spinner styles
- `ui-sortable.blade.php` — Sortable list interface
- `ui-scrollbar.blade.php` — Custom scrollbar styling
- `ui-scrollspy.blade.php` — Scrollspy navigation
- `ui-ratio.blade.php` — Aspect ratio boxes
- `ui-placeholders.blade.php` — Placeholder skeleton loaders
- `ui-clipboard.blade.php` — Copy-to-clipboard component

**Icon Libraries**

- `icon-bootstrap.blade.php` — Bootstrap Icons
- `icon-feather.blade.php` — Feather Icons
- `icon-flag.blade.php` — Flag icons
- `icon-fontawesome.blade.php` — Font Awesome icons
- `icon-ionic.blade.php` — Ionic icons
- `icon-material.blade.php` — Material Design icons
- `icon-pe7.blade.php` — PE7 icons
- `icon-remix.blade.php` — Remix icons
- `icon-simpleline.blade.php` — Simple Line icons
- `icon-tabler.blade.php` — Tabler icons
- `icon-themify.blade.php` — Themify icons
- `icon-typicon.blade.php` — Typicon icons
- `icon-weather.blade.php` — Weather icons

---

### 📚 MISCELLANEOUS & SPECIAL PAGES

**Admin & Settings**

- `coming-soon.blade.php` — Coming soon splash page
- `under-construction.blade.php` — Under construction notice
- `under-maintenance.blade.php` — Maintenance mode page
- `error-404.blade.php` — 404 not found error page
- `error-500.blade.php` — 500 server error page
- `success.blade.php` — Success confirmation page
- `free-trial.blade.php` — Free trial signup/offer page

**Layout Variations**

- `layout-default.blade.php` — Default page layout template
- `layout-dark.blade.php` — Dark mode theme layout
- `layout-mini.blade.php` — Compact/minimal layout
- `layout-rtl.blade.php` — Right-to-left language layout
- `layout-single.blade.php` — Single column layout (no sidebar)
- `layout-transparent.blade.php` — Transparent header layout
- `layout-without-header.blade.php` — Minimal layout without header

**Public Pages**

- `index.blade.php` — Homepage/landing page
- `packages.blade.php` — Pricing/packages page
- `packages-grid.blade.php` — Packages in grid layout
- `gallery.blade.php` — Image/portfolio gallery
- `testimonials.blade.php` — Customer testimonials
- `social-feed.blade.php` — Social media feed

**Extended Components**

- `extended-dragula.blade.php` — Drag-and-drop interface

**Administrative Tools**

- `cronjob.blade.php` — Cron job scheduling interface
- `file-manager.blade.php` — File browser and management
- `storage.blade.php` — Storage usage and management
- `subscribers.blade.php` — Subscriber list management

**Geographic Data**

- `countries.blade.php` — Country list and management
- `states.blade.php` — State/province management
- `cities.blade.php` — City management
- `domain.blade.php` — Domain/tenant management

**E-Signature & Compliance**

- `esignatures.blade.php` — E-signature capture and management

---

## Key Design Elements to Preserve

When implementing dynamic pages from these templates, ensure you maintain:

### HTML Structure

- Page wrapper divs and container elements
- Header and navigation sections
- Sidebar and main content area
- Footer sections
- Modal and popover structures

### CSS Classes

- Bootstrap/Tailwind utility classes
- Custom theme classes
- State classes (`.active`, `.disabled`, `.error`)
- Responsive classes (`.d-none`, `.d-md-block`, etc.)

### Components

- Card components and variants
- Table structures with thead/tbody
- Form groups and input wrappers
- Button styles and states
- Alert/notification patterns
- Badge and label components
- Dropdown menus
- Tab navigation
- Pagination controls

### Styling System

- Color variables and theme colors
- Font family and sizing
- Spacing (padding/margin) scale
- Box shadows and borders
- Border radius values
- Transition/animation timing

### Icons

- Icon library (Font Awesome, Bootstrap Icons, Tabler, etc.)
- Icon sizing conventions
- Icon placement and spacing with text

### Responsive Breakpoints

- Mobile-first mobile layout
- Tablet breakpoints (768px typical)
- Desktop breakpoints (1024px+)
- Media query usage

---

## Best Practices for Template Implementation

### ✨ Quality Checklist

**Before Submitting Dynamic Implementation:**

1. **Compare Side-by-Side**
    - Open the reference template and your implementation in split view
    - Verify every HTML element matches (structure is identical)
    - Confirm all CSS classes are preserved

2. **Cross-Browser Testing**
    - Test on Chrome, Firefox, Safari, Edge
    - Verify on mobile Safari (iOS) and Chrome Mobile (Android)
    - Check responsive design breakpoints

3. **Functionality Testing**
    - Test form validation with errors
    - Test pagination with multiple pages
    - Test filters and search
    - Test sorting if applicable
    - Test empty states (no results)

4. **Accessibility**
    - Verify keyboard navigation works
    - Confirm color contrast meets WCAG standards
    - Test with screen reader
    - Verify form labels are associated with inputs

5. **Performance**
    - Verify page load time is reasonable
    - Check for unused CSS/JS
    - Confirm images are optimized
    - Test with slow 3G network simulation

6. **Validation**
    - Run Laravel/Blade syntax checker
    - Verify no typos in Blade directives
    - Confirm all variables are passed from controller
    - Test error conditions and edge cases

---

## Migration Guide: From Static to Dynamic

### Phase 1: Copy Template

```
1. Identify reference template (e.g., customers.blade.php)
2. Copy entire file to your new implementation location
3. Keep filename matching: customers/index.blade.php
```

### Phase 2: Replace Content Sections

```
1. Replace hardcoded table rows with @foreach loop
2. Replace form input values with old() or $model->field
3. Replace action URLs with route() helper
4. Replace pagination with $collection->links()
```

### Phase 3: Add Dynamic Data Binding

```
1. Pass data from controller: view('customers.index', ['customers' => $customers])
2. Bind form data: value="{{ old('name') ?? $customer->name }}"
3. Bind URLs: href="{{ route('customer.edit', $customer) }}"
4. Bind conditions: @if($customer->is_active)
```

### Phase 4: Test & Validate

```
1. Verify rendering with live data
2. Test form submissions and validation
3. Test all interactive elements
4. Verify responsive design
5. Test on all target browsers
```

---

## Component Reference Quick Links

### Common Blade Patterns Used

**Data Loop (Table Rows)**

```blade
@forelse($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
    </tr>
@empty
    <tr><td colspan="100%">No items found</td></tr>
@endforelse
```

**Form Input with Validation**

```blade
<div class="form-group">
    <label for="name">Name</label>
    <input
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        name="name"
        value="{{ old('name') ?? $model->name }}"
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

**Pagination**

```blade
<div class="d-flex justify-content-between align-items-center">
    <span>Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }}</span>
    {{ $items->links() }}
</div>
```

**Action Dropdown**

```blade
<div class="dropdown">
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">Actions</button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('item.edit', $item) }}">Edit</a>
        <a class="dropdown-item" href="{{ route('item.show', $item) }}">View</a>
        <form method="POST" action="{{ route('item.destroy', $item) }}" style="display:inline;">
            @csrf @method('DELETE')
            <button class="dropdown-item" type="submit">Delete</button>
        </form>
    </div>
</div>
```

---

## Contributing New Templates

If you create new design patterns or templates that should become part of the system:

1. **Document the Purpose** — What business need does it serve?
2. **Ensure Consistency** — Use existing color palette, components, spacing
3. **Test Responsiveness** — Verify on mobile/tablet/desktop
4. **Get Approval** — Have UI/UX team review before committing
5. **Update This Guide** — Add to appropriate mapping section
6. **Create Reference** — Mark as static template for future implementation reference

---

## Troubleshooting & Common Issues

### Issue: Dynamic content doesn't match template styling

- **Solution**: Verify CSS classes are identical; check for typos in class names

### Issue: Form validation feedback not showing

- **Solution**: Confirm `@error` directive is used; verify input has `.is-invalid` class

### Issue: Responsive layout breaks on mobile

- **Solution**: Check for responsive utility classes; test with browser DevTools

### Issue: Pagination is missing or incorrect

- **Solution**: Verify `->paginate()` called on query; confirm `{{ $items->links() }}` in template

### Issue: Dropdown menus not working

- **Solution**: Confirm JavaScript includes (Bootstrap JS, Popper); check for namespace conflicts

### Issue: Icons not displaying

- **Solution**: Verify icon library CSS is loaded; check icon class names match library

---

## Summary

The template files in `resources/views/` represent the **approved design system** for Facturation SaaS. When implementing dynamic pages:

✅ **DO**: Copy templates → Inject dynamic data → Test thoroughly  
❌ **DON'T**: Redesign UI → Change CSS → Create new patterns

Follow the implementation checklist, preserve all HTML structure and CSS classes, and refer to the mapping when selecting your reference template. When in doubt, match the closest static template exactly.

**Questions?** Contact the UI/UX team or refer to this guide's sections.

---

**End of UI/UX Template Reference**
