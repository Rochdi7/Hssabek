<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Integration extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_id',
        'provider',
        'status',
        'credentials',
        'settings',
        'last_synced_at',
    ];

    protected $casts = [
        'credentials' => 'json',
        'settings' => 'json',
        'last_synced_at' => 'datetime',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
