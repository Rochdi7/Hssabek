<?php

namespace App\Models;

use App\Notifications\VerifyEmailNotification;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, HasUuids, SoftDeletes, HasApiTokens, Notifiable, HasRoles, InteractsWithMedia, BelongsToTenant;

    protected $fillable = [
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
        'password_changed_at',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_changed_at' => 'datetime',
        'last_login_at' => 'datetime',
        'date_of_birth' => 'date',
        'password' => 'hashed',
    ];

    public function invitations(): HasMany
    {
        return $this->hasMany(\App\Models\System\UserInvitation::class, 'created_by');
    }

    public function loginLogs(): HasMany
    {
        return $this->hasMany(\App\Models\System\LoginLog::class);
    }

    /**
     * Send the email verification notification with a 1-hour expiring link.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmailNotification());
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
