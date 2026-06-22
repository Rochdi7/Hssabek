<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateInvoiceSettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use App\Support\Security\Base64Image;

class InvoiceSettingsController extends Controller
{
    public function edit()
    {
        $this->authorize('viewInvoice', TenantSetting::class);

        $tenant = TenantContext::require();
        $settings = $tenant->settings;

        return view('backoffice.settings.invoice', compact('settings', 'tenant'));
    }

    public function update(UpdateInvoiceSettingsRequest $request)
    {
        $this->authorize('editInvoice', TenantSetting::class);

        $tenant = TenantContext::require();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $invoiceData = $request->safe()->except(['cropped_invoice_image', 'cropped_invoice_image_deleted']);

        $setting->invoice_settings = array_merge($setting->invoice_settings ?? [], $invoiceData);
        $setting->save();

        if ($request->filled('cropped_invoice_image')) {
            Base64Image::attachToMediaCollection(
                $tenant,
                'invoice_image',
                $request->input('cropped_invoice_image'),
                prefix: 'invoice-image',
                maxKilobytes: 2048,
                clearExisting: true,
            );
        } elseif ($request->input('cropped_invoice_image_deleted') === '1') {
            $tenant->clearMediaCollection('invoice_image');
        }

        return redirect()->route('bo.settings.invoice.edit')
            ->with('success', __('Parametres de facturation mis a jour avec succes.'));
    }
}
