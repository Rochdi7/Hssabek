<?php

namespace Tests\Feature\Settings;

use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BackofficeLocaleSwitchTest extends TestCase
{
    use RefreshDatabase;

    public function test_locale_switch_persists_language_without_existing_tenant_context(): void
    {
        $data = $this->createTenantWithAdmin();

        TenantContext::forget();

        $response = $this->actingAs($data['user'])
            ->from(route('bo.account.settings.edit'))
            ->post(route('bo.locale.switch'), [
                'locale' => 'ar',
            ]);

        $response->assertRedirect(route('bo.account.settings.edit'));

        $settings = TenantSetting::withoutGlobalScopes()
            ->where('tenant_id', $data['tenant']->id)
            ->firstOrFail();

        $this->assertSame('ar', $settings->localization_settings['language'] ?? null);
    }
}
