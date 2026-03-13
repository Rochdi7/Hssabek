<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateBarcodeSettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;

class BarcodeSettingsController extends Controller
{
    public function edit()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        return view('backoffice.settings.barcode', compact('settings'));
    }

    public function update(UpdateBarcodeSettingsRequest $request)
    {
        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $modules = $setting->modules_settings ?? [];
        $modules['barcode'] = [
            'show_package_date' => $request->boolean('show_package_date'),
            'show_product_name' => $request->boolean('show_product_name'),
            'mrp_label' => $request->input('mrp_label', 'MRP'),
            'product_name_font_size' => (int) $request->input('product_name_font_size', 16),
            'mrp_font_size' => (int) $request->input('mrp_font_size', 16),
            'barcode_size' => (int) $request->input('barcode_size', 10),
        ];
        $setting->modules_settings = $modules;
        $setting->save();

        return redirect()->route('bo.settings.barcode.edit')
            ->with('success', __('Paramètres de code-barres mis à jour avec succès.'));
    }
}
