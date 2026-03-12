<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierPayment extends Model
{
    use HasUuids, BelongsToTenant, UsesTenantCurrency;

    protected $fillable = [
        'supplier_id',
        'vendor_bill_id',
        'amount',
        'status',
        'payment_date',
        'paid_at',
        'reference_number',
        'payment_method_id',
        'notes',
    ];

    protected $casts = [
        'amount'       => 'decimal:2',
        'payment_date' => 'date',
        'paid_at'      => 'datetime',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function vendorBill(): BelongsTo
    {
        return $this->belongsTo(VendorBill::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Sales\PaymentMethod::class, 'payment_method_id');
    }

    public function allocations(): HasMany
    {
        return $this->hasMany(SupplierPaymentAllocation::class);
    }
}
