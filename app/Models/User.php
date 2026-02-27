<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasUuids, Notifiable, HasRoles, InteractsWithMedia;

    protected $fillable = [
        'tenant_id',
        'email',
        'name',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'country',
        'state',
        'city',
        'postal_code',
        'avatar_url',
        'status',
        'last_login_at',
        'last_login_ip',
        'password',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'date_of_birth' => 'date',
        'password' => 'hashed',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(\App\Models\System\UserInvitation::class, 'invited_by_id');
    }

    public function loginLogs(): HasMany
    {
        return $this->hasMany(\App\Models\System\LoginLog::class);
    }

    /**
     * Register Spatie media collections for the user.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl(asset('build/img/profiles/avatar-01.jpg'))
            ->useFallbackPath(public_path('build/img/profiles/avatar-01.jpg'));
    }

    /**
     * Get the avatar URL for the user (uses Spatie Media Library).
     */
    public function getAvatarUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('avatar')
            ?: asset('build/img/profiles/avatar-01.jpg');
    }
}
