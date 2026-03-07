<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends TenantPolicy
{
    public function viewAny(User $authUser): bool
    {
        return $authUser->can('access.users.view');
    }

    public function view(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.view')
            && $this->belongsToTenant($user);
    }

    public function create(User $authUser): bool
    {
        return $authUser->can('access.users.create');
    }

    public function update(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.edit')
            && $this->belongsToTenant($user);
    }

    public function activate(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.edit')
            && $this->belongsToTenant($user);
    }

    public function deactivate(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.edit')
            && $this->belongsToTenant($user)
            && $authUser->id !== $user->id;
    }
}
