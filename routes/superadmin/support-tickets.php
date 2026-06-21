<?php

use App\Http\Controllers\SuperAdmin\SupportTicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Support Tickets (SuperAdmin)
|--------------------------------------------------------------------------
*/

Route::prefix('support-tickets')->as('support-tickets.')->group(function () {
    Route::get('/', [SupportTicketController::class, 'index'])->name('index');
    Route::get('/{ticket}', [SupportTicketController::class, 'show'])->name('show');
    Route::get('/{ticket}/attachments/{media}', [SupportTicketController::class, 'attachment'])->name('attachments.show');
    Route::post('/{ticket}/reply', [SupportTicketController::class, 'reply'])->name('reply');
    Route::patch('/{ticket}/status', [SupportTicketController::class, 'updateStatus'])->name('update-status');
});
