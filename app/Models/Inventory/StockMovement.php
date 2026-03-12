<?php

namespace App\Models\Inventory;

use App\Traits\BelongsToTenant;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovement extends Model
{
    use HasFactory, HasUuids, BelongsToTenant, UsesTenantCurrency;

    const UPDATED_AT = null;

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'movement_type',
        'quantity',
        'unit_cost',
        'reference_type',
        'reference_id',
        'note',
        'moved_at',
        'created_by',
    ];

    protected $casts = [
        'quantity'  => 'decimal:3',
        'unit_cost' => 'decimal:2',
        'moved_at'  => 'datetime',
    ];

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Product::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
}
