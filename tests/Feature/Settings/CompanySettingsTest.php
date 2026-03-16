<?php

namespace Tests\Feature\Settings;

use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Tenant;
use App\Models\Tenancy\TenantSetting;
use App\Models\User;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanySettingsTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;
    private User $adminUser;
    private TenantSetting $settings;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::create([
            'name'             => 'Test Company',
            'slug'             => 'test-company',
            'status'           => 'active',
            'timezone'         => 'UTC',
            'default_currency' => 'MAD',
            'has_free_trial'   => false,
        ]);

        $this->settings = TenantSetting::withoutGlobalScopes()->create([
            'tenant_id'             => $this->tenant->id,
            'company_settings'      => [],
            'invoice_settings'      => [],
            'localization_settings' => [],
        ]);

        TenantContext::set($this->tenant);

        // Create active subscription
        $plan = Plan::firstOrCreate(
            ['code' => 'test-plan'],
            ['name' => 'Test Plan', 'interval' => 'month', 'price' => 0, 'currency' => 'MAD', 'is_active' => true]
        );
        Subscription::create([
            'tenant_id' => $this->tenant->id,
            'plan_id'   => $plan->id,
            'status'    => 'active',
            'starts_at' => now(),
            'ends_at'   => null,
        ]);

        // Create permissions
        $settingsViewPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.settings.view',
            'guard_name' => 'web',
        ]);
        $settingsEditPerm = Permission::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'access.settings.edit',
            'guard_name' => 'web',
        ]);

        $adminRole = Role::create([
            'tenant_id'  => $this->tenant->id,
            'name'       => 'admin',
            'guard_name' => 'web',
        ]);
        $adminRole->givePermissionTo([$settingsViewPerm, $settingsEditPerm]);

        $this->adminUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);
        $this->adminUser->assignRole($adminRole);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    // ──────────── Company Settings ────────────

    public function test_admin_can_view_company_settings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.settings.company.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.settings.company');
        $response->assertViewHas('settings');
        $response->assertViewHas('tenant');
    }

    public function test_admin_can_update_company_settings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.settings.company.update'), [
                'company_name'        => 'Ma Société SARL',
                'company_email'       => 'contact@masociete.ma',
                'company_phone'       => '+212522000000',
                'company_fax'         => '+212522000001',
                'company_website'     => 'https://masociete.ma',
                'tax_id'              => 'IF12345678',
                'registration_number' => 'RC123456',
                'address'             => '123 Rue Mohammed V',
                'country'             => 'Maroc',
                'state'               => 'Casablanca-Settat',
                'city'                => 'Casablanca',
                'postal_code'         => '20000',
            ]);

        $response->assertRedirect(route('bo.settings.company.edit'));
        $response->assertSessionHas('success');

        $this->settings->refresh();
        $companySettings = $this->settings->company_settings;

        $this->assertEquals('Ma Société SARL', $companySettings['company_name']);
        $this->assertEquals('contact@masociete.ma', $companySettings['company_email']);
        $this->assertEquals('+212522000000', $companySettings['company_phone']);
        $this->assertEquals('IF12345678', $companySettings['tax_id']);
        $this->assertEquals('Casablanca', $companySettings['city']);
    }

    public function test_company_name_is_required(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.settings.company.update'), [
                'company_name' => '',
            ]);

        $response->assertSessionHasErrors('company_name');
    }

    // ──────────── Invoice Settings ────────────

    public function test_admin_can_view_invoice_settings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.settings.invoice.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.settings.invoice');
    }

    public function test_admin_can_update_invoice_settings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.settings.invoice.update'), [
                'invoice_prefix'       => 'FAC-',
                'invoice_round_off'    => '5',
                'show_company_details' => '1',
                'payment_terms_days'   => '30',
                'invoice_terms'        => 'Paiement à 30 jours',
                'invoice_footer'       => 'Merci pour votre confiance.',
            ]);

        $response->assertRedirect(route('bo.settings.invoice.edit'));
        $response->assertSessionHas('success');

        $this->settings->refresh();
        $invoiceSettings = $this->settings->invoice_settings;

        $this->assertEquals('FAC-', $invoiceSettings['invoice_prefix']);
        $this->assertEquals('5', $invoiceSettings['invoice_round_off']);
        $this->assertEquals('30', $invoiceSettings['payment_terms_days']);
        $this->assertEquals('Paiement à 30 jours', $invoiceSettings['invoice_terms']);
    }

    // ──────────── Localization Settings ────────────

    public function test_admin_can_view_locale_settings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->get(route('bo.settings.locale.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.settings.locale');
    }

    public function test_admin_can_update_locale_settings(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.settings.locale.update'), [
                'locale'      => 'fr',
                'timezone'    => 'Africa/Casablanca',
                'currency'    => 'MAD',
                'date_format' => 'd/m/Y',
                'time_format' => '24',
            ]);

        $response->assertRedirect(route('bo.settings.locale.edit'));
        $response->assertSessionHas('success');

        $this->settings->refresh();
        $localeSettings = $this->settings->localization_settings;

        $this->assertEquals('fr', $localeSettings['locale']);
        $this->assertEquals('Africa/Casablanca', $localeSettings['timezone']);
        $this->assertEquals('MAD', $localeSettings['currency']);
        $this->assertEquals('d/m/Y', $localeSettings['date_format']);
    }

    public function test_invalid_locale_is_rejected(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.settings.locale.update'), [
                'locale'      => 'xx',
                'timezone'    => 'Africa/Casablanca',
                'currency'    => 'MAD',
                'date_format' => 'd/m/Y',
                'time_format' => '24',
            ]);

        $response->assertSessionHasErrors('locale');
    }

    // ──────────── Permission Check ────────────

    public function test_user_without_permission_cannot_access_settings(): void
    {
        $basicUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status'    => 'active',
        ]);

        $response = $this->actingAs($basicUser)
            ->get(route('bo.settings.company.edit'));

        $response->assertStatus(403);
    }
}
