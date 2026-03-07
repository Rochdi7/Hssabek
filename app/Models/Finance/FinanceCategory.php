<?php

namespace App\Models\Finance;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class FinanceCategory extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'type',
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class, 'category_id');
    }

    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class, 'category_id');
    }
}
