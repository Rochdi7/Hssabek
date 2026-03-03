<?php

use App\Http\Controllers\Backoffice\AccountSettingsController;
use App\Http\Controllers\Backoffice\Settings\BarcodeSettingsController;
use App\Http\Controllers\Backoffice\Settings\CompanySettingsController;
use App\Http\Controllers\Backoffice\Settings\CurrencySettingsController;
use App\Http\Controllers\Backoffice\Settings\InvoiceSettingsController;
use App\Http\Controllers\Backoffice\Settings\InvoiceTemplateSettingsController;
use App\Http\Controllers\Backoffice\Settings\LocalizationSettingsController;
use App\Http\Controllers\Backoffice\Settings\NotificationSettingsController;
use App\Http\Controllers\Backoffice\Settings\PlansBillingsController;
use App\Http\Controllers\Backoffice\Settings\SecuritySettingsController;
use App\Http\Controllers\Backoffice\Settings\SignatureSettingsController;
use App\Http\Controllers\Backoffice\Settings\TaxRateSettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Settings Routes
|--------------------------------------------------------------------------
*/

// Account Settings
Route::prefix('account/settings')->as('account.settings.')->group(function () {
    Route::get('/', [AccountSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [AccountSettingsController::class, 'update'])->name('update');
    Route::put('/password', [AccountSettingsController::class, 'updatePassword'])->name('password');
    Route::put('/avatar', [AccountSettingsController::class, 'updateAvatar'])->name('avatar');
    Route::delete('/avatar', [AccountSettingsController::class, 'destroyAvatar'])->name('avatar.destroy');
});

// Company Settings
Route::prefix('settings/company')->as('settings.company.')->group(function () {
    Route::get('/', [CompanySettingsController::class, 'edit'])->name('edit');
    Route::put('/', [CompanySettingsController::class, 'update'])->name('update');
});

// Invoice Settings
Route::prefix('settings/invoice')->as('settings.invoice.')->group(function () {
    Route::get('/', [InvoiceSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [InvoiceSettingsController::class, 'update'])->name('update');
});

// Localization Settings
Route::prefix('settings/locale')->as('settings.locale.')->group(function () {
    Route::get('/', [LocalizationSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [LocalizationSettingsController::class, 'update'])->name('update');
});

// Signatures Settings
Route::prefix('settings/signatures')->as('settings.signatures.')->group(function () {
    Route::get('/', [SignatureSettingsController::class, 'index'])->name('index');
    Route::post('/', [SignatureSettingsController::class, 'store'])->name('store');
    Route::put('/{signature}', [SignatureSettingsController::class, 'update'])->name('update');
    Route::put('/{signature}/toggle', [SignatureSettingsController::class, 'toggleStatus'])->name('toggle');
    Route::delete('/{signature}', [SignatureSettingsController::class, 'destroy'])->name('destroy');
});

// Invoice Templates Settings
Route::prefix('settings/invoice-templates')->as('settings.invoice-templates.')->group(function () {
    Route::get('/', [InvoiceTemplateSettingsController::class, 'index'])->name('index');
    Route::post('/{template}/activate', [InvoiceTemplateSettingsController::class, 'activate'])->name('activate');
    Route::post('/{template}/deactivate', [InvoiceTemplateSettingsController::class, 'deactivate'])->name('deactivate');
});

// Currencies / Exchange Rates Settings
Route::prefix('settings/currencies')->as('settings.currencies.')->group(function () {
    Route::get('/', [CurrencySettingsController::class, 'index'])->name('index');
    Route::post('/', [CurrencySettingsController::class, 'store'])->name('store');
    Route::post('/exchange-rate', [CurrencySettingsController::class, 'storeExchangeRate'])->name('exchange-rate.store');
    Route::put('/{exchangeRate}', [CurrencySettingsController::class, 'update'])->name('update');
    Route::delete('/{exchangeRate}', [CurrencySettingsController::class, 'destroy'])->name('destroy');
    Route::post('/{currency}/set-default', [CurrencySettingsController::class, 'setDefault'])->name('set-default');
});

// Tax Rates Settings
Route::prefix('settings/tax-rates')->as('settings.tax-rates.')->group(function () {
    Route::get('/', [TaxRateSettingsController::class, 'index'])->name('index');

    // Tax Categories (individual rates)
    Route::post('/category', [TaxRateSettingsController::class, 'storeTaxCategory'])->name('category.store');
    Route::put('/category/{taxCategory}', [TaxRateSettingsController::class, 'updateTaxCategory'])->name('category.update');
    Route::put('/category/{taxCategory}/toggle', [TaxRateSettingsController::class, 'toggleTaxCategory'])->name('category.toggle');
    Route::delete('/category/{taxCategory}', [TaxRateSettingsController::class, 'destroyTaxCategory'])->name('category.destroy');

    // Tax Groups
    Route::post('/group', [TaxRateSettingsController::class, 'storeTaxGroup'])->name('group.store');
    Route::put('/group/{taxGroup}', [TaxRateSettingsController::class, 'updateTaxGroup'])->name('group.update');
    Route::put('/group/{taxGroup}/toggle', [TaxRateSettingsController::class, 'toggleTaxGroup'])->name('group.toggle');
    Route::delete('/group/{taxGroup}', [TaxRateSettingsController::class, 'destroyTaxGroup'])->name('group.destroy');
});

// Barcode Settings
Route::prefix('settings/barcode')->as('settings.barcode.')->group(function () {
    Route::get('/', [BarcodeSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [BarcodeSettingsController::class, 'update'])->name('update');
});

// Plans & Billings Settings
Route::prefix('settings/plans-billings')->as('settings.plans-billings.')->group(function () {
    Route::get('/', [PlansBillingsController::class, 'index'])->name('index');
});

// Notification Settings
Route::prefix('settings/notifications')->as('settings.notifications.')->group(function () {
    Route::get('/', [NotificationSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [NotificationSettingsController::class, 'update'])->name('update');
});

// Security Settings
Route::prefix('settings/security')->as('settings.security.')->group(function () {
    Route::get('/', [SecuritySettingsController::class, 'index'])->name('index');
});
