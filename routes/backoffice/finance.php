<?php

use App\Http\Controllers\Backoffice\Finance\ExpenseController;
use App\Http\Controllers\Backoffice\Finance\IncomeController;
use App\Http\Controllers\Backoffice\Finance\FinanceCategoryController;
use App\Http\Controllers\Backoffice\Finance\LoanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backoffice Finance Routes (Tenant)
|--------------------------------------------------------------------------
*/

Route::prefix('finance')->as('finance.')->group(function () {

    // Bank Accounts — MODULE REMOVED (Comptes bancaires no longer part of the workflow).
    // Routes disabled; BankAccountController + table kept only for historical-data safety.

    // Expenses
    Route::prefix('expenses')->as('expenses.')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->middleware('permission:finance.expenses.view')->name('index');
        Route::get('/create', [ExpenseController::class, 'create'])->middleware('permission:finance.expenses.create')->name('create');
        Route::post('/', [ExpenseController::class, 'store'])->middleware('permission:finance.expenses.create')->name('store');
        Route::get('/{expense}', [ExpenseController::class, 'show'])->middleware('permission:finance.expenses.view')->name('show');
        Route::get('/{expense}/edit', [ExpenseController::class, 'edit'])->middleware('permission:finance.expenses.edit')->name('edit');
        Route::put('/{expense}', [ExpenseController::class, 'update'])->middleware('permission:finance.expenses.edit')->name('update');
        Route::post('/{expense}/payments', [ExpenseController::class, 'addPayment'])->middleware('permission:finance.expenses.edit')->name('payments.store');
        Route::delete('/{expense}', [ExpenseController::class, 'destroy'])->middleware('permission:finance.expenses.delete')->name('destroy');
    });

    // Incomes
    Route::prefix('incomes')->as('incomes.')->group(function () {
        Route::get('/', [IncomeController::class, 'index'])->middleware('permission:finance.incomes.view')->name('index');
        Route::get('/create', [IncomeController::class, 'create'])->middleware('permission:finance.incomes.create')->name('create');
        Route::post('/', [IncomeController::class, 'store'])->middleware('permission:finance.incomes.create')->name('store');
        Route::get('/{income}/edit', [IncomeController::class, 'edit'])->middleware('permission:finance.incomes.edit')->name('edit');
        Route::put('/{income}', [IncomeController::class, 'update'])->middleware('permission:finance.incomes.edit')->name('update');
        Route::delete('/{income}', [IncomeController::class, 'destroy'])->middleware('permission:finance.incomes.delete')->name('destroy');
    });

    // Finance Categories
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [FinanceCategoryController::class, 'index'])->middleware('permission:finance.categories.view')->name('index');
        Route::get('/create', [FinanceCategoryController::class, 'create'])->middleware('permission:finance.categories.create')->name('create');
        Route::post('/', [FinanceCategoryController::class, 'store'])->middleware('permission:finance.categories.create')->name('store');
        Route::get('/{finance_category}/edit', [FinanceCategoryController::class, 'edit'])->middleware('permission:finance.categories.edit')->name('edit');
        Route::put('/{finance_category}', [FinanceCategoryController::class, 'update'])->middleware('permission:finance.categories.edit')->name('update');
        Route::delete('/{finance_category}', [FinanceCategoryController::class, 'destroy'])->middleware('permission:finance.categories.delete')->name('destroy');
    });

    // Currencies — REMOVED: managed via Settings > Currencies (bo.settings.currencies.*)
    // See routes/backoffice/settings.php for the canonical currency management routes.

    // Money Transfers — MODULE REMOVED (depended on Bank Accounts, no longer part of the workflow).

    // Loans
    Route::prefix('loans')->as('loans.')->group(function () {
        Route::get('/', [LoanController::class, 'index'])->middleware('permission:finance.loans.view')->name('index');
        Route::get('/create', [LoanController::class, 'create'])->middleware('permission:finance.loans.create')->name('create');
        Route::post('/', [LoanController::class, 'store'])->middleware('permission:finance.loans.create')->name('store');
        Route::get('/{loan}', [LoanController::class, 'show'])->middleware('permission:finance.loans.view')->name('show');
        Route::get('/{loan}/edit', [LoanController::class, 'edit'])->middleware('permission:finance.loans.edit')->name('edit');
        Route::put('/{loan}', [LoanController::class, 'update'])->middleware('permission:finance.loans.edit')->name('update');
        Route::post('/{loan}/payments', [LoanController::class, 'addPayment'])->middleware('permission:finance.loans.edit')->name('payments.store');
        Route::delete('/{loan}/payments/{payment}', [LoanController::class, 'deletePayment'])->middleware('permission:finance.loans.edit')->name('payments.destroy');
        Route::delete('/{loan}', [LoanController::class, 'destroy'])->middleware('permission:finance.loans.delete')->name('destroy');
    });
});
