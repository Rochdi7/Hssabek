<?php

namespace App\Models\System;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInvitation extends Model
{
    use HasUuids, HasFactory, BelongsToTenant;

    public const MAIL_PENDING = 'pending';
    public const MAIL_SENT = 'sent';
    public const MAIL_FAILED = 'failed';

    protected $fillable = [
        'email',
        'role_id',
        'token',
        'expires_at',
        'accepted_at',
        'created_by',
        'mail_status',
        'mail_sent_at',
        'mail_error',
        'generated_password',
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
        'expires_at' => 'datetime',
        'mail_sent_at' => 'datetime',
        'generated_password' => 'encrypted',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Role::class, 'role_id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class, 'tenant_id');
    }

    public function markMailSent(): void
    {
        $this->forceFill([
            'mail_status' => self::MAIL_SENT,
            'mail_sent_at' => now(),
            'mail_error' => null,
        ])->save();
    }

    public function markMailFailed(string $error): void
    {
        $this->forceFill([
            'mail_status' => self::MAIL_FAILED,
            'mail_error' => \Illuminate\Support\Str::limit($error, 1000),
        ])->save();
    }
}
