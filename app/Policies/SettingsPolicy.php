<?php

namespace App\Policies;

use App\Models\User;

class SettingsPolicy
{
    public function viewCompany(User $user): bool
    {
        return $user->can('settings.company.view');
    }

    public function editCompany(User $user): bool
    {
        return $user->can('settings.company.edit');
    }

    public function viewInvoice(User $user): bool
    {
        return $user->can('settings.invoices.view');
    }

    public function editInvoice(User $user): bool
    {
        return $user->can('settings.invoices.edit');
    }

    public function viewLocale(User $user): bool
    {
        return $user->can('settings.localization.view');
    }

    public function editLocale(User $user): bool
    {
        return $user->can('settings.localization.edit');
    }

    public function viewAccount(User $user): bool
    {
        return $user->can('settings.account.view');
    }

    public function editAccount(User $user): bool
    {
        return $user->can('settings.account.edit');
    }

    public function viewPlansBilling(User $user): bool
    {
        return $user->can('settings.plans_billing.view');
    }

    public function viewDataExport(User $user): bool
    {
        return $user->can('settings.data_export.view');
    }

    public function createDataExport(User $user): bool
    {
        return $user->can('settings.data_export.create');
    }
}
