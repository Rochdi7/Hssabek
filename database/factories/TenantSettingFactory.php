<?php

namespace Database\Factories;

use App\Models\Tenancy\TenantSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantSettingFactory extends Factory
{
    protected $model = TenantSetting::class;

    public function definition(): array
    {
        return [
            'tenant_id' => TenantFactory::new(),
            'account_settings' => [],
            'company_settings' => [],
            'localization_settings' => [],
            'invoice_settings' => [],
            'notification_settings' => [],
            'signature_settings' => [],
            'integration_settings' => [],
            'modules_settings' => [],
        ];
    }
}
