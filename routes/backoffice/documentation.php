<?php

use App\Http\Controllers\Backoffice\DocumentationController;
use Illuminate\Support\Facades\Route;

Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation.index');
