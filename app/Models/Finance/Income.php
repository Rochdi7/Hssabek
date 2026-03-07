<?php

namespace App\Models\Finance;

use App\Models\CRM\Customer;
use App\Traits\BelongsToTenant;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Income extends Model
{
    use HasFactory, HasUuids, BelongsToTenant, UsesTenantCurrency;

    protected $fillable = [
        'income_number',
        'reference_number',
        'amount',
        'income_date',
        'payment_mode',
        'bank_account_id',
        'customer_id',
        'category_id',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'income_date' => 'date',
    ];

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FinanceCategory::class, 'category_id');
    }
}
