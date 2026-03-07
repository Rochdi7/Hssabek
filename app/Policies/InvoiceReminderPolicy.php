<?php

namespace App\Policies;

use App\Models\Pro\InvoiceReminder;
use App\Models\User;

class InvoiceReminderPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.invoices.view');
    }

    public function view(User $user, InvoiceReminder $invoiceReminder): bool
    {
        return $user->can('sales.invoices.view')
            && $this->belongsToTenant($invoiceReminder);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.invoices.create');
    }

    public function update(User $user, InvoiceReminder $invoiceReminder): bool
    {
        return $user->can('sales.invoices.edit')
            && $this->belongsToTenant($invoiceReminder);
    }

    public function delete(User $user, InvoiceReminder $invoiceReminder): bool
    {
        return $user->can('sales.invoices.delete')
            && $this->belongsToTenant($invoiceReminder);
    }
}
