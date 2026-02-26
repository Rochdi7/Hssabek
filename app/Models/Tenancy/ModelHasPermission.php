<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModelHasPermission extends Pivot
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'model_has_permissions';

    protected $fillable = [
        'permission_id',
        'model_id',
        'model_type',
    ];

    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
