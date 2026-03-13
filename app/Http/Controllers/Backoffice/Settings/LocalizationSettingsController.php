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

        $data = $request->validated();

        // Map 'locale' form field to 'language' key (used by SetTenantContext middleware)
        if (isset($data['locale'])) {
            $data['language'] = $data['locale'];
            unset($data['locale']);
        }

        $setting->localization_settings = array_merge(
            $setting->localization_settings ?? [],
            $data
        );
        $setting->save();

        // Apply locale and timezone immediately for this request
        if (isset($data['language'])) {
            app()->setLocale($data['language']);
        } elseif ($request->filled('locale')) {
            app()->setLocale($request->input('locale'));
        }
        if ($request->filled('timezone')) {
            config(['app.timezone' => $request->input('timezone')]);
        }

        return redirect()->route('bo.settings.locale.edit')
            ->with('success', __('Paramètres de localisation mis à jour avec succès.'));
    }
}
