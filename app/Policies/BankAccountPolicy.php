<?php

namespace App\Policies;

use App\Models\Finance\BankAccount;
use App\Models\User;

class BankAccountPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('finance.bank_accounts.view');
    }

    public function view(User $user, BankAccount $bankAccount): bool
    {
        return $user->can('finance.bank_accounts.view')
            && $this->belongsToTenant($bankAccount);
    }

    public function create(User $user): bool
    {
        return $user->can('finance.bank_accounts.create');
    }

    public function update(User $user, BankAccount $bankAccount): bool
    {
        return $user->can('finance.bank_accounts.edit')
            && $this->belongsToTenant($bankAccount);
    }

    public function delete(User $user, BankAccount $bankAccount): bool
    {
        return $user->can('finance.bank_accounts.delete')
            && $this->belongsToTenant($bankAccount);
    }
}
