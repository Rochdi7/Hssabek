<?php

namespace App\Http\Middleware;

use App\Services\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;

class EnsureTenantIsActive
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = TenantContext::get();

        if (!$tenant) {
            return $next($request);
        }

        if ($tenant->status === 'suspended' || $tenant->status === 'cancelled') {
            return response()->view('errors.tenant-suspended', [
                'tenant' => $tenant,
                'status' => $tenant->status,
            ], 403);
        }

        if (
            $tenant->has_free_trial
            && $tenant->trial_ends_at !== null
            && $tenant->trial_ends_at->isPast()
        ) {
            return response()->view('errors.trial-expired', [
                'tenant' => $tenant,
            ], 403);
        }

        return $next($request);
    }
}
