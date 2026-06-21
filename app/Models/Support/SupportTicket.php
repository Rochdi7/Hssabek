<?php

namespace App\Models\Support;

use App\Models\Tenancy\Tenant;
use App\Models\User;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SupportTicket extends Model implements HasMedia
{
    use HasUuids, BelongsToTenant, InteractsWithMedia;

    protected $fillable = [
        'subject',
        'description',
        'category',
        'priority',
        'status',
        'resolved_at',
        'closed_at',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
        'closed_at'   => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $ticket) {
            if (! $ticket->ticket_number) {
                $lastNumber = (int) self::withoutGlobalScopes()
                    ->where('ticket_number', 'like', 'TK-%')
                    ->selectRaw("MAX(CAST(SUBSTRING(ticket_number, 4) AS UNSIGNED)) as last_num")
                    ->value('last_num');
                $ticket->ticket_number = 'TK-' . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
            }
            if (! $ticket->user_id) {
                $ticket->user_id = auth()->id();
            }
        });
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(SupportTicketReply::class)->oldest();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments')
            ->useDisk('local')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/webp',
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/zip',
                'application/x-zip',
                'application/x-zip-compressed',
                'application/octet-stream',
            ]);
    }

    // — Accessors —

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'bug'     => 'Bug / Erreur',
            'feature' => 'Demande de fonctionnalité',
            'billing' => 'Facturation & Abonnement',
            'account' => 'Compte & Accès',
            'other'   => 'Autre',
            default   => $this->category,
        };
    }

    public function getCategoryBadgeAttribute(): string
    {
        return match ($this->category) {
            'bug'     => 'badge-soft-danger',
            'feature' => 'badge-soft-info',
            'billing' => 'badge-soft-warning',
            'account' => 'badge-soft-primary',
            'other'   => 'badge-soft-secondary',
            default   => 'badge-soft-secondary',
        };
    }

    public function getPriorityLabelAttribute(): string
    {
        return match ($this->priority) {
            'low'    => 'Basse',
            'medium' => 'Moyenne',
            'high'   => 'Haute',
            'urgent' => 'Urgente',
            default  => $this->priority,
        };
    }

    public function getPriorityBadgeAttribute(): string
    {
        return match ($this->priority) {
            'low'    => 'badge-soft-success',
            'medium' => 'badge-soft-info',
            'high'   => 'badge-soft-warning',
            'urgent' => 'badge-soft-danger',
            default  => 'badge-soft-secondary',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'open'        => 'Ouvert',
            'in_progress' => 'En cours',
            'on_hold'     => 'En attente',
            'resolved'    => 'Résolu',
            'closed'      => 'Fermé',
            default       => $this->status,
        };
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'open'        => 'badge-soft-primary',
            'in_progress' => 'badge-soft-info',
            'on_hold'     => 'badge-soft-warning',
            'resolved'    => 'badge-soft-success',
            'closed'      => 'badge-soft-secondary',
            default       => 'badge-soft-secondary',
        };
    }
}
