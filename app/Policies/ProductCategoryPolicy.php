<?php

namespace App\Policies;

use App\Models\Catalog\ProductCategory;
use App\Models\User;

class ProductCategoryPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('catalog.categories.view');
    }

    public function create(User $user): bool
    {
        return $user->can('catalog.categories.create');
    }

    public function update(User $user, ProductCategory $category): bool
    {
        return $user->can('catalog.categories.edit')
            && $this->belongsToTenant($category);
    }

    public function delete(User $user, ProductCategory $category): bool
    {
        return $user->can('catalog.categories.delete')
            && $this->belongsToTenant($category);
    }
}
