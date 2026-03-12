<?php

namespace App\Models\Pro;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceReminder extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'type',
        'channel',
        'status',
        'scheduled_at',
        'sent_at',
        'error',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'sent_at'      => 'datetime',
        'created_at'   => 'datetime',
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
