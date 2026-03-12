<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DebitNoteItem extends Model
{
    use BelongsToTenant, HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'debit_note_id',
        'product_id',
        'label',
        'description',
        'quantity',
        'unit_id',
        'unit_cost',
        'discount_type',
        'discount_value',
        'tax_rate',
        'tax_group_id',
        'line_total',
        'position',
    ];

    protected $casts = [
        'quantity' => 'decimal:3',
        'unit_cost' => 'decimal:2',
        'discount_value' => 'decimal:4',
        'tax_rate' => 'decimal:4',
        'line_total' => 'decimal:2',
        'position' => 'integer',
    ];

    public function debitNote(): BelongsTo
    {
        return $this->belongsTo(DebitNote::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Product::class);
    }
}
