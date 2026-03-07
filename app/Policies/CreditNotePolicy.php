<?php

namespace App\Policies;

use App\Models\Sales\CreditNote;
use App\Models\User;

class CreditNotePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('sales.credit_notes.view');
    }

    public function view(User $user, CreditNote $creditNote): bool
    {
        return $user->can('sales.credit_notes.view')
            && $this->belongsToTenant($creditNote);
    }

    public function create(User $user): bool
    {
        return $user->can('sales.credit_notes.create');
    }

    public function update(User $user, CreditNote $creditNote): bool
    {
        return $user->can('sales.credit_notes.edit')
            && $this->belongsToTenant($creditNote);
    }

    public function delete(User $user, CreditNote $creditNote): bool
    {
        return $user->can('sales.credit_notes.delete')
            && $this->belongsToTenant($creditNote);
    }
}
