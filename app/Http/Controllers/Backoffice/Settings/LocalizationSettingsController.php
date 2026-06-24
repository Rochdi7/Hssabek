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

        $tenant = TenantContext::require();
        $settings = $tenant->settings;
        $currencies = Currency::orderBy('name')->get();

        return view('backoffice.settings.locale', compact('settings', 'currencies'));
    }

    public function update(UpdateLocalizationSettingsRequest $request)
    {
        $this->authorize('editLocale', TenantSetting::class);

        $tenant = TenantContext::require();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $data = $request->validated();

        // Runtime reads `language` key; locale is the form field name.
        if (isset($data['locale'])) {
            $data['language'] = $data['locale'];
        }

        $setting->localization_settings = array_merge(
            $setting->localization_settings ?? [],
            $data
        );

        // Also sync currency into account_settings so SetTenantContext picks it up.
        if (isset($data['currency'])) {
            $setting->account_settings = array_merge(
                $setting->account_settings ?? [],
                ['default_currency' => $data['currency']]
            );
        }

        $setting->save();

        // Sync timezone and currency to tenant table columns (fallback path in SetTenantContext).
        $tenantUpdates = [];
        if (!empty($data['timezone'])) {
            $tenantUpdates['timezone'] = $data['timezone'];
        }
        if (!empty($data['currency'])) {
            $tenantUpdates['default_currency'] = $data['currency'];
        }
        if ($tenantUpdates) {
            $tenant->update($tenantUpdates);
            // Refresh the TenantContext singleton so the in-memory tenant reflects the new values.
            $tenant->refresh();
            TenantContext::set($tenant);
        }

        // Apply immediately for this request.
        if (!empty($data['language'])) {
            app()->setLocale($data['language']);
        }
        if (!empty($data['timezone'])) {
            config(['app.timezone' => $data['timezone']]);
            date_default_timezone_set($data['timezone']);
        }
        if (!empty($data['currency'])) {
            config(['app.currency' => $data['currency']]);
        }
        if (!empty($data['date_format'])) {
            config(['app.date_format' => $data['date_format']]);
        }
        if (!empty($data['time_format'])) {
            config(['app.time_format' => $data['time_format']]);
        }

        return redirect()->route('bo.settings.locale.edit')
            ->with('success', __('Paramètres de localisation mis à jour avec succès.'));
    }
}
