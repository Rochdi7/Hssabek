<?php

namespace App\Models\Finance;

use App\Traits\BelongsToTenant;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Loan extends Model
{
    use HasFactory, HasUuids, BelongsToTenant, UsesTenantCurrency;

    protected $fillable = [
        'loan_type',
        'lender_type',
        'lender_name',
        'reference_number',
        'principal_amount',
        'interest_rate',
        'interest_type',
        'total_amount',
        'paid_amount',
        'remaining_balance',
        'start_date',
        'end_date',
        'payment_frequency',
        'status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'principal_amount' => 'decimal:2',
        'interest_rate' => 'decimal:3',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'remaining_balance' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function getRemainingAmountAttribute(): float
    {
        return round((float) $this->total_amount - (float) $this->paid_amount, 2);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function installments(): HasMany
    {
        return $this->hasMany(LoanInstallment::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(LoanPayment::class);
    }
}
