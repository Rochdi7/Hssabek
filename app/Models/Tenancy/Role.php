<?php

namespace App\Models\Tenancy;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [
        'tenant_id',
        'name',
        'guard_name',
    ];
}
