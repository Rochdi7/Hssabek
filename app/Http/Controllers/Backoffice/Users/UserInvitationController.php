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
        // An active (non-deleted) user with this email already exists → block.
        $activeUser = User::where('email', $request->email)
            ->where('tenant_id', TenantContext::id())
            ->exists();

        if ($activeUser) {
            return redirect()->back()
                ->withInput()
                ->with('error', __('Cet utilisateur existe déjà dans votre organisation.'));
        }

        // A previously soft-deleted user with this email → restore it instead of
        // inserting a duplicate (which would violate the users_email_unique index).
        $trashedUser = User::withTrashed()
            ->where('email', $request->email)
            ->where('tenant_id', TenantContext::id())
            ->whereNotNull('deleted_at')
            ->first();

        // Cancel any existing pending invitation for this email
        UserInvitation::where('tenant_id', TenantContext::id())
            ->where('email', $request->email)
            ->whereNull('accepted_at')
            ->delete();

        if ($request->password_mode === 'manual') {
            // Manual mode: create user directly with the provided password
            $user = $trashedUser ?? new User();
            if ($trashedUser) {
                $user->restore();
            }
            $user->tenant_id = TenantContext::id();
            $user->email = $request->email;
            $user->name = $request->email; // Default name to email, user can update later
            $user->password = $request->password;
            $user->status = 'active';
            $user->email_verified_at = now();
            $user->save();

            $user->syncRoles([]);

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

        $user = $trashedUser ?? new User();
        if ($trashedUser) {
            $user->restore();
        }
        $user->tenant_id = TenantContext::id();
        $user->email = $request->email;
        $user->name = $request->email;
        $user->password = $generatedPassword;
        $user->status = 'active';
        $user->email_verified_at = now();
        $user->save();

        $user->syncRoles([]);

        if ($request->role_id) {
            $role = Role::find($request->role_id);
            if ($role) {
                $user->assignRole($role);
            }
        }

        // Track the credentials e-mail so it can be re-sent if delivery fails.
        $invitation = UserInvitation::create([
            'email' => $request->email,
            'role_id' => $request->role_id,
            'token' => Str::random(64),
            'expires_at' => now(),
            'accepted_at' => now(),
            'created_by' => auth()->id(),
            'mail_status' => UserInvitation::MAIL_PENDING,
            'generated_password' => $generatedPassword,
        ]);

        dispatch(new SendUserInvitationJob($invitation, $generatedPassword));

        $invitation->refresh();

        if ($invitation->mail_status === UserInvitation::MAIL_FAILED) {
            return redirect()->route('bo.users.index')
                ->with('error', __("Le compte de {$request->email} a été créé, mais l'e-mail n'a pas pu être envoyé. Vous pouvez le renvoyer depuis la liste."));
        }

        return redirect()->route('bo.users.index')
            ->with('success', __("Le compte a été créé et les identifiants ont été envoyés à {$request->email}."));
    }

    /**
     * Re-send the credentials e-mail for an invitation whose mail previously failed.
     */
    public function resend(UserInvitation $invitation)
    {
        abort_unless($invitation->tenant_id === TenantContext::id(), 403);

        if (! $invitation->generated_password) {
            return redirect()->route('bo.users.index')
                ->with('error', __("Impossible de renvoyer l'e-mail : aucun mot de passe enregistré pour cette invitation."));
        }

        dispatch(new SendUserInvitationJob($invitation, $invitation->generated_password));

        $invitation->refresh();

        if ($invitation->mail_status === UserInvitation::MAIL_FAILED) {
            return redirect()->route('bo.users.index')
                ->with('error', __("L'e-mail n'a toujours pas pu être envoyé à {$invitation->email}."));
        }

        return redirect()->route('bo.users.index')
            ->with('success', __("L'e-mail a été renvoyé à {$invitation->email}."));
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
