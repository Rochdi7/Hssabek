<?php

use App\Http\Controllers\Backoffice\Support\SupportTicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Support Tickets (Backoffice)
|--------------------------------------------------------------------------
*/

Route::prefix('support')->as('support.')->group(function () {
    Route::prefix('tickets')->as('tickets.')->group(function () {
        Route::get('/', [SupportTicketController::class, 'index'])->name('index');
        Route::get('/create', [SupportTicketController::class, 'create'])->name('create');
        Route::post('/', [SupportTicketController::class, 'store'])->name('store');
        Route::get('/{ticket}', [SupportTicketController::class, 'show'])->name('show');
        Route::get('/{ticket}/attachments/{media}', [SupportTicketController::class, 'attachment'])->name('attachments.show');
        Route::post('/{ticket}/reply', [SupportTicketController::class, 'reply'])->name('reply');
    });
});
