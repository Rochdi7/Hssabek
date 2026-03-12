<?php

namespace App\Models\Pro;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecurringInvoice extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'customer_id',
        'template_invoice_id',
        'interval',
        'every',
        'next_run_at',
        'end_at',
        'status',
        'last_generated_at',
        'total_generated',
    ];

    protected $casts = [
        'every'             => 'integer',
        'next_run_at'       => 'datetime',
        'end_at'            => 'datetime',
        'last_generated_at' => 'datetime',
        'total_generated'   => 'integer',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\CRM\Customer::class);
    }

    public function templateInvoice(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Sales\Invoice::class, 'template_invoice_id');
    }
}
