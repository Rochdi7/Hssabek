<?php

namespace App\Policies;

use App\Models\Purchases\PurchaseOrder;
use App\Models\User;

class PurchaseOrderPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchases.purchase-orders.view');
    }

    public function view(User $user, PurchaseOrder $purchaseOrder): bool
    {
        return $user->can('purchases.purchase-orders.view')
            && $this->belongsToTenant($purchaseOrder);
    }

    public function create(User $user): bool
    {
        return $user->can('purchases.purchase-orders.create');
    }

    public function update(User $user, PurchaseOrder $purchaseOrder): bool
    {
        return $user->can('purchases.purchase-orders.edit')
            && $this->belongsToTenant($purchaseOrder);
    }

    public function delete(User $user, PurchaseOrder $purchaseOrder): bool
    {
        return $user->can('purchases.purchase-orders.delete')
            && $this->belongsToTenant($purchaseOrder);
    }
}
