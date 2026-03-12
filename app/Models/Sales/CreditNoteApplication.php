<?php

namespace App\Models\Sales;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreditNoteApplication extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    protected $fillable = [
        'credit_note_id',
        'invoice_id',
        'amount_applied',
        'applied_at',
    ];

    protected $casts = [
        'amount_applied' => 'decimal:2',
        'applied_at' => 'datetime',
    ];

    public function creditNote(): BelongsTo
    {
        return $this->belongsTo(CreditNote::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
