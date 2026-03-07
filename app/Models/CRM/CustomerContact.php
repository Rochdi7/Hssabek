<?php

namespace App\Models\CRM;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class CustomerContact extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'position',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
