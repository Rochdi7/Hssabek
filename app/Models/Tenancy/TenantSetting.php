<?php

namespace App\Models\Tenancy;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class TenantSetting extends Model
{
    use HasFactory, HasUuids, BelongsToTenant;

    const CREATED_AT = null;
    const UPDATED_AT = 'updated_at';

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
}
