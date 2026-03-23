<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use App\Traits\LogsActivity;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class DebitNote extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    protected $fillable = [
        'supplier_id',
        'purchase_order_id',
        'vendor_bill_id',
        'bank_account_id',
        'number',
        'reference_number',
        'status',
        'debit_note_date',
        'due_date',
        'enable_tax',
        'subtotal',
        'discount_total',
        'tax_total',
        'round_off',
        'total',
        'total_in_words',
        'notes',
        'terms',
        'bill_from_snapshot',
        'bill_to_snapshot',
        'bank_details_snapshot',
    ];

    protected $casts = [
        'debit_note_date' => 'date',
        'due_date' => 'date',
        'enable_tax' => 'boolean',
        'subtotal' => 'decimal:2',
        'discount_total' => 'decimal:2',
        'tax_total' => 'decimal:2',
        'round_off' => 'decimal:2',
        'total' => 'decimal:2',
        'bill_from_snapshot' => 'array',
        'bill_to_snapshot' => 'array',
        'bank_details_snapshot' => 'array',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Finance\BankAccount::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function vendorBill(): BelongsTo
    {
        return $this->belongsTo(VendorBill::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(DebitNoteItem::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(DebitNoteApplication::class);
    }
}
