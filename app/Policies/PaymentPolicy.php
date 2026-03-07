<?php

namespace App\Policies;

use App\Models\Sales\Payment;
use App\Models\User;

class PaymentPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.invoices.view');
    }

    public function view(User $user, Payment $payment): bool
    {
        return $user->can('sales.invoices.view')
            && $this->belongsToTenant($payment);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.invoices.create');
    }

    public function delete(User $user, Payment $payment): bool
    {
        return $user->can('sales.invoices.delete')
            && $this->belongsToTenant($payment);
    }
}
