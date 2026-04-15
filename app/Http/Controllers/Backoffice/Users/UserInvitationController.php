<?php

namespace App\Http\Controllers\Backoffice\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\InviteUserRequest;
use App\Jobs\SendUserInvitationJob;
use App\Models\System\UserInvitation;
use App\Models\Tenancy\Role;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserInvitationController extends Controller
{
    public function store(InviteUserRequest $request)
    {
        $existingUser = User::where('email', $request->email)
            ->where('tenant_id', TenantContext::id())
            ->exists();

        if ($existingUser) {
            return redirect()->back()
                ->withInput()
                ->with('error', __('Cet utilisateur existe déjà dans votre organisation.'));
        }

        // Cancel any existing pending invitation for this email
        UserInvitation::where('tenant_id', TenantContext::id())
            ->where('email', $request->email)
            ->whereNull('accepted_at')
            ->delete();

        if ($request->password_mode === 'manual') {
            // Manual mode: create user directly with the provided password
            $user = new User();
            $user->tenant_id = TenantContext::id();
            $user->email = $request->email;
            $user->name = $request->email; // Default name to email, user can update later
            $user->password = $request->password;
            $user->status = 'active';
            $user->email_verified_at = now();
            $user->save();

            if ($request->role_id) {
                $role = Role::find($request->role_id);
                if ($role) {
                    $user->assignRole($role);
                }
            }

            return redirect()->route('bo.users.index')
                ->with('success', __("Le compte a été créé pour {$request->email}. Veuillez lui communiquer son mot de passe."));
        }

        // Auto mode: generate random password and send via email
        $generatedPassword = Str::random(12);

        $user = new User();
        $user->tenant_id = TenantContext::id();
        $user->email = $request->email;
        $user->name = $request->email;
        $user->password = $generatedPassword;
        $user->status = 'active';
        $user->email_verified_at = now();
        $user->save();

        if ($request->role_id) {
            $role = Role::find($request->role_id);
            if ($role) {
                $user->assignRole($role);
            }
        }

        // Send credentials via email
        $invitation = UserInvitation::create([
            'email' => $request->email,
            'role_id' => $request->role_id,
            'token' => Str::random(64),
            'expires_at' => now(),
            'accepted_at' => now(),
            'created_by' => auth()->id(),
        ]);

        dispatch(new SendUserInvitationJob($invitation, $generatedPassword));

        return redirect()->route('bo.users.index')
            ->with('success', __("Le compte a été créé et les identifiants ont été envoyés à {$request->email}."));
    }

    public function destroy(UserInvitation $invitation)
    {
        abort_unless($invitation->tenant_id === TenantContext::id(), 403);

        $invitation->delete();

        return redirect()->route('bo.users.index')
            ->with('success', __("L'invitation a été annulée."));
    }

    /**
     * Show the accept invitation form (public — no auth required).
     */
    public function accept(string $token)
    {
        $invitation = UserInvitation::where('token', $token)
            ->whereNull('accepted_at')
            ->where('expires_at', '>', now())
            ->firstOrFail();

        return view('backoffice.users.accept-invitation', compact('invitation'));
    }

    /**
     * Process the accept invitation form (public — no auth required).
     */
    public function acceptStore(string $token, Request $request)
    {
        $invitation = UserInvitation::where('token', $token)
            ->whereNull('accepted_at')
            ->where('expires_at', '>', now())
            ->firstOrFail();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        $user = new User();
        $user->tenant_id = $invitation->tenant_id;
        $user->email = $invitation->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->status = 'active';
        $user->email_verified_at = now();
        $user->save();

        if ($invitation->role_id) {
            $role = Role::find($invitation->role_id);
            if ($role) {
                $user->assignRole($role);
            }
        }

        $invitation->update(['accepted_at' => now()]);

        auth()->login($user);

        return redirect()->route('bo.dashboard')
            ->with('success', __('Bienvenue ! Votre compte a été créé avec succès.'));
    }
}
