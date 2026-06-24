<?php

namespace App\Http\Middleware;

use App\Services\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;

class SetTenantContext
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = TenantContext::get();

        if ($tenant) {
            // Load tenant settings (1:1 relationship)
            $settings = $tenant->settings;

            if ($settings) {
                $loc = $settings->localization_settings ?? [];

                // Timezone
                if (!empty($loc['timezone'])) {
                    config(['app.timezone' => $loc['timezone']]);
                    date_default_timezone_set($loc['timezone']);
                } elseif ($tenant->timezone) {
                    config(['app.timezone' => $tenant->timezone]);
                    date_default_timezone_set($tenant->timezone);
                }

                // Locale / language
                if (!empty($loc['language'])) {
                    app()->setLocale($loc['language']);
                }

                // Currency — check localization_settings first, then account_settings, then tenant column
                if (!empty($loc['currency'])) {
                    config(['app.currency' => $loc['currency']]);
                } elseif (!empty($settings->account_settings['default_currency'])) {
                    config(['app.currency' => $settings->account_settings['default_currency']]);
                } elseif ($tenant->default_currency) {
                    config(['app.currency' => $tenant->default_currency]);
                }

                // Date and time format
                if (!empty($loc['date_format'])) {
                    config(['app.date_format' => $loc['date_format']]);
                }
                if (!empty($loc['time_format'])) {
                    config(['app.time_format' => $loc['time_format']]);
                }
            } else {
                // Fallback to tenant-level defaults
                if ($tenant->timezone) {
                    config(['app.timezone' => $tenant->timezone]);
                    date_default_timezone_set($tenant->timezone);
                }
                if ($tenant->default_currency) {
                    config(['app.currency' => $tenant->default_currency]);
                }
            }
        }

        return $next($request);
    }
}
