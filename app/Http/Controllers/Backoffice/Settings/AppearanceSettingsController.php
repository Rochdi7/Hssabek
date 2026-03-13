<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class AppearanceSettingsController extends Controller
{
    private const VALID_SIDEBAR_COLORS = [
        'light', 'sidebar2', 'sidebar3', 'sidebar4', 'sidebar5', 'sidebar6', 'sidebar7',
        'gradientsidebar1', 'gradientsidebar2', 'gradientsidebar3', 'gradientsidebar4', 'gradientsidebar5', 'gradientsidebar6',
    ];

    private const VALID_TOPBAR_COLORS = [
        'white', 'topbar1', 'topbar2', 'topbar3', 'topbar4', 'topbar5', 'topbar6',
        'gradienttopbar1', 'gradienttopbar2', 'gradienttopbar3', 'gradienttopbar4', 'gradienttopbar5', 'gradienttopbar6',
    ];

    private const VALID_SIDEBAR_BGS = [
        '', 'sidebarbg1', 'sidebarbg2', 'sidebarbg3', 'sidebarbg4', 'sidebarbg5', 'sidebarbg6',
    ];

    public function edit()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;
        $appearance = $settings->modules_settings['appearance'] ?? [];

        return view('backoffice.settings.appearance', compact('settings', 'appearance'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'theme' => ['required', 'in:light,dark,automatic'],
            'layout' => ['nullable', 'in:default,single,mini,transparent,without-header'],
            'layout_width' => ['nullable', 'in:fluid,box'],
            'sidebar_color' => ['nullable', 'string', 'max:30'],
            'sidebar_size' => ['nullable', 'in:default,single,compact'],
            'topbar_color' => ['nullable', 'string', 'max:30'],
            'sidebar_bg' => ['nullable', 'string', 'max:20'],
            'theme_color' => ['nullable', 'in:primary,secondary,success,danger,info,warning'],
            'font_family' => ['nullable', 'string', 'max:50'],
        ], [
            'theme.required' => 'Le thème est obligatoire.',
            'theme.in' => 'Le thème sélectionné n\'est pas valide.',
        ]);

        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $modules = $setting->modules_settings ?? [];
        $modules['appearance'] = [
            'theme' => $request->input('theme', 'light'),
            'layout' => $request->input('layout', 'default'),
            'layout_width' => $request->input('layout_width', 'fluid'),
            'sidebar_color' => in_array($request->input('sidebar_color'), self::VALID_SIDEBAR_COLORS)
                ? $request->input('sidebar_color') : 'light',
            'sidebar_size' => $request->input('sidebar_size', 'default'),
            'topbar_color' => in_array($request->input('topbar_color'), self::VALID_TOPBAR_COLORS)
                ? $request->input('topbar_color') : 'white',
            'sidebar_bg' => in_array($request->input('sidebar_bg'), self::VALID_SIDEBAR_BGS)
                ? $request->input('sidebar_bg', '') : '',
            'theme_color' => $request->input('theme_color', 'primary'),
            'font_family' => $request->input('font_family', 'Instrument Sans'),
        ];
        $setting->modules_settings = $modules;
        $setting->save();

        return redirect()->route('bo.settings.appearance.edit')
            ->with('success', __('Paramètres d\'apparence mis à jour avec succès.'));
    }
}
