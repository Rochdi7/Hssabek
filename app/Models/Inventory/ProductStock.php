<?php

namespace App\Models\Inventory;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductStock extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    const UPDATED_AT = 'updated_at';
    const CREATED_AT = null;

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'quantity_on_hand',
        'quantity_reserved',
        'reorder_point',
        'reorder_quantity',
    ];

    protected $casts = [
        'quantity_on_hand'  => 'decimal:3',
        'quantity_reserved' => 'decimal:3',
        'reorder_point'     => 'decimal:3',
        'reorder_quantity'  => 'decimal:3',
    ];

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Product::class);
    }
}
