<?php

namespace App\Policies;

use App\Models\Finance\FinanceCategory;
use App\Models\User;

class FinanceCategoryPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('finance.categories.view');
    }

    public function create(User $user): bool
    {
        return $user->can('finance.categories.create');
    }

    public function update(User $user, FinanceCategory $category): bool
    {
        return $user->can('finance.categories.edit')
            && $this->belongsToTenant($category);
    }

    public function delete(User $user, FinanceCategory $category): bool
    {
        return $user->can('finance.categories.delete')
            && $this->belongsToTenant($category);
    }
}
