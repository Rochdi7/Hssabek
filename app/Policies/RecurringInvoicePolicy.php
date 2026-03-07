<?php

namespace App\Policies;

use App\Models\Pro\RecurringInvoice;
use App\Models\User;

class RecurringInvoicePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.invoices.view');
    }

    public function view(User $user, RecurringInvoice $recurringInvoice): bool
    {
        return $user->can('sales.invoices.view')
            && $this->belongsToTenant($recurringInvoice);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.invoices.create');
    }

    public function update(User $user, RecurringInvoice $recurringInvoice): bool
    {
        return $user->can('sales.invoices.edit')
            && $this->belongsToTenant($recurringInvoice);
    }

    public function delete(User $user, RecurringInvoice $recurringInvoice): bool
    {
        return $user->can('sales.invoices.delete')
            && $this->belongsToTenant($recurringInvoice);
    }
}
