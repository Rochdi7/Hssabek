<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

/**
 * Wrapper around Spatie's permission middleware.
 * Super Admin users (tenant_id === null) always bypass permission checks.
 */
class RequirePermission
{
    public function handle(Request $request, Closure $next, string ...$permissions)
    {
        $user = auth()->user();

        if (!$user) {
            throw UnauthorizedException::notLoggedIn();
        }

        // Super Admin bypass — tenant_id is null
        if ($user->tenant_id === null) {
            return $next($request);
        }

        // Tenant Admin/Owner bypass — admin and owner roles have full access
        if ($user->hasRole('admin') || $user->hasRole('owner')) {
            return $next($request);
        }

        // Check if user has any of the required permissions
        foreach ($permissions as $permission) {
            if ($user->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
