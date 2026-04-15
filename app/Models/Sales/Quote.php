<?php

namespace App\Models\Sales;

use App\Traits\BelongsToTenant;
use App\Traits\LogsActivity;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Quote extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    protected $fillable = [
        'customer_id',
        'bank_account_id',
        'number',
        'reference_number',
        'status',
        'issue_date',
        'due_date',
        'expiry_date',
        'enable_tax',
        'bill_from_snapshot',
        'bill_to_snapshot',
        'subtotal',
        'discount_total',
        'tax_total',

        'total',
        'total_in_words',
        'notes',
        'terms',
        'bank_details_snapshot',
        'sent_at',
        'accepted_at',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'expiry_date' => 'date',
        'enable_tax' => 'boolean',
        'bill_from_snapshot' => 'array',
        'bill_to_snapshot' => 'array',
        'bank_details_snapshot' => 'array',
        'subtotal' => 'decimal:2',
        'discount_total' => 'decimal:2',
        'tax_total' => 'decimal:2',

        'total' => 'decimal:2',
        'sent_at' => 'datetime',
        'accepted_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\CRM\Customer::class);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Finance\BankAccount::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(QuoteItem::class);
    }

    public function charges(): HasMany
    {
        return $this->hasMany(QuoteCharge::class);
    }
}
