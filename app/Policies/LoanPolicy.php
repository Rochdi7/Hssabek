<?php

namespace App\Policies;

use App\Models\Finance\Loan;
use App\Models\User;

class LoanPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('finance.loans.view');
    }

    public function view(User $user, Loan $loan): bool
    {
        return $user->can('finance.loans.view')
            && $this->belongsToTenant($loan);
    }

    public function create(User $user): bool
    {
        return $user->can('finance.loans.create');
    }

    public function update(User $user, Loan $loan): bool
    {
        return $user->can('finance.loans.edit')
            && $this->belongsToTenant($loan);
    }

    public function delete(User $user, Loan $loan): bool
    {
        return $user->can('finance.loans.delete')
            && $this->belongsToTenant($loan);
    }
}
