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

    /**
     * Purchase orders that can still receive goods: anything not fully
     * received and not cancelled. Includes legacy 'draft'/'sent' (now 'active').
     */
    public function scopeReceivable($query)
    {
        return $query->whereNotIn('status', [self::STATUS_RECEIVED, self::STATUS_CANCELLED]);
    }

    /**
     * Single source of truth for received status: derive it purely from line
     * quantities (ordered vs received) and persist it. Never trust the stored
     * status alone — always recompute after any receiving process.
     *
     * - all lines fully received        → received
     * - some quantity received          → partially_received
     * - nothing received yet            → active (unless confirmed/cancelled)
     *
     * Cancelled orders are left untouched (a dead PO is never reopened).
     */
    public function recalculateStatus(): string
    {
        if ($this->status === self::STATUS_CANCELLED) {
            return $this->status;
        }

        $this->loadMissing('items');

        if ($this->items->isEmpty()) {
            return $this->status;
        }

        $allReceived = true;
        $anyReceived = false;

        foreach ($this->items as $item) {
            $ordered  = (float) $item->quantity;
            $received = (float) $item->received_quantity;

            if ($received >= $ordered) {
                $anyReceived = true;
            } else {
                $allReceived = false;
                if ($received > 0) {
                    $anyReceived = true;
                }
            }
        }

        if ($allReceived) {
            $derived = self::STATUS_RECEIVED;
        } elseif ($anyReceived) {
            $derived = self::STATUS_PARTIALLY_RECEIVED;
        } else {
            // Nothing received: keep a manual 'confirmed', otherwise normalize to active.
            $derived = $this->status === self::STATUS_CONFIRMED
                ? self::STATUS_CONFIRMED
                : self::STATUS_ACTIVE;
        }

        if ($this->status !== $derived) {
            $this->update(['status' => $derived]);
        }

        return $derived;
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
