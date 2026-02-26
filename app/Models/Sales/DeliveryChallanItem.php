<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryChallanItem extends Model
{
    use HasUuids;

    protected $fillable = [
        'delivery_challan_id',
        'product_id',
        'quantity_ordered',
        'quantity_delivered',
    ];

    protected $casts = [
        'quantity_ordered' => 'integer',
        'quantity_delivered' => 'integer',
    ];

    public function deliveryChallан(): BelongsTo
    {
        return $this->belongsTo(DeliveryChallан::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Product::class);
    }
}
