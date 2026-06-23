# Validation Documentation

## Overview

All input validation is done via **Form Request classes** in `app/Http/Requests/`.
No validation is performed directly in controllers.

---

## Base Classes

| Class | Location | Purpose |
|-------|----------|---------|
| `BaseFormRequest` | `app/Http/Requests/BaseFormRequest.php` | Common helpers for all requests |
| `TenantFormRequest` | `app/Http/Requests/TenantFormRequest.php` | Base for tenant-scoped requests (adds tenant_id context) |

---

## Form Request Organization

```
app/Http/Requests/
├── Auth/
│   ├── LoginRequest.php
│   ├── RegisterRequest.php
│   ├── ForgotPasswordRequest.php
│   └── ResetPasswordRequest.php
├── Access/
│   ├── StoreRoleRequest.php
│   └── UpdateRoleRequest.php
├── Account/
│   ├── UpdateProfileRequest.php
│   └── UpdatePasswordRequest.php
├── Sales/
│   ├── Store/
│   │   ├── StoreInvoiceRequest.php
│   │   ├── StoreQuoteRequest.php
│   │   ├── StorePaymentRequest.php
│   │   ├── StoreCreditNoteRequest.php
│   │   ├── StoreDeliveryChallanRequest.php
│   │   └── StoreRefundRequest.php
│   └── Update/
│       ├── UpdateInvoiceRequest.php
│       └── ... (same for all sales resources)
├── Purchases/
│   ├── Store/ (Supplier, PO, VendorBill, GoodsReceipt, DebitNote, SupplierPayment)
│   └── Update/ (same)
├── Catalog/
│   ├── StoreProductRequest.php
│   ├── UpdateProductRequest.php
│   ├── StoreCategoryRequest.php
│   ├── StoreUnitRequest.php
│   ├── StoreTaxGroupRequest.php
│   └── StoreTaxCategoryRequest.php
├── Finance/
│   ├── StoreExpenseRequest.php
│   ├── StoreIncomeRequest.php
│   └── StoreLoanRequest.php
├── Inventory/
│   ├── StoreWarehouseRequest.php
│   ├── StoreStockTransferRequest.php
│   └── StoreStockMovementRequest.php
├── CRM/
│   ├── StoreCustomerRequest.php
│   ├── UpdateCustomerRequest.php
│   ├── StoreCustomerAddressRequest.php
│   ├── UpdateCustomerAddressRequest.php
│   ├── StoreCustomerContactRequest.php
│   └── UpdateCustomerContactRequest.php
├── Billing/
│   ├── StorePlanRequest.php
│   └── StoreSubscriptionRequest.php
├── Pro/
│   ├── StoreBranchRequest.php
│   ├── StoreRecurringInvoiceRequest.php
│   └── StoreInvoiceReminderRequest.php
├── Reports/
│   └── CustomReportRequest.php
├── Settings/
│   ├── UpdateCompanySettingsRequest.php
│   ├── UpdateInvoiceSettingsRequest.php
│   └── ... (other settings requests)
├── Support/
│   ├── StoreSupportTicketRequest.php
│   └── StoreTicketReplyRequest.php
└── Web/
    ├── ContactMessageRequest.php
    └── AccountRequestFormRequest.php
```

---

## Mandatory Conventions

### 1. All Validation Messages Must Be in French

```php
public function messages(): array
{
    return [
        'name.required' => 'Le nom est obligatoire.',
        'email.required' => 'L\'adresse e-mail est obligatoire.',
        'email.email' => 'L\'adresse e-mail n\'est pas valide.',
        'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
        'amount.numeric' => 'Le montant doit être un nombre.',
        'amount.min' => 'Le montant doit être supérieur à :min.',
    ];
}
```

### 2. Tenant-Scoped Unique Rules

When validating uniqueness within a tenant (not globally):
```php
use Illuminate\Validation\Rule;

public function rules(): array
{
    return [
        'email' => [
            'required',
            'email',
            Rule::unique('customers', 'email')
                ->where('tenant_id', $this->tenant_id ?? tenant()->id)
                ->ignore($this->customer?->id),
        ],
    ];
}
```

**Never use `unique:table,column` without scoping by tenant_id** — this would allow cross-tenant conflicts.

### 3. Authorize Method

All Form Requests must implement `authorize()`:
```php
public function authorize(): bool
{
    // For backoffice requests — user must be authenticated tenant user
    return auth()->check() && auth()->user()->tenant_id !== null;
}
```

---

## Traits Used in Form Requests

### `ResolveTaxSelection`
- **Location:** `app/Http/Requests/Traits/ResolveTaxSelection.php`
- **Purpose:** Handle tax_group_id vs manual tax_rate selection in invoice/quote forms

### `ValidatesMeasurementItems`
- **Location:** `app/Http/Requests/Traits/ValidatesMeasurementItems.php`
- **Purpose:** Validate line items with `calculation_mode = measurement` (length, width, height, thickness fields)

---

## Blade Validation Display

Always use this pattern — do NOT invent alternatives:

```blade
<div class="form-group">
    <label>Nom <span class="text-danger">*</span></label>
    <input type="text"
           class="form-control @error('name') is-invalid @enderror"
           name="name"
           value="{{ old('name', $model->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

---

## Custom Validation Rules

**Location:** `app/Rules/`

Custom Rule classes extend `Illuminate\Contracts\Validation\Rule`.
Used for complex business logic validations that cannot be expressed as simple rule strings.

---

## Common Validation Patterns

### Required String
```php
'name' => ['required', 'string', 'max:255'],
```

### Optional String
```php
'notes' => ['nullable', 'string'],
```

### Email
```php
'email' => ['required', 'email', 'max:255'],
```

### Money / Decimal
```php
'amount' => ['required', 'numeric', 'min:0'],
```

### Date
```php
'due_date' => ['required', 'date', 'after_or_equal:issue_date'],
```

### Enum
```php
'status' => ['required', 'in:draft,sent,paid,cancelled'],
```

### Foreign Key (must belong to tenant)
```php
'customer_id' => [
    'required',
    Rule::exists('customers', 'id')
        ->where('tenant_id', tenant()->id),
],
```

### File Upload
```php
'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
```

---

## Validation for Nested Items (Invoice Lines)

Invoice/Quote items are sent as arrays:
```php
// Validation
'items' => ['required', 'array', 'min:1'],
'items.*.product_id' => ['nullable', 'uuid'],
'items.*.description' => ['required', 'string'],
'items.*.quantity' => ['required', 'numeric', 'min:0'],
'items.*.unit_price' => ['required', 'numeric', 'min:0'],

// Messages
'items.*.description.required' => 'La description de l\'article est obligatoire.',
'items.*.unit_price.required' => 'Le prix unitaire est obligatoire.',
```
