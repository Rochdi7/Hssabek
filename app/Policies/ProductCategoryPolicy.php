<?php

namespace App\Policies;

use App\Models\Catalog\ProductCategory;
use App\Models\User;

class ProductCategoryPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.products.view');
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.products.create');
    }

    public function update(User $user, ProductCategory $category): bool
    {
        return $user->can('inventory.products.edit')
            && $this->belongsToTenant($category);
    }

    public function delete(User $user, ProductCategory $category): bool
    {
        return $user->can('inventory.products.delete')
            && $this->belongsToTenant($category);
    }
}
