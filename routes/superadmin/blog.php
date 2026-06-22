<?php

use App\Http\Controllers\SuperAdmin\Blog\BlogCategoryController;
use App\Http\Controllers\SuperAdmin\Blog\BlogPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin — Blog Management Routes
|--------------------------------------------------------------------------
*/

Route::prefix('blog')->as('blog.')->group(function () {

    // Blog posts
    Route::prefix('posts')->as('posts.')->group(function () {
        Route::get('/', [BlogPostController::class, 'index'])->name('index');
        Route::get('/create', [BlogPostController::class, 'create'])->name('create');
        Route::post('/', [BlogPostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [BlogPostController::class, 'edit'])->name('edit');
        Route::put('/{post}', [BlogPostController::class, 'update'])->name('update');
        Route::delete('/{post}', [BlogPostController::class, 'destroy'])->name('destroy');
    });

    // Blog categories
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('index');
        Route::post('/', [BlogCategoryController::class, 'store'])->name('store');
        Route::put('/{category}', [BlogCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [BlogCategoryController::class, 'destroy'])->name('destroy');
    });
});
