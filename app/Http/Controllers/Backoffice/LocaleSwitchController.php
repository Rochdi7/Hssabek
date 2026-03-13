<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class LocaleSwitchController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'locale' => ['required', 'string', 'in:fr,en,ar'],
        ]);

        $locale = $request->input('locale');
        $tenant = TenantContext::get();

        if ($tenant) {
            $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);
            $localization = $setting->localization_settings ?? [];
            $localization['language'] = $locale;
            $setting->localization_settings = $localization;
            $setting->save();
        }

        app()->setLocale($locale);

        return redirect()->back();
    }
}
