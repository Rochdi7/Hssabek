<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    protected $fillable = [
        'blog_category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'cover_image_alt',
        'tags',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'reading_time',
        'views',
    ];

    protected $casts = [
        'tags'         => 'array',
        'published_at' => 'datetime',
        'views'        => 'integer',
        'reading_time' => 'integer',
    ];

    // ── Relationships ──────────────────────────────────────────────

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // ── Scopes ─────────────────────────────────────────────────────

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', 'draft');
    }

    // ── Helpers ────────────────────────────────────────────────────

    public static function generateSlug(string $title): string
    {
        return Str::slug($title);
    }

    public static function computeReadingTime(string $content): int
    {
        $wordCount = str_word_count(strip_tags($content));
        return max(1, (int) ceil($wordCount / 200));
    }

    public function isPublished(): bool
    {
        return $this->status === 'published' && $this->published_at <= now();
    }

    public function getEffectiveMetaTitle(): string
    {
        return $this->meta_title ?: $this->title . ' — Hssabek Blog';
    }

    public function getEffectiveMetaDescription(): string
    {
        return $this->meta_description ?: $this->excerpt ?: Str::limit(strip_tags($this->content), 160);
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }
}
