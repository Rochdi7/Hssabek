<?php

namespace App\Policies;

use App\Models\Purchases\SupplierPayment;
use App\Models\User;

class SupplierPaymentPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchases.supplier_payments.view');
    }

    public function view(User $user, SupplierPayment $supplierPayment): bool
    {
        return $user->can('purchases.supplier_payments.view')
            && $this->belongsToTenant($supplierPayment);
    }

    public function create(User $user): bool
    {
        return $user->can('purchases.supplier_payments.create');
    }

    public function update(User $user, SupplierPayment $supplierPayment): bool
    {
        return $user->can('purchases.supplier_payments.edit')
            && $this->belongsToTenant($supplierPayment);
    }

    public function delete(User $user, SupplierPayment $supplierPayment): bool
    {
        return $user->can('purchases.supplier_payments.delete')
            && $this->belongsToTenant($supplierPayment);
    }
}
