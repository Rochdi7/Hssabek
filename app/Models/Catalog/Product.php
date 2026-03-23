<?php

namespace App\Models\Catalog;

use App\Models\Sales\InvoiceItem;
use App\Models\Sales\QuoteItem;
use App\Models\Sales\DeliveryChallanItem;
use App\Models\Purchases\PurchaseOrderItem;
use App\Models\Purchases\DebitNoteItem;
use App\Models\Purchases\GoodsReceiptItem;
use App\Models\Inventory\StockMovement;
use App\Traits\BelongsToTenant;
use App\Traits\LogsActivity;
use App\Traits\UsesTenantCurrency;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory, HasUuids, SoftDeletes, BelongsToTenant, InteractsWithMedia, UsesTenantCurrency, LogsActivity;

    protected $fillable = [
        'item_type',
        'name',
        'code',
        'sku',
        'slug',
        'category_id',
        'unit_id',
        'description',
        // Service-specific fields
        'billing_type',
        'hourly_rate',
        'estimated_hours',
        'sac_code',
        // Prices
        'selling_price',
        'purchase_price',
        'track_inventory',
        'quantity',
        'alert_quantity',
        'barcode',
        'discount_type',
        'discount_value',
        'tax_category_id',
        'is_active',
    ];

    protected $casts = [
        'selling_price'   => 'decimal:2',
        'purchase_price'  => 'decimal:2',
        'hourly_rate'     => 'decimal:2',
        'quantity'        => 'decimal:3',
        'alert_quantity'  => 'decimal:3',
        'discount_value'  => 'decimal:4',
        'track_inventory' => 'boolean',
        'is_active'       => 'boolean',
        'estimated_hours' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function taxCategory(): BelongsTo
    {
        return $this->belongsTo(TaxCategory::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(\App\Models\Inventory\ProductStock::class);
    }

    // ─── Related Sales Documents ────────────────────────────────

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function quoteItems(): HasMany
    {
        return $this->hasMany(QuoteItem::class);
    }

    public function deliveryChallanItems(): HasMany
    {
        return $this->hasMany(DeliveryChallanItem::class);
    }

    // ─── Related Purchase Documents ─────────────────────────────

    public function purchaseOrderItems(): HasMany
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function debitNoteItems(): HasMany
    {
        return $this->hasMany(DebitNoteItem::class);
    }

    public function goodsReceiptItems(): HasMany
    {
        return $this->hasMany(GoodsReceiptItem::class);
    }

    // ─── Stock Movements ────────────────────────────────────────

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
