<?php

use App\Http\Controllers\SuperAdmin\ContactMessageController;
use App\Http\Controllers\SuperAdmin\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Contact Messages & Newsletter (SuperAdmin)
|--------------------------------------------------------------------------
*/

// Contact Messages
Route::prefix('contact-messages')->as('contact-messages.')->group(function () {
    Route::get('/', [ContactMessageController::class, 'index'])->name('index');
    Route::get('/{contactMessage}', [ContactMessageController::class, 'show'])->name('show');
    Route::patch('/{contactMessage}/status', [ContactMessageController::class, 'updateStatus'])->name('update-status');
    Route::delete('/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('destroy');
});

// Newsletter Subscribers
Route::prefix('newsletter')->as('newsletter.')->group(function () {
    Route::get('/', [NewsletterController::class, 'index'])->name('index');
    Route::get('/export', [NewsletterController::class, 'export'])->name('export');
    Route::patch('/{subscriber}/toggle', [NewsletterController::class, 'toggleStatus'])->name('toggle');
    Route::delete('/{subscriber}', [NewsletterController::class, 'destroy'])->name('destroy');
});
