<?php

namespace App\Http\Controllers\Backoffice\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\System\UserInvitation;
use App\Models\Tenancy\Role;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $query = User::query()
            ->where('tenant_id', TenantContext::id())
            ->with('roles');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(request()->input('per_page', 15))->withQueryString();

        $pendingInvitations = UserInvitation::where('tenant_id', TenantContext::id())
            ->whereNull('accepted_at')
            ->where('expires_at', '>', now())
            ->with('role')
            ->latest()
            ->get();

        $roles = Role::where('tenant_id', TenantContext::id())
            ->orderBy('name')
            ->get();

        return view('backoffice.users.index', compact('users', 'pendingInvitations', 'roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::where('tenant_id', TenantContext::id())
            ->orderBy('name')
            ->get();

        return view('backoffice.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->safe()->only(['name', 'phone']));

        if ($request->has('roles')) {
            $validRoleIds = Role::where('tenant_id', TenantContext::id())
                ->whereIn('id', $request->input('roles', []))
                ->pluck('id')
                ->toArray();
            $user->syncRoles($validRoleIds);
        }

        return redirect()->route('bo.users.index')
            ->with('success', __('Utilisateur mis à jour avec succès.'));
    }

    public function activate(User $user)
    {
        $this->authorize('activate', $user);

        $user->update(['status' => 'active']);

        return redirect()->route('bo.users.index')
            ->with('success', __("L'utilisateur « {$user->name} » a été activé."));
    }

    public function deactivate(User $user)
    {
        $this->authorize('deactivate', $user);

        $user->update(['status' => 'blocked']);

        return redirect()->route('bo.users.index')
            ->with('success', __("L'utilisateur « {$user->name} » a été désactivé."));
    }
}
