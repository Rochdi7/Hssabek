<?php

namespace App\Policies;

use App\Models\Catalog\TaxGroup;
use App\Models\User;

class TaxGroupPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.products.view');
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.products.create');
    }

    public function update(User $user, TaxGroup $taxGroup): bool
    {
        return $user->can('inventory.products.edit')
            && $this->belongsToTenant($taxGroup);
    }

    public function delete(User $user, TaxGroup $taxGroup): bool
    {
        return $user->can('inventory.products.delete')
            && $this->belongsToTenant($taxGroup);
    }
}
