<?php

namespace App\Models\Finance;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class BankAccount extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

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
}
