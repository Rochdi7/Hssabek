<?php

namespace App\Models\Sales;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteItem extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'quote_id',
        'product_id',
        'label',
        'description',
        'quantity',
        'unit_id',
        'unit_price',
        'discount_type',
        'discount_value',
        'tax_rate',
        'tax_group_id',
        'line_subtotal',
        'line_tax',
        'line_total',
        'position',
    ];

    protected $casts = [
        'quantity' => 'decimal:3',
        'unit_price' => 'decimal:2',
        'discount_value' => 'decimal:4',
        'tax_rate' => 'decimal:4',
        'line_subtotal' => 'decimal:2',
        'line_tax' => 'decimal:2',
        'line_total' => 'decimal:2',
        'position' => 'integer',
    ];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Product::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Unit::class);
    }

    public function taxGroup(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\TaxGroup::class);
    }
}
