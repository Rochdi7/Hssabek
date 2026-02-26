<?php

namespace App\Models\Templates;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemplatePurchase extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_id',
        'template_catalog_id',
        'purchase_date',
        'expires_at',
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function templateCatalog(): BelongsTo
    {
        return $this->belongsTo(TemplateCatalog::class);
    }
}
