<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class VendorBill extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency;

    protected $fillable = [
        'supplier_id',
        'purchase_order_id',
        'goods_receipt_id',
        'number',
        'reference_number',
        'status',
        'issue_date',
        'due_date',
        'subtotal',
        'tax_total',
        'round_off',
        'total',
        'amount_paid',
        'amount_due',
        'notes',
    ];

    protected $casts = [
        'issue_date'   => 'date',
        'due_date'     => 'date',
        'subtotal'     => 'decimal:2',
        'tax_total'    => 'decimal:2',
        'round_off'    => 'decimal:2',
        'total'        => 'decimal:2',
        'amount_paid'  => 'decimal:2',
        'amount_due'   => 'decimal:2',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function debitNotes(): HasMany
    {
        return $this->hasMany(DebitNote::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(SupplierPayment::class);
    }

    public function supplierPaymentAllocations(): HasMany
    {
        return $this->hasMany(SupplierPaymentAllocation::class);
    }

    public function debitNoteApplications(): HasMany
    {
        return $this->hasMany(DebitNoteApplication::class);
    }
}
