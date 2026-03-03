<?php

namespace App\Models\Catalog;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxGroupRate extends Model
{
    use HasUuids, BelongsToTenant;

    protected $fillable = [
        'tax_group_id',
        'name',
        'rate',
        'position',
    ];

    protected $casts = [
        'rate' => 'decimal:4',
        'position' => 'integer',
    ];

    public function taxGroup(): BelongsTo
    {
        return $this->belongsTo(TaxGroup::class);
    }
}
