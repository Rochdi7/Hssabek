<?php

use App\Http\Controllers\Backoffice\ExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Export Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::get('/export/{type}', [ExportController::class, 'export'])
    ->where('type', '[a-z\-]+')
    ->middleware(['plan.limit:exports_per_month', 'throttle:pdf-download'])
    ->name('export');
