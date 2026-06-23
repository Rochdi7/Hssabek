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
class PurchaseOrder extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    /** Simplified statuses. Legacy 'draft'/'sent' rows are treated as ACTIVE. */
    public const STATUS_ACTIVE              = 'active';
    public const STATUS_CONFIRMED           = 'confirmed';
    public const STATUS_PARTIALLY_RECEIVED  = 'partially_received';
    public const STATUS_RECEIVED            = 'received';
    public const STATUS_CANCELLED           = 'cancelled';

    public function normalizedStatus(): string
    {
        return match ($this->status) {
            'draft', 'sent' => self::STATUS_ACTIVE,
            default => $this->status,
        };
    }

    public function statusLabel(): string
    {
        return match ($this->normalizedStatus()) {
            self::STATUS_ACTIVE             => 'Actif',
            self::STATUS_CONFIRMED          => 'Confirmé',
            self::STATUS_PARTIALLY_RECEIVED => 'Partiellement reçu',
            self::STATUS_RECEIVED           => 'Reçu',
            self::STATUS_CANCELLED          => 'Annulé',
            default                         => ucfirst(str_replace('_', ' ', (string) $this->status)),
        };
    }

    public function statusBadgeClass(): string
    {
        return match ($this->normalizedStatus()) {
            self::STATUS_RECEIVED           => 'badge-soft-success',
            self::STATUS_PARTIALLY_RECEIVED => 'badge-soft-warning',
            self::STATUS_CONFIRMED          => 'badge-soft-primary',
            self::STATUS_CANCELLED          => 'badge-soft-danger',
            default                         => 'badge-soft-info',
        };
    }

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
