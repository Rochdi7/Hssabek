<?php

namespace App\Policies;

use App\Models\Purchases\Supplier;
use App\Models\User;

class SupplierPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchases.suppliers.view');
    }

    public function view(User $user, Supplier $supplier): bool
    {
        return $user->can('purchases.suppliers.view')
            && $this->belongsToTenant($supplier);
    }

    public function create(User $user): bool
    {
        return $user->can('purchases.suppliers.create');
    }

    public function update(User $user, Supplier $supplier): bool
    {
        return $user->can('purchases.suppliers.edit')
            && $this->belongsToTenant($supplier);
    }

    public function delete(User $user, Supplier $supplier): bool
    {
        return $user->can('purchases.suppliers.delete')
            && $this->belongsToTenant($supplier);
    }
}
