<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Services\Tenancy\TenantContext;

class SecuritySettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        return view('backoffice.settings.security', compact('user', 'settings'));
    }
}
