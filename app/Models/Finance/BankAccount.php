<?php

namespace App\Models\Finance;

use App\Models\Purchases\SupplierPayment;
use App\Models\Sales\Payment;
use App\Traits\BelongsToTenant;
use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankAccount extends Model
{
    use HasFactory, HasUuids, BelongsToTenant, LogsActivity;

    protected $fillable = [
        'account_holder_name',
        'account_number',
        'bank_name',
        'ifsc_code',
        'branch',
        'account_type',
        'currency',
        'opening_balance',
        'current_balance',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'opening_balance' => 'decimal:2',
        'current_balance' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function currencyRelation(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency', 'code');
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    public function outgoingTransfers(): HasMany
    {
        return $this->hasMany(MoneyTransfer::class, 'from_bank_account_id');
    }

    public function incomingTransfers(): HasMany
    {
        return $this->hasMany(MoneyTransfer::class, 'to_bank_account_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function supplierPayments(): HasMany
    {
        return $this->hasMany(SupplierPayment::class);
    }

    /**
     * Add amount to the current balance (for income/revenue).
     */
    public function credit(float $amount): void
    {
        $this->increment('current_balance', $amount);
    }

    /**
     * Subtract amount from the current balance (for expense).
     */
    public function debit(float $amount): void
    {
        $this->decrement('current_balance', $amount);
    }

    /**
     * Get available balance.
     */
    public function getAvailableBalanceAttribute(): float
    {
        return (float) $this->current_balance;
    }

    /**
     * Check if bank account has sufficient balance.
     */
    public function hasSufficientBalance(float $amount): bool
    {
        return $this->current_balance >= $amount;
    }

    /**
     * Recalculate balance from all transactions.
     * Includes: incomes, expenses, transfers, sales payments (revenue), supplier payments (expense).
     */
    public function recalculateBalance(): void
    {
        $totalIncome = $this->incomes()->sum('amount');
        $totalExpense = $this->expenses()->sum('amount');
        $incomingTransfers = $this->incomingTransfers()->sum('amount');
        $outgoingTransfers = $this->outgoingTransfers()->sum('amount');

        // Sales payments = revenue (credit)
        $totalSalesPayments = $this->payments()
            ->where('status', 'succeeded')
            ->sum('amount');

        // Supplier payments = expense (debit)
        $totalSupplierPayments = $this->supplierPayments()
            ->where('status', 'succeeded')
            ->sum('amount');

        $this->current_balance = $this->opening_balance
            + $totalIncome
            - $totalExpense
            + $incomingTransfers
            - $outgoingTransfers
            + $totalSalesPayments
            - $totalSupplierPayments;

        $this->save();
    }
}
