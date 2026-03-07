<?php

namespace App\Policies;

use App\Models\Inventory\Warehouse;
use App\Models\User;

class WarehousePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.warehouses.view');
    }

    public function view(User $user, Warehouse $warehouse): bool
    {
        return $user->can('inventory.warehouses.view')
            && $this->belongsToTenant($warehouse);
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.warehouses.create');
    }

    public function update(User $user, Warehouse $warehouse): bool
    {
        return $user->can('inventory.warehouses.edit')
            && $this->belongsToTenant($warehouse);
    }

    public function delete(User $user, Warehouse $warehouse): bool
    {
        return $user->can('inventory.warehouses.delete')
            && $this->belongsToTenant($warehouse);
    }
}
