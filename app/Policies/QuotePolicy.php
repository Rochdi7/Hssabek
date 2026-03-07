<?php

namespace App\Policies;

use App\Models\Sales\Quote;
use App\Models\User;

class QuotePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.quotes.view');
    }

    public function view(User $user, Quote $quote): bool
    {
        return $user->can('sales.quotes.view')
            && $this->belongsToTenant($quote);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.quotes.create');
    }

    public function update(User $user, Quote $quote): bool
    {
        return $user->can('sales.quotes.edit')
            && $this->belongsToTenant($quote);
    }

    public function delete(User $user, Quote $quote): bool
    {
        return $user->can('sales.quotes.delete')
            && $this->belongsToTenant($quote);
    }
}
