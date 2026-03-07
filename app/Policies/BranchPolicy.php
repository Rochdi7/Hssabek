<?php

namespace App\Policies;

use App\Models\Pro\Branch;
use App\Models\User;

class BranchPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('settings.company.view') || $user->can('access.users.view');
    }

    public function view(User $user, Branch $branch): bool
    {
        return $this->viewAny($user)
            && $this->belongsToTenant($branch);
    }

    public function create(User $user): bool
    {
        return $user->can('settings.company.edit') || $user->can('access.users.edit');
    }

    public function update(User $user, Branch $branch): bool
    {
        return $this->create($user)
            && $this->belongsToTenant($branch);
    }

    public function delete(User $user, Branch $branch): bool
    {
        return $this->create($user)
            && $this->belongsToTenant($branch);
    }
}
