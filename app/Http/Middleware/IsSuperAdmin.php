<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->tenant_id !== null) {
            abort(403, 'Access denied. Super admin only.');
        }

        return $next($request);
    }
}
