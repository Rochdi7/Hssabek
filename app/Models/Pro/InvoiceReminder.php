<?php

namespace App\Models\Pro;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceReminder extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_id',
        'invoice_id',
        'reminder_type',
        'scheduled_date',
        'is_sent',
        'sent_at',
    ];

    protected $casts = [
        'scheduled_date' => 'date',
        'sent_at' => 'datetime',
        'is_sent' => 'boolean',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Sales\Invoice::class);
    }
}
