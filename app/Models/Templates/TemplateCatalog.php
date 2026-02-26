<?php

namespace App\Models\Templates;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemplateCatalog extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'description',
        'category',
        'preview_image',
        'price',
        'is_premium',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_premium' => 'boolean',
    ];

    public function tenantTemplates(): HasMany
    {
        return $this->hasMany(TenantTemplate::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(TemplatePurchase::class);
    }
}
