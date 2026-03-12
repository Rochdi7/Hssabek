<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = [
        'email',
        'ip_address',
        'is_active',
    ];

    protected $casts = [
        'is_active'        => 'boolean',
        'unsubscribed_at'  => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function unsubscribe(): void
    {
        $this->update([
            'is_active'       => false,
            'unsubscribed_at' => now(),
        ]);
    }
}
