<?php

namespace App\Policies;

use App\Models\Catalog\TaxCategory;
use App\Models\User;

class TaxCategoryPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('catalog.tax_rates.view');
    }

    public function create(User $user): bool
    {
        return $user->can('catalog.tax_rates.create');
    }

    public function update(User $user, TaxCategory $taxCategory): bool
    {
        return $user->can('catalog.tax_rates.edit')
            && $this->belongsToTenant($taxCategory);
    }

    public function delete(User $user, TaxCategory $taxCategory): bool
    {
        return $user->can('catalog.tax_rates.delete')
            && $this->belongsToTenant($taxCategory);
    }
}
