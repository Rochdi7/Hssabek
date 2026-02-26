<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentNumberSequence extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_id',
        'document_type',
        'prefix',
        'current_number',
        'increment_by',
        'suffix',
    ];

    protected $casts = [
        'current_number' => 'integer',
        'increment_by' => 'integer',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }
}
