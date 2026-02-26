<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModelHasRole extends Pivot
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'model_has_roles';

    protected $fillable = [
        'role_id',
        'model_id',
        'model_type',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
