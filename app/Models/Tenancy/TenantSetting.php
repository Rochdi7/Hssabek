<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantSetting extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'tenant_id',
        'account_settings',
        'company_settings',
        'localization_settings',
        'invoice_settings',
        'notification_settings',
        'signature_settings',
        'integration_settings',
        'modules_settings',
    ];

    protected $casts = [
        'account_settings' => 'json',
        'company_settings' => 'json',
        'localization_settings' => 'json',
        'invoice_settings' => 'json',
        'notification_settings' => 'json',
        'signature_settings' => 'json',
        'integration_settings' => 'json',
        'modules_settings' => 'json',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
