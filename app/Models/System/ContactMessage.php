<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'ip_address',
        'status',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function markAsRead(): void
    {
        $this->update([
            'status'  => 'read',
            'read_at' => now(),
        ]);
    }

    public function getSubjectLabelAttribute(): string
    {
        return match ($this->subject) {
            'question'    => 'Question générale',
            'support'     => 'Support technique',
            'billing'     => 'Facturation & Abonnement',
            'partnership' => 'Partenariat',
            'other'       => 'Autre',
            default       => $this->subject,
        };
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'new'      => 'badge-soft-primary',
            'read'     => 'badge-soft-info',
            'replied'  => 'badge-soft-success',
            'archived' => 'badge-soft-secondary',
            default    => 'badge-soft-secondary',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'new'      => 'Nouveau',
            'read'     => 'Lu',
            'replied'  => 'Répondu',
            'archived' => 'Archivé',
            default    => $this->status,
        };
    }
}
