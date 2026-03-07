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
class PurchaseOrder extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency;

    protected $fillable = [
        'supplier_id',
        'warehouse_id',
        'number',
        'reference_number',
        'status',
        'order_date',
        'expected_date',
        'subtotal',
        'discount_total',
        'tax_total',
        'round_off',
        'total',
        'notes',
        'terms',
    ];

    protected $casts = [
        'order_date'      => 'date',
        'expected_date'   => 'date',
        'subtotal'        => 'decimal:2',
        'discount_total'  => 'decimal:2',
        'tax_total'       => 'decimal:2',
        'round_off'       => 'decimal:2',
        'total'           => 'decimal:2',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Inventory\Warehouse::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseOrderItem::class)->orderBy('position');
    }

    public function goodsReceipts(): HasMany
    {
        return $this->hasMany(GoodsReceipt::class);
    }

    public function vendorBills(): HasMany
    {
        return $this->hasMany(VendorBill::class);
    }
}
