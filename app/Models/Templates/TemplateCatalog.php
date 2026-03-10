<?php

namespace App\Models\Templates;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemplateCatalog extends Model
{
    use HasUuids;

    protected $table = 'template_catalog';

    protected $fillable = [
        'code',
        'name',
        'slug',
        'document_type',
        'category',
        'description',
        'engine',
        'view_path',
        'css_path',
        'preview_image',
        'version',
        'price',
        'currency',
        'is_free',
        'is_featured',
        'is_active',
        'sort_order',
        'created_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_free' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'features' => 'array',
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
