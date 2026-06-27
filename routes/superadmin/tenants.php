<?php

use App\Http\Controllers\SuperAdmin\TenantManagementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin — Tenant Management Routes
|--------------------------------------------------------------------------
*/

Route::prefix('tenants')->as('tenants.')->group(function () {
    Route::get('/', [TenantManagementController::class, 'index'])->name('index');
    Route::get('/free-trials', [TenantManagementController::class, 'freeTrials'])->name('free-trials');
    Route::get('/create', [TenantManagementController::class, 'create'])->name('create');
    Route::post('/', [TenantManagementController::class, 'store'])->name('store');
    Route::get('/{tenant}', [TenantManagementController::class, 'show'])->name('show');
    Route::get('/{tenant}/edit', [TenantManagementController::class, 'edit'])->name('edit');
    Route::put('/{tenant}', [TenantManagementController::class, 'update'])->name('update');
    Route::delete('/{tenant}', [TenantManagementController::class, 'destroy'])->name('destroy');
    Route::post('/{tenant}/suspend', [TenantManagementController::class, 'suspend'])->name('suspend');
    Route::post('/{tenant}/activate', [TenantManagementController::class, 'activate'])->name('activate');
    Route::get('/{tenant}/usage', [TenantManagementController::class, 'usage'])->name('usage');
    Route::put('/{tenant}/usage', [TenantManagementController::class, 'updateLimits'])->name('usage.update');
});
