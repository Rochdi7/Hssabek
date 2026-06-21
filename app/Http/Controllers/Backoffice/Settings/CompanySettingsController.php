<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateCompanySettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use App\Support\Security\Base64Image;

class CompanySettingsController extends Controller
{
    private const IMAGE_COLLECTIONS = [
        'logo', 'dark_logo', 'mini_logo', 'dark_mini_logo', 'favicon', 'apple_icon',
    ];

    public function edit()
    {
        $this->authorize('viewCompany', TenantSetting::class);

        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        return view('backoffice.settings.company', compact('settings', 'tenant'));
    }

    public function update(UpdateCompanySettingsRequest $request)
    {
        $this->authorize('editCompany', TenantSetting::class);

        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $imageFields = array_merge(
            self::IMAGE_COLLECTIONS,
            array_map(fn ($collection) => "delete_{$collection}", self::IMAGE_COLLECTIONS),
            ['cropped_logo', 'cropped_logo_deleted', 'forme_juridique']
        );

        $companyData = $request->safe()->except($imageFields);

        if (isset($companyData['assujetti_tva'])) {
            $companyData['assujetti_tva'] = (bool) $companyData['assujetti_tva'];
        }

        if (isset($companyData['registration_number'])) {
            $companyData['rc'] = $companyData['registration_number'];
        }

        $companyData['forme_juridique'] = $request->input('forme_juridique');

        $setting->company_settings = array_merge($setting->company_settings ?? [], $companyData);
        $setting->save();

        if ($request->filled('forme_juridique')) {
            $tenant->update(['forme_juridique' => $request->input('forme_juridique')]);
        }

        if ($request->filled('cropped_logo')) {
            $this->handleBase64Image($tenant, 'logo', $request->input('cropped_logo'));
        } elseif ($request->input('cropped_logo_deleted') === '1') {
            $tenant->clearMediaCollection('logo');
        }

        foreach (self::IMAGE_COLLECTIONS as $collection) {
            if ($request->hasFile($collection)) {
                $tenant->clearMediaCollection($collection);
                $tenant->addMediaFromRequest($collection)->toMediaCollection($collection);
            } elseif ($request->input("delete_{$collection}") === '1') {
                $tenant->clearMediaCollection($collection);
            }
        }

        return redirect()->route('bo.settings.company.edit')
            ->with('success', __('Parametres de l\'entreprise mis a jour avec succes.'));
    }

    private function handleBase64Image($tenant, string $collection, string $base64): void
    {
        Base64Image::attachToMediaCollection(
            $tenant,
            $collection,
            $base64,
            prefix: $collection,
            maxKilobytes: 2048,
            clearExisting: true,
        );
    }
}
