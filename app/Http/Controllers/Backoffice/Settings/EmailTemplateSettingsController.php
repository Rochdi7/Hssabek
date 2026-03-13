<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailTemplateSettingsController extends Controller
{
    public function index()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;
        $templates = collect($settings->modules_settings['email_templates'] ?? [])
            ->sortByDesc('created_at')
            ->values();

        return view('backoffice.settings.email-templates', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ], [
            'name.required' => 'Le nom du modèle est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 150 caractères.',
            'subject.required' => 'L\'objet de l\'email est obligatoire.',
            'subject.max' => 'L\'objet ne doit pas dépasser 255 caractères.',
            'body.required' => 'Le contenu de l\'email est obligatoire.',
        ]);

        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $modules = $setting->modules_settings ?? [];
        $templates = $modules['email_templates'] ?? [];

        $templates[] = [
            'id' => Str::uuid()->toString(),
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
            'is_active' => true,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        $modules['email_templates'] = $templates;
        $setting->modules_settings = $modules;
        $setting->save();

        return redirect()->route('bo.settings.email-templates.index')
            ->with('success', __('Modèle d\'email ajouté avec succès.'));
    }

    public function update(Request $request, string $templateId)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ], [
            'name.required' => 'Le nom du modèle est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 150 caractères.',
            'subject.required' => 'L\'objet de l\'email est obligatoire.',
            'subject.max' => 'L\'objet ne doit pas dépasser 255 caractères.',
            'body.required' => 'Le contenu de l\'email est obligatoire.',
        ]);

        $tenant = TenantContext::get();
        $setting = $tenant->settings;

        $modules = $setting->modules_settings ?? [];
        $templates = $modules['email_templates'] ?? [];

        $templates = array_map(function ($tpl) use ($request, $templateId) {
            if ($tpl['id'] === $templateId) {
                $tpl['name'] = $request->name;
                $tpl['subject'] = $request->subject;
                $tpl['body'] = $request->body;
                $tpl['updated_at'] = now()->toDateTimeString();
            }
            return $tpl;
        }, $templates);

        $modules['email_templates'] = $templates;
        $setting->modules_settings = $modules;
        $setting->save();

        return redirect()->route('bo.settings.email-templates.index')
            ->with('success', __('Modèle d\'email mis à jour avec succès.'));
    }

    public function toggleStatus(string $templateId)
    {
        $tenant = TenantContext::get();
        $setting = $tenant->settings;

        $modules = $setting->modules_settings ?? [];
        $templates = $modules['email_templates'] ?? [];

        $templates = array_map(function ($tpl) use ($templateId) {
            if ($tpl['id'] === $templateId) {
                $tpl['is_active'] = !($tpl['is_active'] ?? true);
                $tpl['updated_at'] = now()->toDateTimeString();
            }
            return $tpl;
        }, $templates);

        $modules['email_templates'] = $templates;
        $setting->modules_settings = $modules;
        $setting->save();

        return redirect()->route('bo.settings.email-templates.index')
            ->with('success', __('Statut du modèle mis à jour.'));
    }

    public function destroy(string $templateId)
    {
        $tenant = TenantContext::get();
        $setting = $tenant->settings;

        $modules = $setting->modules_settings ?? [];
        $templates = $modules['email_templates'] ?? [];

        $templates = array_values(array_filter($templates, fn($tpl) => $tpl['id'] !== $templateId));

        $modules['email_templates'] = $templates;
        $setting->modules_settings = $modules;
        $setting->save();

        return redirect()->route('bo.settings.email-templates.index')
            ->with('success', __('Modèle d\'email supprimé avec succès.'));
    }
}
