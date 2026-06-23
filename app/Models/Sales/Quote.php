<?php

namespace App\Models\Sales;

use App\Support\Sales\QuoteDocumentType;
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
class Quote extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    /** Simplified statuses. Legacy 'draft'/'sent' rows are treated as ACTIVE. */
    public const STATUS_ACTIVE    = 'active';
    public const STATUS_ACCEPTED  = 'accepted';
    public const STATUS_REJECTED  = 'rejected';
    public const STATUS_EXPIRED   = 'expired';
    public const STATUS_CANCELLED = 'cancelled';

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
            self::STATUS_ACTIVE    => 'Actif',
            self::STATUS_ACCEPTED  => 'Accepté',
            self::STATUS_REJECTED  => 'Rejeté',
            self::STATUS_EXPIRED   => 'Expiré',
            self::STATUS_CANCELLED => 'Annulé',
            default                => ucfirst((string) $this->status),
        };
    }

    public function statusBadgeClass(): string
    {
        return match ($this->normalizedStatus()) {
            self::STATUS_ACCEPTED  => 'badge-soft-success',
            self::STATUS_REJECTED  => 'badge-soft-danger',
            self::STATUS_EXPIRED   => 'badge-soft-secondary',
            self::STATUS_CANCELLED => 'badge-soft-secondary',
            default                => 'badge-soft-info',
        };
    }

    protected $fillable = [
        'customer_id',
        'number',
        'document_type',
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
        'public_token',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $quote) {
            if (empty($quote->document_type)) {
                $quote->document_type = 'quote';
            }

            if (empty($quote->public_token)) {
                $quote->public_token = (string) Str::uuid();
            }
        });
    }

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

    public function scopeOfDocumentType($query, string $documentType)
    {
        return $query->where($this->qualifyColumn('document_type'), $documentType);
    }

    public function documentConfig(): array
    {
        return QuoteDocumentType::resolve($this->document_type);
    }

    public function isDocumentType(string $documentType): bool
    {
        return ($this->document_type ?: 'quote') === $documentType;
    }
}
