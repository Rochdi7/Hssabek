<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tenant extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'timezone',
        'default_currency',
        'forme_juridique',
        'setup_completed',
        'has_free_trial',
        'trial_ends_at',
    ];

    protected $casts = [
        'setup_completed' => 'boolean',
        'has_free_trial' => 'boolean',
        'trial_ends_at' => 'datetime',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(\App\Models\User::class);
    }

    public function settings()
    {
        return $this->hasOne(TenantSetting::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(\App\Models\Billing\Subscription::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->singleFile()
            ->useFallbackUrl(asset('build/img/icons/company-logo-01.svg'))
            ->useFallbackPath(public_path('build/img/icons/company-logo-01.svg'));

        $this->addMediaCollection('dark_logo')->singleFile();
        $this->addMediaCollection('mini_logo')->singleFile();
        $this->addMediaCollection('dark_mini_logo')->singleFile();
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('apple_icon')->singleFile();

        $this->addMediaCollection('invoice_image')
            ->singleFile();
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('logo')
            ?: asset('build/img/icons/company-logo-01.svg');
    }

    public function getDarkLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('dark_logo') ?: '';
    }

    public function getMiniLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('mini_logo') ?: '';
    }

    public function getDarkMiniLogoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('dark_mini_logo') ?: '';
    }

    public function getFaviconUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('favicon') ?: '';
    }

    public function getAppleIconUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('apple_icon') ?: '';
    }

    public function getInvoiceImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('invoice_image') ?: null;
    }
}
