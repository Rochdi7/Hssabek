<?php

use App\Http\Controllers\Backoffice\Users\UserController;
use App\Http\Controllers\Backoffice\Users\UserInvitationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice User Management Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('users')->as('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])
        ->middleware('permission:access.users.view')
        ->name('index');

    Route::get('/{user}/edit', [UserController::class, 'edit'])
        ->middleware('permission:access.users.edit')
        ->name('edit');

    Route::put('/{user}', [UserController::class, 'update'])
        ->middleware('permission:access.users.edit')
        ->name('update');

    Route::post('/{user}/activate', [UserController::class, 'activate'])
        ->middleware('permission:access.users.edit')
        ->name('activate');

    Route::post('/{user}/deactivate', [UserController::class, 'deactivate'])
        ->middleware('permission:access.users.edit')
        ->name('deactivate');

    // Invitations
    Route::post('/invite', [UserInvitationController::class, 'store'])
        ->middleware(['permission:access.users.create', 'plan.limit:users', 'throttle:user-invitation'])
        ->name('invite.store');

    Route::delete('/invite/{invitation}', [UserInvitationController::class, 'destroy'])
        ->middleware('permission:access.users.create')
        ->name('invite.destroy');
});
