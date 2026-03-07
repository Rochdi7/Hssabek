<?php

namespace App\Models\Billing;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Plan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'code',
        'interval',
        'price',
        'currency',
        'trial_days',
        'is_active',
        'is_popular',
        'features',
        'max_users',
        'max_customers',
        'max_products',
        'max_invoices_per_month',
        'max_quotes_per_month',
        'max_exports_per_month',
        'max_warehouses',
        'max_bank_accounts',
        'max_storage_mb',
    ];

    protected $casts = [
        'features' => 'json',
        'is_active' => 'boolean',
        'is_popular' => 'boolean',
        'price' => 'decimal:2',
        'trial_days' => 'integer',
        'max_users' => 'integer',
        'max_customers' => 'integer',
        'max_products' => 'integer',
        'max_invoices_per_month' => 'integer',
        'max_quotes_per_month' => 'integer',
        'max_exports_per_month' => 'integer',
        'max_warehouses' => 'integer',
        'max_bank_accounts' => 'integer',
        'max_storage_mb' => 'integer',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Format a limit value for display.
     */
    public function formatLimit(?int $value): string
    {
        return $value === null ? 'Illimité' : (string) $value;
    }
}
