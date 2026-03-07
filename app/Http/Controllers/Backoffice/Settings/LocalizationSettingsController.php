<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateLocalizationSettingsRequest;
use App\Models\Finance\Currency;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;

class LocalizationSettingsController extends Controller
{
    public function edit()
    {
        $this->authorize('viewLocale', TenantSetting::class);

        $tenant = TenantContext::get();
        $settings = $tenant->settings;
        $currencies = Currency::orderBy('name')->get();

        return view('backoffice.settings.locale', compact('settings', 'currencies'));
    }

    public function update(UpdateLocalizationSettingsRequest $request)
    {
        $this->authorize('editLocale', TenantSetting::class);

        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $setting->localization_settings = array_merge(
            $setting->localization_settings ?? [],
            $request->validated()
        );
        $setting->save();

        // Apply locale and timezone immediately
        if ($request->filled('locale')) {
            app()->setLocale($request->input('locale'));
        }
        if ($request->filled('timezone')) {
            config(['app.timezone' => $request->input('timezone')]);
        }

        return redirect()->route('bo.settings.locale.edit')
            ->with('success', 'Paramètres de localisation mis à jour avec succès.');
    }
}
