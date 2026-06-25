<?php

use App\Http\Controllers\SuperAdmin\CampaignEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('campaign')->as('campaign.')->group(function () {
    Route::get('/compose', [CampaignEmailController::class, 'compose'])->name('compose');
    Route::post('/send', [CampaignEmailController::class, 'send'])->name('send');
    Route::get('/export', [CampaignEmailController::class, 'exportEmails'])->name('export');
});
