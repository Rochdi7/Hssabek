<?php

namespace App\Policies;

use App\Models\Sales\Invoice;
use App\Models\User;

class InvoicePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.invoices.view');
    }

    public function view(User $user, Invoice $invoice): bool
    {
        return $user->can('sales.invoices.view')
            && $this->belongsToTenant($invoice);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.invoices.create');
    }

    public function update(User $user, Invoice $invoice): bool
    {
        return $user->can('sales.invoices.edit')
            && $this->belongsToTenant($invoice);
    }

    public function delete(User $user, Invoice $invoice): bool
    {
        return $user->can('sales.invoices.delete')
            && $this->belongsToTenant($invoice);
    }
}
