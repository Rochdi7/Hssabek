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
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    /** Simplified workflow statuses. Legacy 'draft'/'sent' rows are treated as UNPAID. */
    public const STATUS_UNPAID  = 'unpaid';
    public const STATUS_PARTIAL = 'partial';
    public const STATUS_PAID    = 'paid';
    public const STATUS_OVERDUE = 'overdue';
    public const STATUS_VOID    = 'void';

    /** Map any stored value (including legacy) to a simplified status. */
    public function normalizedStatus(): string
    {
        return match ($this->status) {
            'draft', 'sent' => self::STATUS_UNPAID,
            default => $this->status,
        };
    }

    /**
     * Invoices eligible to receive a customer payment.
     * Money-based eligibility: open balance and not closed (paid/void).
     * "sent" is NOT required — clients may deliver invoices outside the system.
     */
    public function scopeAllocatable($query)
    {
        return $query->where('amount_due', '>', 0)
            ->whereNotIn('status', [self::STATUS_PAID, self::STATUS_VOID]);
    }

    /** French label for the badge. */
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

    /** Theme badge class (kept consistent with existing badge palette). */
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
        'customer_id',
        'quote_id',
        'number',
        'reference_number',
        'status',
        'issue_date',
        'due_date',
        'enable_tax',
        'bill_from_snapshot',
        'bill_to_snapshot',
        'subtotal',
        'discount_total',
        'tax_total',

        'total',
        'amount_paid',
        'amount_due',
        'total_in_words',
        'notes',
        'terms',
        'bank_details_snapshot',
        'sent_at',
        'paid_at',
        'public_token',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $invoice) {
            if (empty($invoice->public_token)) {
                $invoice->public_token = (string) Str::uuid();
            }
        });
    }

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'enable_tax' => 'boolean',
        'bill_from_snapshot' => 'array',
        'bill_to_snapshot' => 'array',
        'bank_details_snapshot' => 'array',
        'subtotal' => 'decimal:2',
        'discount_total' => 'decimal:2',
        'tax_total' => 'decimal:2',

        'total' => 'decimal:2',
        'amount_paid' => 'decimal:2',
        'amount_due' => 'decimal:2',
        'sent_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\CRM\Customer::class);
    }

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function charges(): HasMany
    {
        return $this->hasMany(InvoiceCharge::class);
    }

    public function creditNotes(): HasMany
    {
        return $this->hasMany(CreditNote::class);
    }

    public function paymentAllocations(): HasMany
    {
        return $this->hasMany(PaymentAllocation::class);
    }

    public function creditNoteApplications(): HasMany
    {
        return $this->hasMany(CreditNoteApplication::class);
    }

    /**
     * Get the recurring invoice that uses this invoice as a template.
     */
    public function recurringInvoice(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Pro\RecurringInvoice::class, 'template_invoice_id');
    }
}
