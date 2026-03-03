<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateInvoiceSettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Str;

class InvoiceSettingsController extends Controller
{
    public function edit()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        return view('backoffice.settings.invoice', compact('settings', 'tenant'));
    }

    public function update(UpdateInvoiceSettingsRequest $request)
    {
        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $invoiceData = $request->safe()->except(['cropped_invoice_image', 'cropped_invoice_image_deleted']);

        $setting->invoice_settings = array_merge(
            $setting->invoice_settings ?? [],
            $invoiceData
        );
        $setting->save();

        // Handle invoice image via Spatie Media Library on tenant
        if ($request->filled('cropped_invoice_image')) {
            $base64 = $request->input('cropped_invoice_image');
            $data = substr($base64, strpos($base64, ',') + 1);
            $decoded = base64_decode($data);

            preg_match('/^data:image\/(\w+);/', $base64, $matches);
            $ext = $matches[1] ?? 'png';
            if ($ext === 'jpeg') {
                $ext = 'jpg';
            }

            $fileName = 'invoice-image-' . Str::random(8) . '.' . $ext;
            $tmpPath = sys_get_temp_dir() . '/' . $fileName;
            file_put_contents($tmpPath, $decoded);

            $tenant->clearMediaCollection('invoice_image');
            $tenant->addMedia($tmpPath)
                ->usingFileName($fileName)
                ->toMediaCollection('invoice_image');
        } elseif ($request->input('cropped_invoice_image_deleted') === '1') {
            $tenant->clearMediaCollection('invoice_image');
        }

        return redirect()->route('bo.settings.invoice.edit')
            ->with('success', 'Paramètres de facturation mis à jour avec succès.');
    }
}
