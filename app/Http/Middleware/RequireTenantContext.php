<?php

namespace App\Http\Middleware;

use App\Services\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;

class RequireTenantContext
{
    public function handle(Request $request, Closure $next)
    {
        if (TenantContext::check()) {
            return $next($request);
        }

        if ($request->expectsJson()) {
            abort(403, 'Tenant context is required for this route.');
        }

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('error', __('Cette section est reservee aux comptes entreprise.'));
    }
}
