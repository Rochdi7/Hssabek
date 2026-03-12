<?php

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/features', [PageController::class, 'features'])->name('features');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSend'])->name('contact.send');

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
