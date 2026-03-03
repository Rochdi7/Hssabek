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
        return $user->can('settings.invoice.view');
    }

    public function editInvoice(User $user): bool
    {
        return $user->can('settings.invoice.edit');
    }

    public function viewLocale(User $user): bool
    {
        return $user->can('settings.locale.view');
    }

    public function editLocale(User $user): bool
    {
        return $user->can('settings.locale.edit');
    }
}
