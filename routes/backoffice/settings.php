<?php

use App\Http\Controllers\Backoffice\AccountSettingsController;
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
