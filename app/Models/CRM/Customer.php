<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'phone',
        'customer_type',
        'tax_id',
        'currency_id',
        'credit_limit',
        'credit_used',
        'payment_terms',
        'status',
        'notes',
    ];

    protected $casts = [
        'credit_limit' => 'decimal:2',
        'credit_used' => 'decimal:2',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Finance\Currency::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(CustomerAddress::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(CustomerContact::class);
    }

    public function quotes()
    {
        return $this->hasMany(\App\Models\Sales\Quote::class);
    }

    public function invoices()
    {
        return $this->hasMany(\App\Models\Sales\Invoice::class);
    }
}
