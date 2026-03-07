<?php

namespace App\Policies;

use App\Models\Catalog\TaxCategory;
use App\Models\User;

class TaxCategoryPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.products.view');
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.products.create');
    }

    public function update(User $user, TaxCategory $taxCategory): bool
    {
        return $user->can('inventory.products.edit')
            && $this->belongsToTenant($taxCategory);
    }

    public function delete(User $user, TaxCategory $taxCategory): bool
    {
        return $user->can('inventory.products.delete')
            && $this->belongsToTenant($taxCategory);
    }
}
