<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'title_fr',
        'title_ar',
        'title_en',
        'content',
        'content_fr',
        'content_ar',
        'content_en',
        'type',
        'is_active',
        'published_at',
        'expires_at',
        'attachment',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function localizedTitle(string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        return match($locale) {
            'ar' => $this->title_ar ?: $this->title_fr ?: $this->title,
            'en' => $this->title_en ?: $this->title_fr ?: $this->title,
            default => $this->title_fr ?: $this->title,
        };
    }

    public function localizedContent(string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        return match($locale) {
            'ar' => $this->content_ar ?: $this->content_fr ?: $this->content,
            'en' => $this->content_en ?: $this->content_fr ?: $this->content,
            default => $this->content_fr ?: $this->content,
        };
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            });
    }
}
