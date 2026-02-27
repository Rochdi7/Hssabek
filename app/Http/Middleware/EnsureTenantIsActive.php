<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTenantIsActive
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = $request->attributes->get('tenant') ?? app()->has('tenant') ? app('tenant') : null;

        if ($tenant && $tenant->status !== 'active') {
            return response()->view('errors.tenant-suspended', [
                'tenant' => $tenant,
                'status' => $tenant->status,
            ], 403);
        }

        return $next($request);
    }
}
