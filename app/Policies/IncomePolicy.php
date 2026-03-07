<?php

namespace App\Policies;

use App\Models\Finance\Income;
use App\Models\User;

class IncomePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('finance.incomes.view');
    }

    public function view(User $user, Income $income): bool
    {
        return $user->can('finance.incomes.view')
            && $this->belongsToTenant($income);
    }

    public function create(User $user): bool
    {
        return $user->can('finance.incomes.create');
    }

    public function update(User $user, Income $income): bool
    {
        return $user->can('finance.incomes.edit')
            && $this->belongsToTenant($income);
    }

    public function delete(User $user, Income $income): bool
    {
        return $user->can('finance.incomes.delete')
            && $this->belongsToTenant($income);
    }
}
