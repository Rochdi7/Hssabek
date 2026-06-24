<?php

use App\Http\Controllers\Backoffice\Inventory\WarehouseController;
use App\Http\Controllers\Backoffice\Inventory\ProductStockController;
use App\Http\Controllers\Backoffice\Inventory\StockMovementController;
use App\Http\Controllers\Backoffice\Inventory\StockTransferController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Inventory Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('inventory')->as('inventory.')->group(function () {

    // Warehouses
    Route::prefix('warehouses')->as('warehouses.')->group(function () {
        Route::get('/', [WarehouseController::class, 'index'])
            ->middleware('permission:inventory.warehouses.view')
            ->name('index');

        Route::get('/create', [WarehouseController::class, 'create'])
            ->middleware(['permission:inventory.warehouses.create', 'plan.limit:warehouses'])
            ->name('create');

        Route::post('/', [WarehouseController::class, 'store'])
            ->middleware(['permission:inventory.warehouses.create', 'plan.limit:warehouses'])
            ->name('store');

        Route::get('/{warehouse}', [WarehouseController::class, 'show'])
            ->middleware('permission:inventory.warehouses.view')
            ->name('show');

        Route::get('/{warehouse}/edit', [WarehouseController::class, 'edit'])
            ->middleware('permission:inventory.warehouses.edit')
            ->name('edit');

        Route::put('/{warehouse}', [WarehouseController::class, 'update'])
            ->middleware('permission:inventory.warehouses.edit')
            ->name('update');

        Route::delete('/{warehouse}', [WarehouseController::class, 'destroy'])
            ->middleware('permission:inventory.warehouses.delete')
            ->name('destroy');
    });

    // Stock Levels
    Route::get('stock', [ProductStockController::class, 'index'])
        ->middleware('permission:inventory.stock_movements.view')
        ->name('stock.index');
    Route::patch('stock/{productStock}/reorder', [ProductStockController::class, 'updateReorder'])
        ->middleware('permission:inventory.stock_movements.create')
        ->name('stock.reorder');

    // Stock Movements
    Route::prefix('movements')->as('movements.')->group(function () {
        Route::get('/', [StockMovementController::class, 'index'])
            ->middleware('permission:inventory.stock_movements.view')
            ->name('index');

        Route::get('/create', [StockMovementController::class, 'create'])
            ->middleware('permission:inventory.stock_movements.create')
            ->name('create');

        Route::get('/stock-level', [StockMovementController::class, 'stockLevel'])
            ->middleware('permission:inventory.stock_movements.view')
            ->name('stock-level');

        Route::post('/', [StockMovementController::class, 'store'])
            ->middleware('permission:inventory.stock_movements.create')
            ->name('store');
    });

    // Stock Transfers
    Route::prefix('transfers')->as('transfers.')->group(function () {
        Route::get('/', [StockTransferController::class, 'index'])
            ->middleware('permission:inventory.stock_transfers.view')
            ->name('index');

        Route::get('/create', [StockTransferController::class, 'create'])
            ->middleware('permission:inventory.stock_transfers.create')
            ->name('create');

        Route::post('/', [StockTransferController::class, 'store'])
            ->middleware('permission:inventory.stock_transfers.create')
            ->name('store');

        Route::get('/{transfer}', [StockTransferController::class, 'show'])
            ->middleware('permission:inventory.stock_transfers.view')
            ->name('show');

        Route::get('/{transfer}/edit', [StockTransferController::class, 'edit'])
            ->middleware('permission:inventory.stock_transfers.edit')
            ->name('edit');

        Route::put('/{transfer}', [StockTransferController::class, 'update'])
            ->middleware('permission:inventory.stock_transfers.edit')
            ->name('update');

        Route::post('/{transfer}/execute', [StockTransferController::class, 'execute'])
            ->middleware('permission:inventory.stock_transfers.create')
            ->name('execute');

        Route::delete('/{transfer}', [StockTransferController::class, 'destroy'])
            ->middleware('permission:inventory.stock_transfers.delete')
            ->name('destroy');
    });
});
