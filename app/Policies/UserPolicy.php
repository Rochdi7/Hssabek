<?php

namespace App\Policies;

use App\Models\User;
use App\Services\Tenancy\TenantContext;

class UserPolicy
{
    public function viewAny(User $authUser): bool
    {
        return $authUser->can('access.users.view');
    }

    public function view(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.view')
            && $user->tenant_id === TenantContext::id();
    }

    public function create(User $authUser): bool
    {
        return $authUser->can('access.users.create');
    }

    public function update(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.edit')
            && $user->tenant_id === TenantContext::id();
    }

    public function activate(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.edit')
            && $user->tenant_id === TenantContext::id();
    }

    public function deactivate(User $authUser, User $user): bool
    {
        return $authUser->can('access.users.edit')
            && $user->tenant_id === TenantContext::id()
            && $authUser->id !== $user->id;
    }
}
