<?php

namespace App\Models\System;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInvitation extends Model
{
    use HasUuids, HasFactory, BelongsToTenant;

    protected $fillable = [
        'email',
        'role_id',
        'token',
        'expires_at',
        'accepted_at',
        'created_by',
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Role::class, 'role_id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class, 'tenant_id');
    }
}
