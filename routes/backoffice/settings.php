<?php

use App\Http\Controllers\Backoffice\Settings\AppearanceSettingsController;
use App\Http\Controllers\Backoffice\Settings\BarcodeSettingsController;
use App\Http\Controllers\Backoffice\Settings\CompanySettingsController;
use App\Http\Controllers\Backoffice\Settings\CurrencySettingsController;
use App\Http\Controllers\Backoffice\Settings\EmailTemplateSettingsController;
use App\Http\Controllers\Backoffice\Settings\InvoiceSettingsController;
use App\Http\Controllers\Backoffice\Settings\InvoiceTemplateSettingsController;
use App\Http\Controllers\Backoffice\Settings\LocalizationSettingsController;
use App\Http\Controllers\Backoffice\Settings\NotificationSettingsController;
use App\Http\Controllers\Backoffice\Settings\PlansBillingsController;
use App\Http\Controllers\Backoffice\Settings\PaymentMethodController;
use App\Http\Controllers\Backoffice\Settings\SignatureSettingsController;
use App\Http\Controllers\Backoffice\Settings\DataExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Settings Routes
|--------------------------------------------------------------------------
*/

// Account Settings (personal — accessible to all authenticated users)
// Company Settings
Route::prefix('settings/company')->as('settings.company.')->middleware(['requireTenantContext', 'permission:settings.company.view'])->group(function () {
    Route::get('/', [CompanySettingsController::class, 'edit'])->name('edit');
    Route::put('/', [CompanySettingsController::class, 'update'])->middleware('permission:settings.company.edit')->name('update');
});

// Invoice Settings
Route::prefix('settings/invoice')->as('settings.invoice.')->middleware(['requireTenantContext', 'permission:settings.invoices.view'])->group(function () {
    Route::get('/', [InvoiceSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [InvoiceSettingsController::class, 'update'])->middleware('permission:settings.invoices.edit')->name('update');
});

// Localization Settings
Route::prefix('settings/locale')->as('settings.locale.')->middleware(['requireTenantContext', 'permission:settings.localization.view'])->group(function () {
    Route::get('/', [LocalizationSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [LocalizationSettingsController::class, 'update'])->middleware('permission:settings.localization.edit')->name('update');
});

// Signatures Settings
Route::prefix('settings/signatures')->as('settings.signatures.')->middleware(['requireTenantContext', 'permission:settings.signatures.view'])->group(function () {
    Route::get('/', [SignatureSettingsController::class, 'index'])->name('index');
    Route::post('/', [SignatureSettingsController::class, 'store'])->middleware('permission:settings.signatures.create')->name('store');
    Route::put('/{signature}', [SignatureSettingsController::class, 'update'])->middleware('permission:settings.signatures.edit')->name('update');
    Route::put('/{signature}/toggle', [SignatureSettingsController::class, 'toggleStatus'])->middleware('permission:settings.signatures.edit')->name('toggle');
    Route::delete('/{signature}', [SignatureSettingsController::class, 'destroy'])->middleware('permission:settings.signatures.delete')->name('destroy');
});

// Invoice Templates Settings
Route::prefix('settings/invoice-templates')->as('settings.invoice-templates.')->middleware(['requireTenantContext', 'permission:settings.templates.view'])->group(function () {
    Route::get('/', [InvoiceTemplateSettingsController::class, 'index'])->name('index');
    Route::post('/{template}/activate', [InvoiceTemplateSettingsController::class, 'activate'])->middleware('permission:settings.templates.edit')->name('activate');
    Route::get('/{template}/preview', [InvoiceTemplateSettingsController::class, 'preview'])->name('preview');
    Route::post('/{templateId}/purchase', [InvoiceTemplateSettingsController::class, 'purchase'])->middleware('permission:settings.templates.create')->name('purchase');
});

// Currencies / Exchange Rates Settings
Route::prefix('settings/currencies')->as('settings.currencies.')->middleware(['requireTenantContext', 'permission:settings.currencies.view'])->group(function () {
    Route::get('/', [CurrencySettingsController::class, 'index'])->name('index');
    Route::post('/', [CurrencySettingsController::class, 'store'])->middleware('permission:settings.currencies.create')->name('store');
    Route::post('/exchange-rate', [CurrencySettingsController::class, 'storeExchangeRate'])->middleware('permission:settings.currencies.create')->name('exchange-rate.store');
    Route::put('/{exchangeRate}', [CurrencySettingsController::class, 'update'])->middleware('permission:settings.currencies.edit')->name('update');
    Route::delete('/{exchangeRate}', [CurrencySettingsController::class, 'destroy'])->middleware('permission:settings.currencies.delete')->name('destroy');
    Route::post('/{currency}/set-default', [CurrencySettingsController::class, 'setDefault'])->middleware('permission:settings.currencies.edit')->name('set-default');
});

// Tax Rates Settings — REDIRECTED to Catalog module (canonical location)
// All tax CRUD is handled at bo.catalog.tax-rates / bo.catalog.tax-categories / bo.catalog.tax-groups
Route::get('settings/tax-rates', fn () => redirect()->route('bo.catalog.tax-rates.index'))
    ->name('settings.tax-rates.index');

// Barcode Settings
Route::prefix('settings/barcode')->as('settings.barcode.')->middleware(['requireTenantContext', 'permission:settings.barcode.view'])->group(function () {
    Route::get('/', [BarcodeSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [BarcodeSettingsController::class, 'update'])->middleware('permission:settings.barcode.edit')->name('update');
});

// Plans & Billings Settings
Route::prefix('settings/plans-billings')->as('settings.plans-billings.')->group(function () {
    Route::get('/', [PlansBillingsController::class, 'index'])->middleware(['requireTenantContext', 'permission:settings.plans_billing.view'])->name('index');
});

// Notification Settings
Route::prefix('settings/notifications')->as('settings.notifications.')->middleware(['requireTenantContext', 'permission:settings.notifications.view'])->group(function () {
    Route::get('/', [NotificationSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [NotificationSettingsController::class, 'update'])->middleware('permission:settings.notifications.edit')->name('update');
});

// Email Templates Settings
Route::prefix('settings/email-templates')->as('settings.email-templates.')->middleware(['requireTenantContext', 'permission:settings.email_templates.view'])->group(function () {
    Route::get('/', [EmailTemplateSettingsController::class, 'index'])->name('index');
    Route::post('/', [EmailTemplateSettingsController::class, 'store'])->middleware('permission:settings.email_templates.create')->name('store');
    Route::put('/{template}', [EmailTemplateSettingsController::class, 'update'])->middleware('permission:settings.email_templates.edit')->name('update');
    Route::put('/{template}/toggle', [EmailTemplateSettingsController::class, 'toggleStatus'])->middleware('permission:settings.email_templates.edit')->name('toggle');
    Route::delete('/{template}', [EmailTemplateSettingsController::class, 'destroy'])->middleware('permission:settings.email_templates.delete')->name('destroy');
});

// Appearance Settings
Route::prefix('settings/appearance')->as('settings.appearance.')->middleware(['requireTenantContext', 'permission:settings.appearance.view'])->group(function () {
    Route::get('/', [AppearanceSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [AppearanceSettingsController::class, 'update'])->middleware('permission:settings.appearance.edit')->name('update');
});

// Payment Methods Settings
Route::prefix('settings/payment-methods')->as('settings.payment-methods.')->middleware(['requireTenantContext', 'permission:settings.payment_methods.view'])->group(function () {
    Route::get('/', [PaymentMethodController::class, 'index'])->name('index');
    Route::post('/', [PaymentMethodController::class, 'store'])->middleware('permission:settings.payment_methods.create')->name('store');
    Route::put('/{paymentMethod}', [PaymentMethodController::class, 'update'])->middleware('permission:settings.payment_methods.edit')->name('update');
    Route::delete('/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->middleware('permission:settings.payment_methods.delete')->name('destroy');
});

// Security Settings
// Data Export
Route::prefix('settings/data-export')->as('settings.data-export.')->middleware(['requireTenantContext', 'permission:settings.data_export.view'])->group(function () {
    Route::get('/', [DataExportController::class, 'index'])->name('index');
    Route::post('/download', [DataExportController::class, 'export'])
        ->middleware(['permission:settings.data_export.create', 'throttle:data-export'])
        ->name('download');
});
