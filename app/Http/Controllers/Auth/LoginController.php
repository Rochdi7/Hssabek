<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\System\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        // Resolve tenant from app container (set by SetTenantContext middleware)
        $tenant = app()->has('tenant') ? app('tenant') : $request->attributes->get('tenant');

        // First check if user is super admin (tenant_id = NULL)
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && $user->tenant_id === null) {
            // SUPER ADMIN LOGIN (no tenant required)
            if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request->boolean('remember'))) {
                LoginLog::create([
                    'tenant_id' => null,
                    'user_id' => null,
                    'email' => $credentials['email'],
                    'ip' => $ip,
                    'user_agent' => $userAgent,
                    'status' => 'failed',
                    'message' => 'Invalid credentials',
                ]);

                return back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => 'The provided credentials do not match our records.']);
            }

            // Check user status after successful auth attempt
            $authenticatedUser = Auth::user();
            if ($authenticatedUser->status !== 'active') {
                Auth::logout();

                LoginLog::create([
                    'tenant_id' => null,
                    'user_id' => $authenticatedUser->id,
                    'email' => $credentials['email'],
                    'ip' => $ip,
                    'user_agent' => $userAgent,
                    'status' => 'blocked',
                    'message' => sprintf('User account is %s', $authenticatedUser->status),
                ]);

                return back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => "Your account is {$authenticatedUser->status}. Please contact support."]);
            }

            // Update login info
            $authenticatedUser->update([
                'last_login_at' => now(),
                'last_login_ip' => $ip,
            ]);

            // Log successful login
            LoginLog::create([
                'tenant_id' => null,
                'user_id' => $authenticatedUser->id,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'success',
                'message' => null,
            ]);

            $request->session()->regenerate();
            session()->flash('success', "Bienvenue {$authenticatedUser->name}! Vous êtes connecté avec succès.");

            return redirect()->route('sa.dashboard');
        }

        // TENANT USER LOGIN (requires tenant)
        if (!$tenant) {
            LoginLog::create([
                'tenant_id' => null,
                'user_id' => null,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'blocked',
                'message' => 'Tenant not found for this domain',
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'The email address is not associated with this tenant.']);
        }

        // Check if tenant is active
        if ($tenant->status !== 'active') {
            LoginLog::create([
                'tenant_id' => $tenant->id,
                'user_id' => null,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'blocked',
                'message' => sprintf('Tenant status is %s', $tenant->status),
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => "This tenant account is {$tenant->status}. Please contact support."]);
        }

        // Attempt to authenticate tenant user
        // Add tenant_id to credentials to ensure user belongs to this tenant
        $tenantCredentials = array_merge($credentials, ['tenant_id' => $tenant->id]);

        if (!Auth::attempt($tenantCredentials, $request->boolean('remember'))) {
            LoginLog::create([
                'tenant_id' => $tenant->id,
                'user_id' => null,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'failed',
                'message' => 'Invalid credentials',
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        // Check user status after successful auth attempt
        $authenticatedUser = Auth::user();
        if ($authenticatedUser->status !== 'active') {
            Auth::logout();

            LoginLog::create([
                'tenant_id' => $tenant->id,
                'user_id' => $authenticatedUser->id,
                'email' => $credentials['email'],
                'ip' => $ip,
                'user_agent' => $userAgent,
                'status' => 'blocked',
                'message' => sprintf('User account is %s', $authenticatedUser->status),
            ]);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => "Your account is {$authenticatedUser->status}. Please contact support."]);
        }

        // Update login info
        $authenticatedUser->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
        ]);

        // Log successful login
        LoginLog::create([
            'tenant_id' => $tenant->id,
            'user_id' => $authenticatedUser->id,
            'email' => $credentials['email'],
            'ip' => $ip,
            'user_agent' => $userAgent,
            'status' => 'success',
            'message' => null,
        ]);

        $request->session()->regenerate();
        session()->flash('success', "Bienvenue {$authenticatedUser->name}! Vous êtes connecté avec succès.");

        return redirect()->route('bo.dashboard');
    }
}
