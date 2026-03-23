<?php

namespace App\Models\Finance;

use App\Models\Purchases\Supplier;
use App\Traits\BelongsToTenant;
use App\Traits\LogsActivity;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Expense extends Model
{
    use HasFactory, HasUuids, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    protected $fillable = [
        'expense_number',
        'reference_number',
        'amount',
        'paid_amount',
        'expense_date',
        'payment_mode',
        'payment_status',
        'bank_account_id',
        'supplier_id',
        'category_id',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'expense_date' => 'date',
    ];

    public function getRemainingAmountAttribute(): float
    {
        return round((float) $this->amount - (float) $this->paid_amount, 2);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FinanceCategory::class, 'category_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(ExpensePayment::class);
    }
}
