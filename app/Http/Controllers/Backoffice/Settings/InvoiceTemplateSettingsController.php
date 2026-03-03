<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvoiceTemplateSettingsController extends Controller
{
    public function index()
    {
        $tenant = TenantContext::get();

        $templates = DB::table('template_catalog')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('document_type');

        $tenantTemplates = DB::table('tenant_templates')
            ->where('tenant_id', $tenant->id)
            ->where('status', 'active')
            ->pluck('template_id')
            ->toArray();

        return view('backoffice.settings.invoice-templates', compact('templates', 'tenantTemplates'));
    }

    public function activate(string $templateId)
    {
        $tenant = TenantContext::get();

        $exists = DB::table('tenant_templates')
            ->where('tenant_id', $tenant->id)
            ->where('template_id', $templateId)
            ->first();

        if ($exists) {
            DB::table('tenant_templates')
                ->where('id', $exists->id)
                ->update([
                    'status' => 'active',
                    'activated_at' => now(),
                    'activated_by' => auth()->id(),
                    'source' => 'manual',
                ]);
        } else {
            DB::table('tenant_templates')->insert([
                'id' => Str::uuid()->toString(),
                'tenant_id' => $tenant->id,
                'template_id' => $templateId,
                'status' => 'active',
                'activated_at' => now(),
                'activated_by' => auth()->id(),
                'source' => 'manual',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('bo.settings.invoice-templates.index')
            ->with('success', 'Modèle activé avec succès.');
    }

    public function deactivate(string $templateId)
    {
        $tenant = TenantContext::get();

        DB::table('tenant_templates')
            ->where('tenant_id', $tenant->id)
            ->where('template_id', $templateId)
            ->update([
                'status' => 'inactive',
                'deactivated_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->route('bo.settings.invoice-templates.index')
            ->with('success', 'Modèle désactivé avec succès.');
    }
}
