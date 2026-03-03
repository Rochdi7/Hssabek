<?php

namespace App\Models\Tenancy;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Signature extends Model implements HasMedia
{
    use HasUuids, BelongsToTenant, InteractsWithMedia;

    protected $fillable = [
        'name',
        'is_default',
        'status',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('signature')->singleFile();
    }

    public function getSignatureUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('signature') ?: '';
    }
}
