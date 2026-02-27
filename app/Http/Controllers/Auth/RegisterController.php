<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $tenant = request()->attributes->get('tenant');

        // Check if registration is enabled for this tenant
        if (!$tenant || !config('auth.registration_enabled', false)) {
            abort(404, 'Registration is not available.');
        }

        return view('auth.register', ['tenant' => $tenant]);
    }

    public function register(RegisterRequest $request)
    {
        $tenant = $request->attributes->get('tenant');

        if (!$tenant) {
            return back()
                ->withInput($request->only('name', 'email'))
                ->withErrors(['email' => 'Invalid tenant context.']);
        }

        // Create user
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password')),
            'tenant_id' => $tenant->id,
        ]);

        // Log in the user
        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
