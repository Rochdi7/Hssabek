<?php

namespace App\Policies;

use App\Models\Purchases\VendorBill;
use App\Models\User;

class VendorBillPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchases.vendor-bills.view');
    }

    public function view(User $user, VendorBill $vendorBill): bool
    {
        return $user->can('purchases.vendor-bills.view')
            && $this->belongsToTenant($vendorBill);
    }

    public function create(User $user): bool
    {
        return $user->can('purchases.vendor-bills.create');
    }

    public function update(User $user, VendorBill $vendorBill): bool
    {
        return $user->can('purchases.vendor-bills.edit')
            && $this->belongsToTenant($vendorBill);
    }

    public function delete(User $user, VendorBill $vendorBill): bool
    {
        return $user->can('purchases.vendor-bills.delete')
            && $this->belongsToTenant($vendorBill);
    }
}
