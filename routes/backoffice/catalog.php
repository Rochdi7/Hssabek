<?php

use App\Http\Controllers\Backoffice\Catalog\ProductController;
use App\Http\Controllers\Backoffice\Catalog\ProductCategoryController;
use App\Http\Controllers\Backoffice\Catalog\UnitController;
use App\Http\Controllers\Backoffice\Catalog\TaxGroupController;
use App\Http\Controllers\Backoffice\Catalog\TaxCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Catalog Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('catalog')->as('catalog.')->group(function () {

    // ─── Products ───────────────────────────────────────────────
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])
            ->middleware('permission:inventory.products.view')
            ->name('index');

        Route::get('/create', [ProductController::class, 'create'])
            ->middleware(['permission:inventory.products.create', 'plan.limit:products'])
            ->name('create');

        Route::post('/', [ProductController::class, 'store'])
            ->middleware(['permission:inventory.products.create', 'plan.limit:products'])
            ->name('store');

        Route::get('/{product}', [ProductController::class, 'show'])
            ->middleware('permission:inventory.products.view')
            ->name('show');

        Route::get('/{product}/edit', [ProductController::class, 'edit'])
            ->middleware('permission:inventory.products.edit')
            ->name('edit');

        Route::put('/{product}', [ProductController::class, 'update'])
            ->middleware('permission:inventory.products.edit')
            ->name('update');

        Route::delete('/{product}', [ProductController::class, 'destroy'])
            ->middleware('permission:inventory.products.delete')
            ->name('destroy');

        Route::get('/{product}/stock-history', [ProductController::class, 'stockHistory'])
            ->middleware('permission:inventory.stock_movements.view')
            ->name('stock-history');

        Route::post('/{product}/stock-in', [ProductController::class, 'stockIn'])
            ->middleware('permission:inventory.stock_movements.create')
            ->name('stock-in');

        Route::post('/{product}/stock-out', [ProductController::class, 'stockOut'])
            ->middleware('permission:inventory.stock_movements.create')
            ->name('stock-out');

        Route::get('/{product}/warehouse-stock', [ProductController::class, 'warehouseStock'])
            ->middleware('permission:inventory.stock_movements.view')
            ->name('warehouse-stock');
    });

    // ─── Categories ─────────────────────────────────────────────
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index'])
            ->middleware('permission:inventory.products.view')
            ->name('index');

        Route::post('/', [ProductCategoryController::class, 'store'])
            ->middleware('permission:inventory.products.create')
            ->name('store');

        Route::put('/{category}', [ProductCategoryController::class, 'update'])
            ->middleware('permission:inventory.products.edit')
            ->name('update');

        Route::delete('/{category}', [ProductCategoryController::class, 'destroy'])
            ->middleware('permission:inventory.products.delete')
            ->name('destroy');
    });

    // ─── Units ──────────────────────────────────────────────────
    Route::prefix('units')->as('units.')->group(function () {
        Route::get('/', [UnitController::class, 'index'])
            ->middleware('permission:inventory.products.view')
            ->name('index');

        Route::post('/', [UnitController::class, 'store'])
            ->middleware('permission:inventory.products.create')
            ->name('store');

        Route::put('/{unit}', [UnitController::class, 'update'])
            ->middleware('permission:inventory.products.edit')
            ->name('update');

        Route::delete('/{unit}', [UnitController::class, 'destroy'])
            ->middleware('permission:inventory.products.delete')
            ->name('destroy');
    });

    // ─── Tax Rates (combined page) ─────────────────────────────
    Route::get('/tax-rates', [TaxGroupController::class, 'index'])
        ->middleware('permission:inventory.products.view')
        ->name('tax-rates.index');

    // Tax Categories (modal CRUD on tax-rates page)
    Route::prefix('tax-categories')->as('tax-categories.')->group(function () {
        Route::post('/', [TaxCategoryController::class, 'store'])
            ->middleware('permission:inventory.products.create')
            ->name('store');

        Route::put('/{tax_category}', [TaxCategoryController::class, 'update'])
            ->middleware('permission:inventory.products.edit')
            ->name('update');

        Route::delete('/{tax_category}', [TaxCategoryController::class, 'destroy'])
            ->middleware('permission:inventory.products.delete')
            ->name('destroy');
    });

    // Tax Groups (modal CRUD on tax-rates page)
    Route::prefix('tax-groups')->as('tax-groups.')->group(function () {
        Route::post('/', [TaxGroupController::class, 'store'])
            ->middleware('permission:inventory.products.create')
            ->name('store');

        Route::put('/{tax_group}', [TaxGroupController::class, 'update'])
            ->middleware('permission:inventory.products.edit')
            ->name('update');

        Route::delete('/{tax_group}', [TaxGroupController::class, 'destroy'])
            ->middleware('permission:inventory.products.delete')
            ->name('destroy');
    });
});
