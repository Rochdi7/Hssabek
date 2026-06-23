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
class VendorBill extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    /** Simplified workflow statuses. Legacy 'draft'/'posted' rows are treated as UNPAID. */
    public const STATUS_UNPAID  = 'unpaid';
    public const STATUS_PARTIAL = 'partial';
    public const STATUS_PAID    = 'paid';
    public const STATUS_OVERDUE = 'overdue';
    public const STATUS_VOID    = 'void';

    public function normalizedStatus(): string
    {
        return match ($this->status) {
            'draft', 'posted' => self::STATUS_UNPAID,
            default => $this->status,
        };
    }

    /**
     * Vendor bills eligible to receive a supplier payment.
     * Money-based eligibility: open balance and not closed (paid/void).
     * "posted" is NOT required.
     */
    public function scopeAllocatable($query)
    {
        return $query->where('amount_due', '>', 0)
            ->whereNotIn('status', [self::STATUS_PAID, self::STATUS_VOID]);
    }

    public function statusLabel(): string
    {
        return match ($this->normalizedStatus()) {
            self::STATUS_UNPAID  => 'Non payé',
            self::STATUS_PARTIAL => 'Partiellement payé',
            self::STATUS_PAID    => 'Payé',
            self::STATUS_OVERDUE => 'En retard',
            self::STATUS_VOID    => 'Annulé',
            default              => ucfirst((string) $this->status),
        };
    }

    public function statusBadgeClass(): string
    {
        return match ($this->normalizedStatus()) {
            self::STATUS_PAID    => 'badge-soft-success',
            self::STATUS_PARTIAL => 'badge-soft-warning',
            self::STATUS_OVERDUE => 'badge-soft-danger',
            self::STATUS_VOID    => 'badge-soft-secondary',
            default              => 'badge-soft-info',
        };
    }

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

    public function goodsReceipt(): BelongsTo
    {
        return $this->belongsTo(GoodsReceipt::class);
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
