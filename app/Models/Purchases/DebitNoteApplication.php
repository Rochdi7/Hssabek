<?php

namespace App\Models\Purchases;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DebitNoteApplication extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    public $timestamps = false;

    protected $fillable = [
        'debit_note_id',
        'vendor_bill_id',
        'amount_applied',
        'applied_at',
    ];

    protected $casts = [
        'amount_applied' => 'decimal:2',
        'applied_at'     => 'datetime',
    ];

    public function debitNote(): BelongsTo
    {
        return $this->belongsTo(DebitNote::class);
    }

    public function vendorBill(): BelongsTo
    {
        return $this->belongsTo(VendorBill::class);
    }
}
