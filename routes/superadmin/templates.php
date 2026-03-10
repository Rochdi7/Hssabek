<?php

use App\Http\Controllers\SuperAdmin\TemplateAssignmentController;
use App\Http\Controllers\SuperAdmin\TemplateCatalogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin — Template Management Routes
|--------------------------------------------------------------------------
*/

// Template Assignment (existing)
Route::prefix('templates')->as('templates.')->group(function () {
    Route::get('/', [TemplateAssignmentController::class, 'index'])->name('index');
    Route::get('/{template}', [TemplateAssignmentController::class, 'show'])->name('show');
    Route::post('/{template}/assign', [TemplateAssignmentController::class, 'assign'])->name('assign');
    Route::post('/{template}/revoke', [TemplateAssignmentController::class, 'revoke'])->name('revoke');
    Route::post('/{template}/bulk-assign', [TemplateAssignmentController::class, 'bulkAssign'])->name('bulk-assign');
    Route::post('/{template}/toggle', [TemplateAssignmentController::class, 'toggleStatus'])->name('toggle');
});

// Template Catalog CRUD
Route::prefix('template-catalog')->as('template-catalog.')->group(function () {
    Route::get('/', [TemplateCatalogController::class, 'index'])->name('index');
    Route::get('/create', [TemplateCatalogController::class, 'create'])->name('create');
    Route::post('/', [TemplateCatalogController::class, 'store'])->name('store');
    Route::get('/{template_catalog}/edit', [TemplateCatalogController::class, 'edit'])->name('edit');
    Route::put('/{template_catalog}', [TemplateCatalogController::class, 'update'])->name('update');
    Route::delete('/{template_catalog}', [TemplateCatalogController::class, 'destroy'])->name('destroy');
});
