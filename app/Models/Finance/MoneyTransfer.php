<?php

namespace App\Models\Finance;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoneyTransfer extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'from_bank_account_id',
        'to_bank_account_id',
        'reference_number',
        'transfer_date',
        'amount',
        'notes',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'transfer_date' => 'date',
    ];

    public function fromBankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'from_bank_account_id');
    }

    public function toBankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'to_bank_account_id');
    }
}
