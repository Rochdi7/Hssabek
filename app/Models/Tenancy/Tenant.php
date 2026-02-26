<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'timezone',
        'default_currency',
        'has_free_trial',
        'trial_ends_at',
    ];

    protected $casts = [
        'has_free_trial' => 'boolean',
        'trial_ends_at' => 'datetime',
    ];

    public function domains(): HasMany
    {
        return $this->hasMany(TenantDomain::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function settings()
    {
        return $this->hasOne(TenantSetting::class);
    }
}
