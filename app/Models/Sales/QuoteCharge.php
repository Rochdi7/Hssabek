<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteCharge extends Model
{
    use HasUuids;

    protected $fillable = [
        'quote_id',
        'charge_name',
        'charge_amount',
        'is_taxable',
    ];

    protected $casts = [
        'charge_amount' => 'decimal:2',
        'is_taxable' => 'boolean',
    ];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }
}
