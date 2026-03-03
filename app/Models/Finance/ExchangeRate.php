<?php

namespace App\Models\Finance;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExchangeRate extends Model
{
    use HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'base_currency',
        'quote_currency',
        'rate',
        'date',
    ];

    protected $casts = [
        'rate' => 'decimal:8',
        'date' => 'date',
    ];

    public function baseCurrencyRelation(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'base_currency', 'code');
    }

    public function quoteCurrencyRelation(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'quote_currency', 'code');
    }
}
