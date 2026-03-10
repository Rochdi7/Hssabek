<?php

use App\Http\Controllers\Backoffice\Pro\RecurringInvoiceController;
use App\Http\Controllers\Backoffice\Pro\InvoiceReminderController;
use App\Http\Controllers\Backoffice\Pro\BranchController;
use App\Http\Controllers\Backoffice\Pro\CustomReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Pro Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('pro')->as('pro.')->group(function () {

    // ─── Recurring Invoices ───────────────────────────────────────
    Route::prefix('recurring-invoices')->as('recurring-invoices.')->group(function () {
        Route::get('/', [RecurringInvoiceController::class, 'index'])
            ->middleware('permission:pro.recurring_invoices.view')
            ->name('index');

        Route::get('/create', [RecurringInvoiceController::class, 'create'])
            ->middleware('permission:pro.recurring_invoices.create')
            ->name('create');

        Route::post('/', [RecurringInvoiceController::class, 'store'])
            ->middleware('permission:pro.recurring_invoices.create')
            ->name('store');

        Route::get('/{recurringInvoice}', [RecurringInvoiceController::class, 'show'])
            ->middleware('permission:pro.recurring_invoices.view')
            ->name('show');

        Route::get('/{recurringInvoice}/edit', [RecurringInvoiceController::class, 'edit'])
            ->middleware('permission:pro.recurring_invoices.edit')
            ->name('edit');

        Route::put('/{recurringInvoice}', [RecurringInvoiceController::class, 'update'])
            ->middleware('permission:pro.recurring_invoices.edit')
            ->name('update');

        Route::delete('/{recurringInvoice}', [RecurringInvoiceController::class, 'destroy'])
            ->middleware('permission:pro.recurring_invoices.delete')
            ->name('destroy');
    });

    // ─── Invoice Reminders ────────────────────────────────────────
    Route::prefix('invoice-reminders')->as('invoice-reminders.')->group(function () {
        Route::get('/', [InvoiceReminderController::class, 'index'])
            ->middleware('permission:pro.invoice_reminders.view')
            ->name('index');

        Route::get('/create', [InvoiceReminderController::class, 'create'])
            ->middleware('permission:pro.invoice_reminders.create')
            ->name('create');

        Route::post('/', [InvoiceReminderController::class, 'store'])
            ->middleware('permission:pro.invoice_reminders.create')
            ->name('store');

        Route::get('/{invoiceReminder}/edit', [InvoiceReminderController::class, 'edit'])
            ->middleware('permission:pro.invoice_reminders.edit')
            ->name('edit');

        Route::put('/{invoiceReminder}', [InvoiceReminderController::class, 'update'])
            ->middleware('permission:pro.invoice_reminders.edit')
            ->name('update');

        Route::delete('/{invoiceReminder}', [InvoiceReminderController::class, 'destroy'])
            ->middleware('permission:pro.invoice_reminders.delete')
            ->name('destroy');
    });

    // ─── Rapports (WYSIWYG editor + PDF/Word export) ──────────────
    Route::prefix('rapports')->as('rapports.')->group(function () {
        Route::get('/', [CustomReportController::class, 'index'])
            ->middleware('permission:pro.rapports.view')
            ->name('index');

        Route::get('/create', [CustomReportController::class, 'create'])
            ->middleware('permission:pro.rapports.create')
            ->name('create');

        Route::post('/', [CustomReportController::class, 'store'])
            ->middleware('permission:pro.rapports.create')
            ->name('store');

        Route::get('/{customReport}', [CustomReportController::class, 'show'])
            ->middleware('permission:pro.rapports.view')
            ->name('show');

        Route::get('/{customReport}/edit', [CustomReportController::class, 'edit'])
            ->middleware('permission:pro.rapports.edit')
            ->name('edit');

        Route::put('/{customReport}', [CustomReportController::class, 'update'])
            ->middleware('permission:pro.rapports.edit')
            ->name('update');

        Route::delete('/{customReport}', [CustomReportController::class, 'destroy'])
            ->middleware('permission:pro.rapports.delete')
            ->name('destroy');

        Route::get('/{customReport}/export-pdf', [CustomReportController::class, 'exportPdf'])
            ->middleware('permission:pro.rapports.export')
            ->name('export-pdf');

        Route::get('/{customReport}/export-word', [CustomReportController::class, 'exportWord'])
            ->middleware('permission:pro.rapports.export')
            ->name('export-word');
    });

    // ─── Branches ─────────────────────────────────────────────────
    Route::prefix('branches')->as('branches.')->group(function () {
        Route::get('/', [BranchController::class, 'index'])
            ->middleware('permission:pro.branches.view')
            ->name('index');

        Route::get('/create', [BranchController::class, 'create'])
            ->middleware('permission:pro.branches.create')
            ->name('create');

        Route::post('/', [BranchController::class, 'store'])
            ->middleware('permission:pro.branches.create')
            ->name('store');

        Route::get('/{branch}/edit', [BranchController::class, 'edit'])
            ->middleware('permission:pro.branches.edit')
            ->name('edit');

        Route::put('/{branch}', [BranchController::class, 'update'])
            ->middleware('permission:pro.branches.edit')
            ->name('update');

        Route::delete('/{branch}', [BranchController::class, 'destroy'])
            ->middleware('permission:pro.branches.delete')
            ->name('destroy');
    });
});
