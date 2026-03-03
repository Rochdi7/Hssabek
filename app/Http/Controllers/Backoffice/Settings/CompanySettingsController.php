<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateCompanySettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Str;

class CompanySettingsController extends Controller
{
    public function edit()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        return view('backoffice.settings.company', compact('settings', 'tenant'));
    }

    public function update(UpdateCompanySettingsRequest $request)
    {
        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $companyData = $request->safe()->except(['cropped_logo', 'cropped_logo_deleted']);

        $setting->company_settings = array_merge(
            $setting->company_settings ?? [],
            $companyData
        );
        $setting->save();

        // Handle company logo via Spatie Media Library on tenant
        if ($request->filled('cropped_logo')) {
            $base64 = $request->input('cropped_logo');
            $data = substr($base64, strpos($base64, ',') + 1);
            $decoded = base64_decode($data);

            preg_match('/^data:image\/(\w+);/', $base64, $matches);
            $ext = $matches[1] ?? 'png';
            if ($ext === 'jpeg') {
                $ext = 'jpg';
            }

            $fileName = 'company-logo-' . Str::random(8) . '.' . $ext;
            $tmpPath = sys_get_temp_dir() . '/' . $fileName;
            file_put_contents($tmpPath, $decoded);

            $tenant->clearMediaCollection('logo');
            $tenant->addMedia($tmpPath)
                ->usingFileName($fileName)
                ->toMediaCollection('logo');
        } elseif ($request->input('cropped_logo_deleted') === '1') {
            $tenant->clearMediaCollection('logo');
        }

        return redirect()->route('bo.settings.company.edit')
            ->with('success', "Paramètres de l'entreprise mis à jour avec succès.");
    }
}
