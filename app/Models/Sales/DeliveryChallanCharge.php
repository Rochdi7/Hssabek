<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryChallanCharge extends Model
{
    use HasUuids;

    protected $fillable = [
        'delivery_challan_id',
        'charge_name',
        'charge_amount',
    ];

    protected $casts = [
        'charge_amount' => 'decimal:2',
    ];

    public function deliveryChallан(): BelongsTo
    {
        return $this->belongsTo(DeliveryChallан::class);
    }
}
