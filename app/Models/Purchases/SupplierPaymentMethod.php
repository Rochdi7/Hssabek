<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierPaymentMethod extends Model
{
    use HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'provider',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(SupplierPayment::class);
    }
}
