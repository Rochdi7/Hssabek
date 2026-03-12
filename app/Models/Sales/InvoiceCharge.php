<?php

namespace App\Models\Sales;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceCharge extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'invoice_id',
        'label',
        'amount',
        'tax_rate',
        'position',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'tax_rate' => 'decimal:4',
        'position' => 'integer',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
