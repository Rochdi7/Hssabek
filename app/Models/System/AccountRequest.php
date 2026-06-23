<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountRequest extends Model
{
    use HasUuids;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_address',
        'company_city',
        'company_country',
        'sector',
        'employees_count',
        'contact_name',
        'contact_email',
        'contact_phone',
        'message',
        'ip_address',
        // Workflow fields — set only by controllers, never from public form (enforced by Form Request)
        'status',
        'handled_by',
        'handled_at',
        'admin_notes',
    ];

    protected $casts = [
        'handled_at' => 'datetime',
    ];

    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }

    public function scopePending(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('status', 'pending');
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'pending'  => 'badge-soft-warning',
            'approved' => 'badge-soft-success',
            'rejected' => 'badge-soft-danger',
            default    => 'badge-soft-secondary',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'  => 'En attente',
            'approved' => 'Approuvée',
            'rejected' => 'Rejetée',
            default    => $this->status,
        };
    }

    public function getSectorLabelAttribute(): string
    {
        return match ($this->sector) {
            'commerce'      => 'Commerce',
            'services'      => 'Services',
            'industrie'     => 'Industrie',
            'construction'  => 'Construction / BTP',
            'technologie'   => 'Technologie / IT',
            'sante'         => 'Santé',
            'education'     => 'Éducation',
            'transport'     => 'Transport / Logistique',
            'agriculture'   => 'Agriculture',
            'immobilier'    => 'Immobilier',
            'restauration'  => 'Restauration / Hôtellerie',
            'autre'         => 'Autre',
            default         => $this->sector ?? '-',
        };
    }
}
