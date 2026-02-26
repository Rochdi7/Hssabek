<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasUuids, Notifiable, HasRoles;

    protected $fillable = [
        'tenant_id',
        'email',
        'first_name',
        'last_name',
        'phone',
        'avatar',
        'status',
        'last_login_at',
        'password',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(\App\Models\System\UserInvitation::class, 'invited_by_id');
    }

    public function loginLogs(): HasMany
    {
        return $this->hasMany(\App\Models\System\LoginLog::class);
    }
}
