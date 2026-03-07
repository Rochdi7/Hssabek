<?php

namespace App\Policies;

use App\Models\Purchases\DebitNote;
use App\Models\User;

class DebitNotePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchases.debit_notes.view');
    }

    public function view(User $user, DebitNote $debitNote): bool
    {
        return $user->can('purchases.debit_notes.view')
            && $this->belongsToTenant($debitNote);
    }

    public function create(User $user): bool
    {
        return $user->can('purchases.debit_notes.create');
    }

    public function update(User $user, DebitNote $debitNote): bool
    {
        return $user->can('purchases.debit_notes.edit')
            && $this->belongsToTenant($debitNote);
    }

    public function delete(User $user, DebitNote $debitNote): bool
    {
        return $user->can('purchases.debit_notes.delete')
            && $this->belongsToTenant($debitNote);
    }
}
