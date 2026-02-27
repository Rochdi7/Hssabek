<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogoutRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(LogoutRequest $request)
    {
        $user = Auth::user();

        // Revoke all Sanctum API tokens for this user
        if ($user && method_exists($user, 'tokens')) {
            $user->tokens()->delete();
        }

        // Logout from the web session
        Auth::logout();

        // Clear tenant context
        TenantContext::forget();

        // Invalidate session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
