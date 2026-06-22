<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BackofficeTenantAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_still_open_backoffice_account_settings(): void
    {
        $superAdmin = User::factory()->create([
            'tenant_id' => null,
            'status' => 'active',
        ]);

        $response = $this->actingAs($superAdmin)
            ->get(route('bo.account.settings.edit'));

        $response->assertOk();
        $response->assertViewIs('backoffice.account-settings');
    }

    public function test_super_admin_is_redirected_away_from_tenant_only_backoffice_settings(): void
    {
        $superAdmin = User::factory()->create([
            'tenant_id' => null,
            'status' => 'active',
        ]);

        $tenantOnlyRoutes = [
            'bo.settings.company.edit',
            'bo.settings.locale.edit',
            'bo.settings.invoice.edit',
            'bo.settings.invoice-templates.index',
            'bo.settings.notifications.edit',
            'bo.settings.appearance.edit',
            'bo.settings.plans-billings.index',
        ];

        foreach ($tenantOnlyRoutes as $routeName) {
            $response = $this->actingAs($superAdmin)
                ->get(route($routeName));

            $response->assertRedirect(route('bo.account.settings.edit'));
            $response->assertSessionHas('error');
        }
    }
}
