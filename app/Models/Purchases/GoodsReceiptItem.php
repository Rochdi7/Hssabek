<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoodsReceiptItem extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'goods_receipt_id',
        'purchase_order_item_id',
        'product_id',
        'quantity',
        'unit_cost',
        'tax_rate',
        'tax_group_id',
        'line_total',
        'position',
    ];

    protected $casts = [
        'quantity'   => 'decimal:3',
        'unit_cost'  => 'decimal:2',
        'tax_rate'   => 'decimal:4',
        'line_total' => 'decimal:2',
        'position'   => 'integer',
    ];

    public function goodsReceipt(): BelongsTo
    {
        return $this->belongsTo(GoodsReceipt::class);
    }

    public function purchaseOrderItem(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrderItem::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Catalog\Product::class);
    }
}
