<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceCharge extends Model
{
    use HasUuids;

    protected $fillable = [
        'invoice_id',
        'charge_name',
        'charge_amount',
        'is_taxable',
    ];

    protected $casts = [
        'charge_amount' => 'decimal:2',
        'is_taxable' => 'boolean',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
