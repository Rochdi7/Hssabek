<?php

namespace App\Models\Templates;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantTemplatePreference extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_template_id',
        'document_type',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function tenantTemplate(): BelongsTo
    {
        return $this->belongsTo(TenantTemplate::class);
    }
}
