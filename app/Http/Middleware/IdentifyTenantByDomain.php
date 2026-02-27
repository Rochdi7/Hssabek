<?php

namespace App\Http\Middleware;

use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantDomain;
use Closure;
use Illuminate\Http\Request;

class IdentifyTenantByDomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Try to find tenant by domain
        $tenantDomain = TenantDomain::where('domain', $host)->first();

        if ($tenantDomain) {
            $tenant = $tenantDomain->tenant;
            app()->instance('tenant', $tenant);
            $request->attributes->set('tenant', $tenant);
        } else {
            // Try to find tenant by subdomain (subdomain.localhost or subdomain.example.com)
            $parts = explode('.', $host);
            if (count($parts) >= 2) {
                $subdomain = $parts[0];
                $tenant = Tenant::where('slug', $subdomain)->first();
                if ($tenant) {
                    app()->instance('tenant', $tenant);
                    $request->attributes->set('tenant', $tenant);
                }
            }
        }

        return $next($request);
    }
}
