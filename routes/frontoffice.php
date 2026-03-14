<?php

use App\Http\Controllers\Web\LocaleSwitchController;
use App\Http\Controllers\Web\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontoffice Routes (Public Website)
|--------------------------------------------------------------------------
|
| Landing pages, pricing, features, legal, help & support.
| All routes are public (no authentication required).
|
*/

// Language switch
Route::post('/locale/switch', LocaleSwitchController::class)->name('locale.switch');

Route::middleware(['setFrontofficeLocale'])->group(function () {

    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
    Route::get('/features', [PageController::class, 'features'])->name('features');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'contactSend'])->name('contact.send');

    // Account Request
    Route::get('/demande-compte', [PageController::class, 'requestAccount'])->name('request-account');
    Route::post('/demande-compte', [PageController::class, 'requestAccountSend'])->name('request-account.send');

    // Newsletter
    Route::post('/newsletter/subscribe', [PageController::class, 'newsletterSubscribe'])->name('newsletter.subscribe');

    // Legal pages
    Route::get('/conditions-utilisation', [PageController::class, 'terms'])->name('terms');
    Route::get('/politique-confidentialite', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/mentions-legales', [PageController::class, 'legal'])->name('legal');

    // Help & Support pages
    Route::get('/centre-aide', [PageController::class, 'helpCenter'])->name('help-center');
    Route::get('/support', [PageController::class, 'support'])->name('support');
    Route::get('/faq', [PageController::class, 'faq'])->name('faq');

});
