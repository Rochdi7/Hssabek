<?php

namespace App\Models\Tenancy;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $fillable = [
        'tenant_id',
        'name',
        'guard_name',
    ];
}
