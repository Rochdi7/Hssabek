<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetTenantContext
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = $request->attributes->get('tenant') ?? (app()->has('tenant') ? app('tenant') : null);

        if ($tenant) {
            // Load tenant settings
            $settings = $tenant->setting;

            if ($settings) {
                // Set timezone
                if (isset($settings->localization_settings['timezone'])) {
                    config(['app.timezone' => $settings->localization_settings['timezone']]);
                    date_default_timezone_set($settings->localization_settings['timezone']);
                }

                // Set locale/language
                if (isset($settings->localization_settings['language'])) {
                    app()->setLocale($settings->localization_settings['language']);
                }

                // Set currency
                if (isset($settings->account_settings['default_currency'])) {
                    config(['app.currency' => $settings->account_settings['default_currency']]);
                }
            }
        }

        return $next($request);
    }
}
