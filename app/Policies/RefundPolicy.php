<?php

namespace App\Policies;

use App\Models\Sales\Refund;
use App\Models\User;

class RefundPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.refunds.view');
    }

    public function view(User $user, Refund $refund): bool
    {
        return $user->can('sales.refunds.view')
            && $this->belongsToTenant($refund);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.refunds.create');
    }

    public function update(User $user, Refund $refund): bool
    {
        return $user->can('sales.refunds.edit')
            && $this->belongsToTenant($refund);
    }

    public function delete(User $user, Refund $refund): bool
    {
        return $user->can('sales.refunds.delete')
            && $this->belongsToTenant($refund);
    }
}
