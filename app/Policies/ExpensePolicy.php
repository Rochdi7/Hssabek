<?php

namespace App\Policies;

use App\Models\Finance\Expense;
use App\Models\User;

class ExpensePolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('finance.expenses.view');
    }

    public function view(User $user, Expense $expense): bool
    {
        return $user->can('finance.expenses.view')
            && $this->belongsToTenant($expense);
    }

    public function create(User $user): bool
    {
        return $user->can('finance.expenses.create');
    }

    public function update(User $user, Expense $expense): bool
    {
        return $user->can('finance.expenses.edit')
            && $this->belongsToTenant($expense);
    }

    public function delete(User $user, Expense $expense): bool
    {
        return $user->can('finance.expenses.delete')
            && $this->belongsToTenant($expense);
    }
}
