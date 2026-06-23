# Controllers Documentation

Controllers live in `app/Http/Controllers/` organized into four namespaces.

---

## Auth Controllers — `app/Http/Controllers/Auth/`

| Controller | Route | Purpose |
|-----------|-------|---------|
| `LoginController` | `GET/POST /login` | Multi-tenant login: find user by email, verify tenant active, set TenantContext |
| `RegisterController` | `GET/POST /register` | Tenant-scoped registration |
| `LogoutController` | `POST /logout` | Session destroy, redirect to login |
| `EmailVerificationController` | `/email/verify` | Email confirmation flow |
| `ForgotPasswordController` | `/forgot-password` | Send password reset link |
| `ResetPasswordController` | `/reset-password/{token}` | Apply new password |

### Login Flow (Important)
1. Find user by email (global search across tenants)
2. Verify tenant is active
3. Validate credentials
4. Check user status = `active`
5. Set TenantContext for tenant users
6. Update `last_login_at` + `last_login_ip`
7. Create LoginLog entry
8. Redirect: super_admin → `sa.dashboard`, tenant user → `bo.dashboard`

---

## Backoffice Controllers — `app/Http/Controllers/Backoffice/`

### Dashboard
- `DashboardController` — aggregates KPIs, recent activity, charts data

### CRM — `Backoffice/CRM/`
| Controller | Resource |
|-----------|---------|
| `CustomerController` | Full CRUD — index, create, store, show, edit, update, destroy |
| `CustomerAddressController` | store, update, destroy (nested under customer) |
| `CustomerContactController` | store, update, destroy (nested under customer) |

**Pattern:** `assertSameTenant()` helper on show/edit/update/destroy to prevent cross-tenant access.

### Sales — `Backoffice/Sales/`
| Controller | Resource |
|-----------|---------|
| `InvoiceController` | Full CRUD + send email, mark paid, generate PDF, convert from quote |
| `QuoteController` | Full CRUD + send email, convert to invoice, generate PDF |
| `PaymentController` | Full CRUD + allocate to invoices |
| `CreditNoteController` | Full CRUD + apply to invoices |
| `DeliveryChallanController` | Full CRUD |
| `RefundController` | Full CRUD |

### Purchases — `Backoffice/Purchases/`
| Controller | Resource |
|-----------|---------|
| `SupplierController` | Full CRUD |
| `PurchaseOrderController` | Full CRUD + send to supplier, receive goods |
| `VendorBillController` | Full CRUD + mark paid |
| `GoodsReceiptController` | Full CRUD (triggers stock increase) |
| `DebitNoteController` | Full CRUD |
| `SupplierPaymentController` | Full CRUD |
| `SupplierPaymentMethodController` | Full CRUD |

### Inventory — `Backoffice/Inventory/`
| Controller | Resource |
|-----------|---------|
| `WarehouseController` | Full CRUD + stock overview |
| `ProductStockController` | List + adjust stock levels |
| `StockMovementController` | Create (manual adjustment) + list |
| `StockTransferController` | Full CRUD + state transitions |

### Catalog — `Backoffice/Catalog/`
| Controller | Resource |
|-----------|---------|
| `ProductController` | Full CRUD |
| `ProductCategoryController` | Full CRUD |
| `TaxCategoryController` | Full CRUD |
| `TaxGroupController` | Full CRUD (with sub-rates) |
| `UnitController` | Full CRUD |

### Finance — `Backoffice/Finance/`
| Controller | Resource |
|-----------|---------|
| `ExpenseController` | Full CRUD + payment tracking |
| `IncomeController` | Full CRUD |
| `LoanController` | Full CRUD + installment schedule |
| `LoanInstallmentController` | mark paid |
| `FinanceCategoryController` | Full CRUD |
| `BankAccountController` | Full CRUD |

### Reports — `Backoffice/Reports/`
| Controller | Route |
|-----------|-------|
| `SalesReportController` | Invoice totals, revenue by period |
| `PurchaseReportController` | PO totals, supplier spending |
| `InventoryReportController` | Stock levels, movements |
| `FinanceReportController` | Expense/income summary |
| `CustomerReportController` | Customer aging, top customers |
| `CustomReportController` | User-defined report builder |

### Settings — `Backoffice/Settings/`
| Controller | Purpose |
|-----------|---------|
| `CompanySettingsController` | Logo, company name, address |
| `InvoiceSettingsController` | Invoice numbering, footer, template |
| `CurrencySettingsController` | Default currency, exchange rates |
| `LocalizationSettingsController` | Language, timezone, date format |
| `NotificationSettingsController` | Email notification toggles |
| `PaymentMethodController` | Manage payment methods |
| `SecuritySettingsController` | 2FA, session settings |
| `SignatureSettingsController` | Digital signature upload |
| `AppearanceSettingsController` | Theme, colors, logo |
| `EmailTemplateSettingsController` | Customize email templates |
| `InvoiceTemplateSettingsController` | Choose/customize invoice design |

### Access Control — `Backoffice/Access/`
- `RolesPermissionsController` — Create/edit roles, assign permissions

### Users — `Backoffice/Users/`
- `UserController` — List, show, update, deactivate tenant users
- `UserInvitationController` — Send invite emails, cancel invitations

### Other Backoffice
- `AccountSettingsController` — Profile, password, avatar
- `NotificationController` — Mark read, list notifications
- `SupportTicketController` — Create/view/reply to support tickets
- `TrashController` — View and restore soft-deleted records
- `ExportController` — Trigger Excel list exports
- `SetupWizardController` — First-run guided setup

---

## SuperAdmin Controllers — `app/Http/Controllers/SuperAdmin/`

| Controller | Purpose |
|-----------|---------|
| `DashboardController` | KPIs: tenants, revenue, active plans |
| `TenantManagementController` | List, show, suspend, activate tenants |
| `PlanController` | CRUD subscription plans |
| `SubscriptionController` | Manage tenant subscriptions |
| `TemplateCatalogController` | Manage invoice template library |
| `TemplateAssignmentController` | Assign templates to tenants |
| `AnnouncementController` | Create/publish platform announcements |
| `ActivityLogController` | Browse audit log across all tenants |
| `ContactMessageController` | View contact form submissions |
| `NewsletterController` | Manage newsletter subscribers |
| `SupportTicketController` | View/reply all support tickets |
| `DeleteAccountRequestController` | Process GDPR deletion requests |
| `AccountRequestController` | Approve/reject new tenant signups |
| `RolesPermissionsController` | SuperAdmin role management |
| `BlogCategoryController` | Manage blog categories |
| `BlogPostController` | Create/edit/publish blog posts |

---

## Public Controllers

| Controller | Purpose |
|-----------|---------|
| `PublicDocumentController` | Serve invoice/quote via `public_token` (no auth required) |
| `BlogController` (frontoffice) | Display published blog posts and categories |
| `Web/ContactController` | Process public contact form submissions |
| `Web/NewsletterController` | Newsletter signups |
| `Web/AccountRequestController` | New tenant signup request form |

---

## Cross-Controller Patterns

### Tenant Safety Check
All backoffice show/edit/update/destroy methods use:
```php
private function assertSameTenant($model): void
{
    if ($model->tenant_id !== tenant()->id) {
        abort(403);
    }
}
```

### Permission Check
```php
// Via middleware on route
Route::middleware('permission:sales.invoices.view')->group(...)

// Or via policy in controller
$this->authorize('view', $invoice);
```

### Flash Messages (always French)
```php
return redirect()->route('bo.sales.invoices.index')
    ->with('success', 'Facture créée avec succès.');

return redirect()->back()
    ->with('error', 'Une erreur est survenue.');
```

### PDF Generation
```php
// Via PdfService
$pdf = app(PdfService::class)->generate('invoice', $invoice);
return response()->streamDownload(fn() => print($pdf->output()), 'facture.pdf');
```
