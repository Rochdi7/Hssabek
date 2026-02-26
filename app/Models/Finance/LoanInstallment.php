<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanInstallment extends Model
{
    use HasUuids;

    protected $fillable = [
        'loan_id',
        'installment_number',
        'due_date',
        'principal_payment',
        'interest_payment',
        'total_payment',
        'status',
        'paid_date',
    ];

    protected $casts = [
        'due_date' => 'date',
        'paid_date' => 'date',
        'principal_payment' => 'decimal:2',
        'interest_payment' => 'decimal:2',
        'total_payment' => 'decimal:2',
    ];

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }
}
