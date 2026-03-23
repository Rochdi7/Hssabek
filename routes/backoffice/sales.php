<?php

use App\Http\Controllers\Backoffice\Sales\InvoiceController;
use App\Http\Controllers\Backoffice\Sales\QuoteController;
use App\Http\Controllers\Backoffice\Sales\PaymentController;
use App\Http\Controllers\Backoffice\Sales\CreditNoteController;
use App\Http\Controllers\Backoffice\Sales\DeliveryChallanController;
use App\Http\Controllers\Backoffice\Sales\RefundController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Sales Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('sales')->as('sales.')->group(function () {

    // ─── Invoices ─────────────────────────────────────────────────
    Route::prefix('invoices')->as('invoices.')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])
            ->middleware('permission:sales.invoices.view')
            ->name('index');

        Route::get('/create', [InvoiceController::class, 'create'])
            ->middleware(['permission:sales.invoices.create', 'plan.limit:invoices_per_month'])
            ->name('create');

        Route::post('/', [InvoiceController::class, 'store'])
            ->middleware(['permission:sales.invoices.create', 'plan.limit:invoices_per_month'])
            ->name('store');

        Route::get('/{invoice}', [InvoiceController::class, 'show'])
            ->middleware('permission:sales.invoices.view')
            ->name('show');

        Route::get('/{invoice}/edit', [InvoiceController::class, 'edit'])
            ->middleware('permission:sales.invoices.edit')
            ->name('edit');

        Route::put('/{invoice}', [InvoiceController::class, 'update'])
            ->middleware('permission:sales.invoices.edit')
            ->name('update');

        Route::delete('/{invoice}', [InvoiceController::class, 'destroy'])
            ->middleware('permission:sales.invoices.delete')
            ->name('destroy');

        Route::get('/{invoice}/download', [InvoiceController::class, 'download'])
            ->middleware(['permission:sales.invoices.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');

        Route::get('/{invoice}/stream', [InvoiceController::class, 'stream'])
            ->middleware(['permission:sales.invoices.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('stream');

        Route::post('/{invoice}/send', [InvoiceController::class, 'send'])
            ->middleware('permission:sales.invoices.edit')
            ->name('send');

        Route::post('/{invoice}/void', [InvoiceController::class, 'void'])
            ->middleware('permission:sales.invoices.edit')
            ->name('void');
    });

    // ─── Quotes ───────────────────────────────────────────────────
    Route::prefix('quotes')->as('quotes.')->group(function () {
        Route::get('/', [QuoteController::class, 'index'])
            ->middleware('permission:sales.quotes.view')
            ->name('index');

        Route::get('/create', [QuoteController::class, 'create'])
            ->middleware(['permission:sales.quotes.create', 'plan.limit:quotes_per_month'])
            ->name('create');

        Route::post('/', [QuoteController::class, 'store'])
            ->middleware(['permission:sales.quotes.create', 'plan.limit:quotes_per_month'])
            ->name('store');

        Route::get('/{quote}', [QuoteController::class, 'show'])
            ->middleware('permission:sales.quotes.view')
            ->name('show');

        Route::get('/{quote}/edit', [QuoteController::class, 'edit'])
            ->middleware('permission:sales.quotes.edit')
            ->name('edit');

        Route::put('/{quote}', [QuoteController::class, 'update'])
            ->middleware('permission:sales.quotes.edit')
            ->name('update');

        Route::delete('/{quote}', [QuoteController::class, 'destroy'])
            ->middleware('permission:sales.quotes.delete')
            ->name('destroy');

        Route::get('/{quote}/download', [QuoteController::class, 'download'])
            ->middleware(['permission:sales.quotes.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');

        Route::get('/{quote}/stream', [QuoteController::class, 'stream'])
            ->middleware(['permission:sales.quotes.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('stream');

        Route::post('/{quote}/send', [QuoteController::class, 'send'])
            ->middleware('permission:sales.quotes.edit')
            ->name('send');

        Route::post('/{quote}/convert', [QuoteController::class, 'convertToInvoice'])
            ->middleware(['permission:sales.invoices.create', 'plan.limit:invoices_per_month'])
            ->name('convert');
    });

    // ─── Payments ─────────────────────────────────────────────────
    Route::prefix('payments')->as('payments.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])
            ->middleware('permission:sales.payments.view')
            ->name('index');

        Route::get('/create', [PaymentController::class, 'create'])
            ->middleware('permission:sales.payments.create')
            ->name('create');

        Route::get('/customer-invoices/{customer}', [PaymentController::class, 'customerInvoices'])
            ->middleware('permission:sales.payments.create')
            ->name('customer-invoices');

        Route::post('/', [PaymentController::class, 'store'])
            ->middleware('permission:sales.payments.create')
            ->name('store');

        Route::get('/{payment}', [PaymentController::class, 'show'])
            ->middleware('permission:sales.payments.view')
            ->name('show');

        Route::get('/{payment}/edit', [PaymentController::class, 'edit'])
            ->middleware('permission:sales.payments.edit')
            ->name('edit');

        Route::put('/{payment}', [PaymentController::class, 'update'])
            ->middleware('permission:sales.payments.edit')
            ->name('update');

        Route::delete('/{payment}', [PaymentController::class, 'destroy'])
            ->middleware('permission:sales.payments.delete')
            ->name('destroy');

        Route::get('/{payment}/download', [PaymentController::class, 'download'])
            ->middleware(['permission:sales.payments.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');
    });

    // ─── Credit Notes ─────────────────────────────────────────────
    Route::prefix('credit-notes')->as('credit-notes.')->group(function () {
        Route::get('/', [CreditNoteController::class, 'index'])
            ->middleware('permission:sales.credit_notes.view')
            ->name('index');

        Route::get('/create', [CreditNoteController::class, 'create'])
            ->middleware('permission:sales.credit_notes.create')
            ->name('create');

        Route::post('/', [CreditNoteController::class, 'store'])
            ->middleware('permission:sales.credit_notes.create')
            ->name('store');

        Route::get('/{creditNote}', [CreditNoteController::class, 'show'])
            ->middleware('permission:sales.credit_notes.view')
            ->name('show');

        Route::get('/{creditNote}/edit', [CreditNoteController::class, 'edit'])
            ->middleware('permission:sales.credit_notes.edit')
            ->name('edit');

        Route::put('/{creditNote}', [CreditNoteController::class, 'update'])
            ->middleware('permission:sales.credit_notes.edit')
            ->name('update');

        Route::delete('/{creditNote}', [CreditNoteController::class, 'destroy'])
            ->middleware('permission:sales.credit_notes.delete')
            ->name('destroy');

        Route::post('/{creditNote}/apply', [CreditNoteController::class, 'apply'])
            ->middleware('permission:sales.credit_notes.edit')
            ->name('apply');

        Route::get('/{creditNote}/download', [CreditNoteController::class, 'download'])
            ->middleware(['permission:sales.credit_notes.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');

        Route::post('/{creditNote}/send', [CreditNoteController::class, 'send'])
            ->middleware('permission:sales.credit_notes.edit')
            ->name('send');
    });

    // ─── Delivery Challans ────────────────────────────────────────
    Route::prefix('delivery-challans')->as('delivery-challans.')->group(function () {
        Route::get('/', [DeliveryChallanController::class, 'index'])
            ->middleware('permission:sales.delivery_challans.view')
            ->name('index');

        Route::get('/create', [DeliveryChallanController::class, 'create'])
            ->middleware('permission:sales.delivery_challans.create')
            ->name('create');

        Route::post('/', [DeliveryChallanController::class, 'store'])
            ->middleware('permission:sales.delivery_challans.create')
            ->name('store');

        Route::get('/{deliveryChallan}', [DeliveryChallanController::class, 'show'])
            ->middleware('permission:sales.delivery_challans.view')
            ->name('show');

        Route::get('/{deliveryChallan}/edit', [DeliveryChallanController::class, 'edit'])
            ->middleware('permission:sales.delivery_challans.edit')
            ->name('edit');

        Route::put('/{deliveryChallan}', [DeliveryChallanController::class, 'update'])
            ->middleware('permission:sales.delivery_challans.edit')
            ->name('update');

        Route::delete('/{deliveryChallan}', [DeliveryChallanController::class, 'destroy'])
            ->middleware('permission:sales.delivery_challans.delete')
            ->name('destroy');

        Route::get('/{deliveryChallan}/download', [DeliveryChallanController::class, 'download'])
            ->middleware(['permission:sales.delivery_challans.view', 'plan.limit:exports_per_month', 'throttle:pdf-download'])
            ->name('download');

        Route::post('/{deliveryChallan}/send', [DeliveryChallanController::class, 'send'])
            ->middleware('permission:sales.delivery_challans.edit')
            ->name('send');
    });

    // ─── Refunds ──────────────────────────────────────────────────
    Route::prefix('refunds')->as('refunds.')->group(function () {
        Route::get('/', [RefundController::class, 'index'])
            ->middleware('permission:sales.refunds.view')
            ->name('index');

        Route::get('/create', [RefundController::class, 'create'])
            ->middleware('permission:sales.refunds.create')
            ->name('create');

        Route::post('/', [RefundController::class, 'store'])
            ->middleware('permission:sales.refunds.create')
            ->name('store');

        Route::get('/{refund}', [RefundController::class, 'show'])
            ->middleware('permission:sales.refunds.view')
            ->name('show');

        Route::get('/{refund}/edit', [RefundController::class, 'edit'])
            ->middleware('permission:sales.refunds.edit')
            ->name('edit');

        Route::put('/{refund}', [RefundController::class, 'update'])
            ->middleware('permission:sales.refunds.edit')
            ->name('update');

        Route::delete('/{refund}', [RefundController::class, 'destroy'])
            ->middleware('permission:sales.refunds.delete')
            ->name('destroy');
    });
});
