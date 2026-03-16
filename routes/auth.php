<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/**
 * Public Authentication Routes
 * Single-domain SaaS: no tenant identification needed for auth pages.
 * Tenant context is set after login via the user's tenant_id.
 */

Route::middleware(['web'])->group(function () {

    // Public auth routes (accessible to non-authenticated users)
    Route::middleware('guest')->group(function () {
        // Login routes
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:login');

        // Register routes (if enabled)
        Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->middleware('throttle:registration');

        // Password reset routes
        Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email')->middleware('throttle:password-reset');

        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update')->middleware('throttle:password-reset');
    });

    // Protected auth routes (accessible to authenticated users)
    Route::middleware('auth')->group(function () {
        // Logout route
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

        // Email verification routes
        Route::get('/email/verify', [EmailVerificationController::class, 'showVerificationNotice'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware('throttle:verification-resend')->name('verification.send');

        // Lock screen route (optional)
        Route::get('/lock-screen', function () {
            $locale = app()->getLocale();
            $view = $locale !== 'fr' && view()->exists("{$locale}.auth.lock-screen")
                ? "{$locale}.auth.lock-screen"
                : 'auth.lock-screen';
            return view($view);
        })->name('lock-screen');

        // Two-step verification route (placeholder)
        Route::get('/two-step', function () {
            $locale = app()->getLocale();
            $view = $locale !== 'fr' && view()->exists("{$locale}.auth.two-step")
                ? "{$locale}.auth.two-step"
                : 'auth.two-step';
            return view($view);
        })->name('two-step');
    });
});
