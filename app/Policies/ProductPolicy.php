<?php

namespace App\Policies;

use App\Models\Catalog\Product;
use App\Models\User;

class ProductPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.products.view');
    }

    public function view(User $user, Product $product): bool
    {
        return $user->can('inventory.products.view')
            && $this->belongsToTenant($product);
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.products.create');
    }

    public function update(User $user, Product $product): bool
    {
        return $user->can('inventory.products.edit')
            && $this->belongsToTenant($product);
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->can('inventory.products.delete')
            && $this->belongsToTenant($product);
    }
}
