<?php

namespace App\Http\Middleware;

use App\Models\Tenancy\Tenant;
use App\Services\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;

/**
 * Identifies the current tenant from the authenticated user's tenant_id.
 *
 * Single-domain SaaS: all tenants share the same domain.
 * Tenant context is resolved after authentication, not from the URL/host.
 */
class IdentifyTenantByDomain
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->tenant_id) {
            $tenant = Tenant::find($user->tenant_id);

            if ($tenant) {
                TenantContext::set($tenant);
                app()->instance('tenant', $tenant);
                $request->attributes->set('tenant', $tenant);
            }
        }

        return $next($request);
    }
}
