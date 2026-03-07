<?php

namespace App\Policies;

use App\Models\CRM\Customer;
use App\Models\User;

class CustomerPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('crm.customers.view');
    }

    public function view(User $user, Customer $customer): bool
    {
        return $user->can('crm.customers.view')
            && $this->belongsToTenant($customer);
    }

    public function create(User $user): bool
    {
        return $user->can('crm.customers.create');
    }

    public function update(User $user, Customer $customer): bool
    {
        return $user->can('crm.customers.edit')
            && $this->belongsToTenant($customer);
    }

    public function delete(User $user, Customer $customer): bool
    {
        return $user->can('crm.customers.delete')
            && $this->belongsToTenant($customer);
    }
}
