<?php

namespace App\Policies;

use App\Models\Reports\CustomReport;
use App\Models\User;

class CustomReportPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('pro.rapports.view');
    }

    public function view(User $user, CustomReport $report): bool
    {
        return $user->can('pro.rapports.view')
            && $this->belongsToTenant($report);
    }

    public function create(User $user): bool
    {
        return $user->can('pro.rapports.create');
    }

    public function update(User $user, CustomReport $report): bool
    {
        return $user->can('pro.rapports.edit')
            && $this->belongsToTenant($report);
    }

    public function delete(User $user, CustomReport $report): bool
    {
        return $user->can('pro.rapports.delete')
            && $this->belongsToTenant($report);
    }

    public function export(User $user, CustomReport $report): bool
    {
        return $user->can('pro.rapports.export')
            && $this->belongsToTenant($report);
    }
}
