<?php

namespace App\Policies;

use App\Models\Sales\DeliveryChallan;
use App\Models\User;

class DeliveryChallanPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.delivery_challans.view');
    }

    public function view(User $user, DeliveryChallan $deliveryChallan): bool
    {
        return $user->can('sales.delivery_challans.view')
            && $this->belongsToTenant($deliveryChallan);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.delivery_challans.create');
    }

    public function update(User $user, DeliveryChallan $deliveryChallan): bool
    {
        return $user->can('sales.delivery_challans.edit')
            && $this->belongsToTenant($deliveryChallan);
    }

    public function delete(User $user, DeliveryChallan $deliveryChallan): bool
    {
        return $user->can('sales.delivery_challans.delete')
            && $this->belongsToTenant($deliveryChallan);
    }
}
