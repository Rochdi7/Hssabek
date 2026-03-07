<?php

namespace App\Policies;

use App\Services\Tenancy\TenantContext;
use Illuminate\Database\Eloquent\Model;

abstract class TenantPolicy
{
    protected function belongsToTenant(Model $model): bool
    {
        return $model->tenant_id === TenantContext::id();
    }
}
