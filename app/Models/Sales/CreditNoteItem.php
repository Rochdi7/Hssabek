<?php

namespace App\Models\Sales;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreditNoteItem extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'credit_note_id',
        'label',
        'description',
        'quantity',
        'unit_price',
        'tax_rate',
        'line_total',
        'position',
    ];

    protected $casts = [
        'quantity' => 'decimal:3',
        'unit_price' => 'decimal:2',
        'tax_rate' => 'decimal:4',
        'line_total' => 'decimal:2',
        'position' => 'integer',
    ];

    public function creditNote(): BelongsTo
    {
        return $this->belongsTo(CreditNote::class);
    }
}
