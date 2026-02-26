<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxGroupRate extends Model
{
    use HasUuids;

    protected $fillable = [
        'tax_group_id',
        'rate_name',
        'rate_percentage',
    ];

    protected $casts = [
        'rate_percentage' => 'decimal:4',
    ];

    public function taxGroup(): BelongsTo
    {
        return $this->belongsTo(TaxGroup::class);
    }
}
