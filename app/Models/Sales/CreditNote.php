<?php

namespace App\Models\Sales;

use App\Traits\BelongsToTenant;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class CreditNote extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency;

    protected $fillable = [
        'customer_id',
        'invoice_id',
        'number',
        'reference_number',
        'status',
        'issue_date',
        'enable_tax',
        'subtotal',
        'tax_total',
        'round_off',
        'total',
        'notes',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'enable_tax' => 'boolean',
        'subtotal' => 'decimal:2',
        'tax_total' => 'decimal:2',
        'round_off' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\CRM\Customer::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CreditNoteItem::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(CreditNoteApplication::class);
    }
}
