<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tenant extends Model implements HasMedia
{
    use HasUuids, InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->singleFile()
            ->useFallbackUrl(asset('build/img/icons/company-logo-01.svg'))
            ->useFallbackPath(public_path('build/img/icons/company-logo-01.svg'));

        $this->addMediaCollection('invoice_image')
            ->singleFile();
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('logo')
            ?: asset('build/img/icons/company-logo-01.svg');
    }

    public function getInvoiceImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('invoice_image') ?: null;
    }
}
