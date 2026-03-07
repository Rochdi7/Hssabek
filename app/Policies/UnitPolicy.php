<?php

namespace App\Policies;

use App\Models\Catalog\Unit;
use App\Models\User;

class UnitPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.products.view');
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.products.create');
    }

    public function update(User $user, Unit $unit): bool
    {
        return $user->can('inventory.products.edit')
            && $this->belongsToTenant($unit);
    }

    public function delete(User $user, Unit $unit): bool
    {
        return $user->can('inventory.products.delete')
            && $this->belongsToTenant($unit);
    }
}
