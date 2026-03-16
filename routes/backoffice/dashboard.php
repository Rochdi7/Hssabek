<?php

use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\GlobalSearchController;
use App\Http\Controllers\Backoffice\SetupWizardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::post('/setup-wizard', [SetupWizardController::class, 'store'])
    ->name('setup-wizard.store');

Route::get('/search', GlobalSearchController::class)
    ->name('global-search');
