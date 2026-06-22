<?php

use App\Http\Controllers\Backoffice\AccountSettingsController;
use App\Http\Controllers\Backoffice\Settings\DeleteAccountController;
use App\Http\Controllers\Backoffice\Settings\SecuritySettingsController;
use Illuminate\Support\Facades\Route;

Route::prefix('account/settings')->as('account.settings.')->group(function () {
    Route::get('/', [AccountSettingsController::class, 'edit'])->name('edit');
    Route::put('/', [AccountSettingsController::class, 'update'])->name('update');
    Route::put('/password', [AccountSettingsController::class, 'updatePassword'])->name('password');
    Route::put('/avatar', [AccountSettingsController::class, 'updateAvatar'])->name('avatar');
    Route::delete('/avatar', [AccountSettingsController::class, 'destroyAvatar'])->name('avatar.destroy');
});

Route::prefix('settings/security')->as('settings.security.')->middleware('permission:settings.security.view')->group(function () {
    Route::get('/', [SecuritySettingsController::class, 'index'])->name('index');
    Route::delete('/sessions/{sessionId}', [SecuritySettingsController::class, 'revokeSession'])->middleware('permission:settings.security.edit')->name('revoke-session');
    Route::post('/deactivate', [SecuritySettingsController::class, 'deactivate'])->middleware('permission:settings.security.delete')->name('deactivate');
});

Route::post('settings/delete-account', [DeleteAccountController::class, 'store'])
    ->name('settings.delete-account.store');
