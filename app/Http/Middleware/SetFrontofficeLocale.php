<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetFrontofficeLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('frontoffice_locale', config('app.locale', 'fr'));

        if (in_array($locale, ['fr', 'ar'])) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
