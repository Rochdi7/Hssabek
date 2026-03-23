<?php

namespace App\Models\CRM;

use App\Traits\BelongsToTenant;
use App\Traits\LogsActivity;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, UsesTenantCurrency, LogsActivity;

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'tax_id',
        'payment_terms_days',
        'status',
        'notes',
    ];

    protected $casts = [
        'payment_terms_days' => 'integer',
    ];

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
