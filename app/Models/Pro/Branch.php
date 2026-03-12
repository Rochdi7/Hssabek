<?php

namespace App\Models\Pro;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'name',
        'code',
        'email',
        'phone',
        'tax_id',
        'address_snapshot',
        'is_default',
        'is_active',
    ];

    protected $casts = [
        'address_snapshot' => 'array',
        'is_default'       => 'boolean',
        'is_active'        => 'boolean',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }
}
