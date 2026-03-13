<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateCompanySettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Str;

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

        // Exclude image fields from company_settings JSON
        $imageFields = array_merge(
            self::IMAGE_COLLECTIONS,
            array_map(fn($c) => "delete_{$c}", self::IMAGE_COLLECTIONS),
            ['cropped_logo', 'cropped_logo_deleted']
        );
        $companyData = $request->safe()->except($imageFields);

        $setting->company_settings = array_merge(
            $setting->company_settings ?? [],
            $companyData
        );
        $setting->save();

        // Handle cropped logo (base64 from avatar-cropper component, if still used)
        if ($request->filled('cropped_logo')) {
            $this->handleBase64Image($tenant, 'logo', $request->input('cropped_logo'));
        } elseif ($request->input('cropped_logo_deleted') === '1') {
            $tenant->clearMediaCollection('logo');
        }

        // Handle file uploads for all image collections
        foreach (self::IMAGE_COLLECTIONS as $collection) {
            if ($request->hasFile($collection)) {
                $tenant->clearMediaCollection($collection);
                $tenant->addMediaFromRequest($collection)->toMediaCollection($collection);
            } elseif ($request->input("delete_{$collection}") === '1') {
                $tenant->clearMediaCollection($collection);
            }
        }

        return redirect()->route('bo.settings.company.edit')
            ->with('success', __("Paramètres de l'entreprise mis à jour avec succès."));
    }

    private function handleBase64Image($tenant, string $collection, string $base64): void
    {
        $data = substr($base64, strpos($base64, ',') + 1);
        $decoded = base64_decode($data);

        preg_match('/^data:image\/(\w+);/', $base64, $matches);
        $ext = $matches[1] ?? 'png';
        if ($ext === 'jpeg') {
            $ext = 'jpg';
        }

        $fileName = $collection . '-' . Str::random(8) . '.' . $ext;
        $tmpPath = sys_get_temp_dir() . '/' . $fileName;
        file_put_contents($tmpPath, $decoded);

        $tenant->clearMediaCollection($collection);
        $tenant->addMedia($tmpPath)
            ->usingFileName($fileName)
            ->toMediaCollection($collection);
    }
}
