# TASK 4 -- Code Architecture Cleanup (Services, Policies, Requests)

**Priority:** P3 -- Important for maintainability, do after tests exist as a safety net
**Estimated effort:** 4-5 days
**Dependency:** Task 3 (tests must exist to catch regressions during refactoring)

---

## Prompt for Claude

You are a senior Laravel architect working on a multi-tenant SaaS invoicing platform called "Facturation".

Your task is to complete **TASK 4: Code Architecture Cleanup** -- extract business logic from fat controllers into services, eliminate code duplication, and standardize architectural patterns.

### Context

This is a Laravel 12 multi-tenant SaaS app with:
- 15 existing services in `app/Services/` (InvoiceService, PaymentService, TaxCalculationService, etc.)
- 4 "fat" controllers with inline business logic: PurchaseOrderController, DeliveryChallanController, DebitNoteController, GoodsReceiptController
- 2 finance controllers with inline bank balance logic: ExpenseController, IncomeController
- 103 form requests where Store/Update pairs are ~90% identical
- 31 policies all repeating the same tenant check pattern
- No Event/Listener architecture for cross-domain side effects
- Inconsistent DI patterns: some use constructor injection, others use `app()` helper
- Existing services to use as reference: `InvoiceService`, `PaymentService`, `CreditNoteService` are the gold standard

### What You Must Do

Complete ALL subtasks below. After each refactoring, run `php artisan test` to verify nothing broke.
Use the existing `InvoiceService` as the reference pattern for new services.
Do NOT change external behavior -- only internal structure.

---

## Subtask Checklist

### 1. Create PurchaseOrderService

**File to create:** `app/Services/Purchases/PurchaseOrderService.php`
**File to refactor:** `app/Http/Controllers/Backoffice/Purchases/PurchaseOrderController.php`

1. Read the existing PurchaseOrderController `store()` and `update()` methods completely.
2. Read the existing `InvoiceService` as a reference pattern.
3. Create `PurchaseOrderService` with:
   - `__construct(TaxCalculationService $taxService, DocumentNumberService $docService)`
   - `create(array $validated): PurchaseOrder` -- move all calculation + item creation logic from controller store()
   - `update(PurchaseOrder $po, array $validated): PurchaseOrder` -- move from controller update()
   - `transition(PurchaseOrder $po, string $newStatus): void` -- if status transitions exist in the controller
4. Refactor PurchaseOrderController to inject and delegate to the service.
5. Run tests.

### 2. Create DeliveryChallanService

**File to create:** `app/Services/Sales/DeliveryChallanService.php`
**File to refactor:** `app/Http/Controllers/Backoffice/Sales/DeliveryChallanController.php`

Same pattern as subtask 1:
1. Read the controller's `store()` and `update()`.
2. Extract calculation logic into `DeliveryChallanService::create()` and `::update()`.
3. Use `TaxCalculationService::calculateDocument()` instead of inline math.
4. Refactor controller to delegate.
5. Run tests.

### 3. Create GoodsReceiptService

**File to create:** `app/Services/Purchases/GoodsReceiptService.php`
**File to refactor:** `app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php`

1. Read the controller's `store()`.
2. Extract into `GoodsReceiptService::create()` -- include StockService integration for inventory updates.
3. Refactor controller.
4. Run tests.

### 4. Create ExpenseService and IncomeService

**Files to create:**
- `app/Services/Finance/ExpenseService.php`
- `app/Services/Finance/IncomeService.php`

**Files to refactor:**
- `app/Http/Controllers/Backoffice/Finance/ExpenseController.php`
- `app/Http/Controllers/Backoffice/Finance/IncomeController.php`

1. Read both controllers' `store()`, `update()`, `destroy()` methods.
2. Extract bank balance update logic (the `lockForUpdate()` + balance calculation pattern) into each service.
3. Create `ExpenseService::create()`, `::update()`, `::delete()` methods.
4. Create `IncomeService::create()`, `::update()`, `::delete()` methods.
5. Ensure both services use `DB::transaction()` with `lockForUpdate()` for bank account balance updates.
6. Refactor controllers to delegate.
7. Run tests.

### 5. Refactor DebitNoteController to use TaxCalculationService

**File:** `app/Http/Controllers/Backoffice/Purchases/DebitNoteController.php`

1. Read the controller's `store()` and `update()`.
2. Replace inline tax/discount/total calculations with `TaxCalculationService::calculateDocument()`.
3. The DebitNoteService already exists for `apply()` -- add `create()` and `update()` methods to it.
4. Run tests.

### 6. Create TenantPolicy base class

**File to create:** `app/Policies/TenantPolicy.php`
**Files to modify:** All 31 policy files in `app/Policies/`

1. Read 3-4 existing policies to understand the common pattern.
2. Create a base class:
   ```php
   namespace App\Policies;

   use App\Services\Tenancy\TenantContext;
   use Illuminate\Database\Eloquent\Model;

   abstract class TenantPolicy
   {
       protected function belongsToTenant(Model $model): bool
       {
           return $model->tenant_id === TenantContext::id();
       }
   }
   ```
3. Make all 31 policies extend `TenantPolicy` instead of having no parent.
4. Replace `$model->tenant_id === TenantContext::id()` with `$this->belongsToTenant($model)` in all view/update/delete methods.
5. Run tests after each batch (do 5-6 policies at a time).

### 7. Create BaseFormRequest for Store/Update pairs

**File to create:** `app/Http/Requests/BaseFormRequest.php`

1. Read 3-4 Store/Update request pairs to identify the common pattern.
2. Create a base class:
   ```php
   namespace App\Http\Requests;

   use Illuminate\Foundation\Http\FormRequest;

   abstract class BaseFormRequest extends FormRequest
   {
       public function authorize(): bool
       {
           return true;
       }

       abstract protected function baseRules(): array;

       protected function storeRules(): array
       {
           return [];
       }

       protected function updateRules(): array
       {
           return [];
       }

       public function rules(): array
       {
           $rules = $this->baseRules();

           if ($this->isMethod('POST')) {
               $rules = array_merge($rules, $this->storeRules());
           } else {
               $rules = array_merge($rules, $this->updateRules());
           }

           return $rules;
       }
   }
   ```
3. Refactor the **10 highest-duplication pairs** to use this base:
   - Customer (StoreCustomerRequest + UpdateCustomerRequest)
   - Product (StoreProductRequest + UpdateProductRequest)
   - Supplier (StoreSupplierRequest + UpdateSupplierRequest)
   - Warehouse (StoreWarehouseRequest + UpdateWarehouseRequest)
   - BankAccount (StoreBankAccountRequest + UpdateBankAccountRequest)
   - Expense (StoreExpenseRequest + UpdateExpenseRequest)
   - Income (StoreIncomeRequest + UpdateIncomeRequest)
   - Loan (StoreLoanRequest + UpdateLoanRequest)
   - FinanceCategory (StoreFinanceCategoryRequest + UpdateFinanceCategoryRequest)
   - Unit (StoreUnitRequest + UpdateUnitRequest)
4. For each pair: extract shared rules into `baseRules()`, put unique rules into `storeRules()` / `updateRules()`.
5. Run tests after each pair.

### 8. Standardize dependency injection

**Multiple controller files**

1. Search for all `app(ServiceClass::class)` usages in controllers:
   ```
   grep -r "app(" app/Http/Controllers/ --include="*.php"
   ```
2. Replace each occurrence with constructor injection.
3. Run tests.

### 9. Create domain events and listeners

**Files to create:**
- `app/Events/InvoiceCreated.php`
- `app/Events/InvoicePaid.php`
- `app/Events/PaymentReceived.php`
- `app/Events/ExpenseCreated.php`
- `app/Listeners/FlushReportCacheListener.php`

1. Create simple event classes that accept the model instance.
2. Create `FlushReportCacheListener` that calls `ReportService::flushTenantCache()`.
3. Register events in `app/Providers/EventServiceProvider.php` (create it if it doesn't exist -- in Laravel 12, events can be registered in `AppServiceProvider` or a dedicated provider).
4. Dispatch events from the relevant services (InvoiceService, PaymentService, ExpenseService).
5. This replaces the manual `ReportService::flushTenantCache()` calls added in Task 2 controllers.
6. Run tests.

### 10. Clean up dead code and inconsistencies

1. Remove `routes/frontoffice.php` if it only contains placeholder/empty routes (read it first).
2. Remove `app/Http/Controllers/frontoffice/` if empty or placeholder.
3. Fix inconsistent route parameter naming: search for `{tax_category}` patterns and change to `{taxCategory}` (camelCase) in route files. Update corresponding controller method signatures.
4. Run tests.

---

## Audit Issues Covered by This Task

| # | Issue | Severity | Section |
|---|-------|----------|---------|
| 1 | Fat controllers (~19% have inline business logic) | HIGH | Backend Code > Controller Quality |
| 2 | Store/Update form request pairs ~90% identical | HIGH | Code Quality > Code Duplication |
| 3 | Duplicate tax calculation in 3+ controllers | MEDIUM | Code Quality > Code Duplication |
| 4 | Duplicate tenant check in 31 policies | MEDIUM | Code Quality > Code Duplication |
| 5 | Missing services: PurchaseOrder, GoodsReceipt, Expense, Income, DeliveryChallan | HIGH | Backend Code > Missing Services |
| 6 | No Event/Listener architecture | MEDIUM | Architecture > Missing layers |
| 7 | Inconsistent DI (app() vs constructor injection) | LOW | Backend Code > Architectural Consistency |
| 8 | Dead frontoffice placeholder code | LOW | Code Quality > Dead Code |
| 9 | Inconsistent route parameter naming | LOW | Code Quality > Naming Conventions |

---

## Definition of Done

- [ ] PurchaseOrderService created, PurchaseOrderController delegates to it
- [ ] DeliveryChallanService created, DeliveryChallanController delegates to it
- [ ] GoodsReceiptService created, GoodsReceiptController delegates to it
- [ ] ExpenseService created with bank balance logic, ExpenseController delegates
- [ ] IncomeService created with bank balance logic, IncomeController delegates
- [ ] DebitNoteController uses TaxCalculationService (no inline math)
- [ ] TenantPolicy base class exists, all 31 policies extend it
- [ ] BaseFormRequest exists, 10 request pairs refactored to use it
- [ ] Zero `app(ServiceClass::class)` calls in controllers (all constructor injection)
- [ ] Domain events created and dispatched from services
- [ ] FlushReportCacheListener replaces manual cache flush calls
- [ ] Dead frontoffice code removed (if confirmed empty)
- [ ] Route parameters use consistent camelCase
- [ ] All tests pass: `php artisan test`

---

## Files Likely Modified/Created

```
app/Services/Purchases/PurchaseOrderService.php                  (NEW)
app/Services/Sales/DeliveryChallanService.php                    (NEW)
app/Services/Purchases/GoodsReceiptService.php                   (NEW)
app/Services/Finance/ExpenseService.php                          (NEW)
app/Services/Finance/IncomeService.php                           (NEW)
app/Services/Purchases/DebitNoteService.php                      (MODIFIED - add create/update)
app/Policies/TenantPolicy.php                                    (NEW)
app/Policies/*.php                                               (ALL 31 - extend TenantPolicy)
app/Http/Requests/BaseFormRequest.php                            (NEW)
app/Http/Requests/CRM/StoreCustomerRequest.php                   (refactor)
app/Http/Requests/CRM/UpdateCustomerRequest.php                  (refactor)
... (20 more request files)
app/Http/Controllers/Backoffice/Purchases/PurchaseOrderController.php  (refactor)
app/Http/Controllers/Backoffice/Sales/DeliveryChallanController.php    (refactor)
app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php   (refactor)
app/Http/Controllers/Backoffice/Purchases/DebitNoteController.php      (refactor)
app/Http/Controllers/Backoffice/Finance/ExpenseController.php          (refactor)
app/Http/Controllers/Backoffice/Finance/IncomeController.php           (refactor)
app/Events/InvoiceCreated.php                                    (NEW)
app/Events/InvoicePaid.php                                       (NEW)
app/Events/PaymentReceived.php                                   (NEW)
app/Events/ExpenseCreated.php                                    (NEW)
app/Listeners/FlushReportCacheListener.php                       (NEW)
app/Providers/AppServiceProvider.php                             (register events)
routes/backoffice/*.php                                          (parameter naming fixes)
```

---

## Risks & Dependencies

- **Depends on Task 3 tests:** Refactoring without tests is dangerous. The tests from Task 3 provide the safety net.
- **Refactoring 31 policies:** Do in batches of 5-6, run tests between batches.
- **Form request refactoring:** The `messages()` method (French strings) may also have duplication -- extract to `baseMessages()` in the base class if feasible.
- **Event registration:** In Laravel 12, events can be auto-discovered or manually registered. Check if `EventServiceProvider` exists.
- **Route parameter changes:** May break existing bookmarks. Low risk for pre-production app.
- **Bank balance logic:** The `lockForUpdate()` pattern in Expense/Income controllers is critical for data integrity. Test thoroughly after extracting to services.
