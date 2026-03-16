<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\System\LoginLog;
use App\Models\Tenancy\Tenant;
use App\Scopes\TenantScope;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $locale = app()->getLocale();
        $view = $locale !== 'fr' && view()->exists("{$locale}.auth.login")
            ? "{$locale}.auth.login"
            : 'auth.login';

        return view($view);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        // Single-domain SaaS: find the user by email across all tenants
        $user = \App\Models\User::withoutGlobalScope(TenantScope::class)
            ->where('email', $credentials['email'])
            ->first();

        if (!$user) {
            LoginLog::create([
                'tenant_id' => null,
                'user_id' => null,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'failed',
                'message' => 'User not found',
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => __('Les identifiants fournis ne correspondent à aucun compte.')]);
        }

        // Check if tenant is active (for tenant users)
        if ($user->tenant_id) {
            $tenant = Tenant::find($user->tenant_id);

            if (!$tenant || $tenant->status !== 'active') {
                $status = $tenant?->status ?? 'unknown';
                LoginLog::create([
                    'tenant_id' => $user->tenant_id,
                    'user_id' => null,
                    'email' => $credentials['email'],
                    'ip' => $ip,
                    'user_agent' => $userAgent,
                    'status' => 'blocked',
                    'message' => sprintf('Tenant status is %s', $status),
                ]);

                return back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => __("Le compte de votre entreprise est :status. Veuillez contacter le support.", ['status' => $status])]);
            }
        }

        // Clear TenantContext so Auth::attempt works for both super admins and tenant users
        TenantContext::forget();

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            LoginLog::create([
                'tenant_id' => $user->tenant_id,
                'user_id' => null,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'failed',
                'message' => 'Invalid credentials',
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => __('Les identifiants fournis ne correspondent à aucun compte.')]);
        }

        $authenticatedUser = Auth::user();

        // Check user status
        if ($authenticatedUser->status !== 'active') {
            Auth::logout();

            LoginLog::create([
                'tenant_id' => $authenticatedUser->tenant_id,
                'user_id' => $authenticatedUser->id,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'blocked',
                'message' => sprintf('User account is %s', $authenticatedUser->status),
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => __("Votre compte est :status. Veuillez contacter le support.", ['status' => $authenticatedUser->status])]);
        }

        // Set tenant context for tenant users
        if ($authenticatedUser->tenant_id) {
            $tenant = Tenant::find($authenticatedUser->tenant_id);
            if ($tenant) {
                TenantContext::set($tenant);
            }
        }

        // Update login info
        $authenticatedUser->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
        ]);

        // Log successful login
        LoginLog::create([
            'tenant_id' => $authenticatedUser->tenant_id,
            'user_id' => $authenticatedUser->id,
            'email' => $credentials['email'],
            'ip' => $ip,
            'user_agent' => $userAgent,
            'status' => 'success',
            'message' => null,
        ]);

        $request->session()->regenerate();
        session()->flash('success', __('Bienvenue :name! Vous êtes connecté avec succès.', ['name' => $authenticatedUser->name]));

        // Redirect based on user type
        if ($authenticatedUser->tenant_id === null || $authenticatedUser->hasRole('super_admin')) {
            return redirect()->route('sa.dashboard');
        }

        return redirect()->route('bo.dashboard');
    }
}
