<?php

namespace App\Policies;

use App\Models\Catalog\Unit;
use App\Models\User;

class UnitPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('catalog.units.view');
    }

    public function create(User $user): bool
    {
        return $user->can('catalog.units.create');
    }

    public function update(User $user, Unit $unit): bool
    {
        return $user->can('catalog.units.edit')
            && $this->belongsToTenant($unit);
    }

    public function delete(User $user, Unit $unit): bool
    {
        return $user->can('catalog.units.delete')
            && $this->belongsToTenant($unit);
    }
}
