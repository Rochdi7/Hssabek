<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryChallан extends Model
{
    use HasUuids;

    protected $fillable = [
        'tenant_id',
        'invoice_id',
        'challan_number',
        'challan_date',
        'delivered_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'challan_date' => 'date',
        'delivered_date' => 'date',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Tenancy\Tenant::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(DeliveryChallanItem::class);
    }

    public function charges(): HasMany
    {
        return $this->hasMany(DeliveryChallanCharge::class);
    }
}
