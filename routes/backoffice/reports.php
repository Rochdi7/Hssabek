<?php

use App\Http\Controllers\Backoffice\ReportsController;
use App\Http\Controllers\Backoffice\Reports\SalesReportController;
use App\Http\Controllers\Backoffice\Reports\CustomerReportController;
use App\Http\Controllers\Backoffice\Reports\PurchaseReportController;
use App\Http\Controllers\Backoffice\Reports\FinanceReportController;
use App\Http\Controllers\Backoffice\Reports\InventoryReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Reports Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('reports')->as('reports.')->group(function () {
    Route::get('/', [ReportsController::class, 'index'])
        ->middleware('permission:reports.sales.view')
        ->name('index');

    Route::get('sales', [SalesReportController::class, 'index'])
        ->middleware('permission:reports.sales.view')
        ->name('sales');

    Route::get('customers', [CustomerReportController::class, 'index'])
        ->middleware('permission:reports.customers.view')
        ->name('customers');

    Route::get('purchases', [PurchaseReportController::class, 'index'])
        ->middleware('permission:reports.purchases.view')
        ->name('purchases');

    Route::get('finance', [FinanceReportController::class, 'index'])
        ->middleware('permission:reports.finance.view')
        ->name('finance');

    Route::get('inventory', [InventoryReportController::class, 'index'])
        ->middleware('permission:reports.inventory.view')
        ->name('inventory');

    // Export endpoints
    Route::post('sales/export', [SalesReportController::class, 'export'])
        ->middleware(['permission:reports.sales.view', 'plan.limit:exports_per_month', 'throttle:report-export'])
        ->name('sales.export');

    Route::post('finance/export', [FinanceReportController::class, 'export'])
        ->middleware(['permission:reports.finance.view', 'plan.limit:exports_per_month', 'throttle:report-export'])
        ->name('finance.export');

    Route::post('inventory/export', [InventoryReportController::class, 'export'])
        ->middleware(['permission:reports.inventory.view', 'plan.limit:exports_per_month', 'throttle:report-export'])
        ->name('inventory.export');

});
