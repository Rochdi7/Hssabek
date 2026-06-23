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
use Illuminate\Http\UploadedFile;
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
            'name' => 'Test Company',
            'slug' => 'test-company',
            'status' => 'active',
            'timezone' => 'UTC',
            'default_currency' => 'MAD',
            'has_free_trial' => false,
        ]);

        $this->settings = TenantSetting::withoutGlobalScopes()->create([
            'tenant_id' => $this->tenant->id,
            'company_settings' => [],
            'invoice_settings' => [],
            'localization_settings' => [],
        ]);

        TenantContext::set($this->tenant);

        $plan = Plan::firstOrCreate(
            ['code' => 'test-plan'],
            ['name' => 'Test Plan', 'interval' => 'month', 'price' => 0, 'currency' => 'MAD', 'is_active' => true]
        );

        Subscription::create([
            'tenant_id' => $this->tenant->id,
            'plan_id' => $plan->id,
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => null,
        ]);

        // The admin role bypasses all permission checks via Gate::before.
        // No explicit permissions need to be attached to it.
        $adminRole = Role::create([
            'tenant_id' => $this->tenant->id,
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $this->adminUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
        ]);
        $this->adminUser->assignRole($adminRole);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

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
                'company_name' => 'Ma Societe SARL',
                'forme_juridique' => 'sarl',
                'company_email' => 'contact@masociete.ma',
                'company_phone' => '+212522000000',
                'company_fax' => '+212522000001',
                'company_website' => 'https://masociete.ma',
                'tax_id' => 'IF12345678',
                'registration_number' => 'RC123456',
                'address' => '123 Rue Mohammed V',
                'country' => 'Maroc',
                'state' => 'Casablanca-Settat',
                'city' => 'Casablanca',
                'postal_code' => '20000',
            ]);

        $response->assertRedirect(route('bo.settings.company.edit'));
        $response->assertSessionHas('success');

        $this->settings->refresh();
        $companySettings = $this->settings->company_settings;

        $this->assertEquals('Ma Societe SARL', $companySettings['company_name']);
        $this->assertEquals('contact@masociete.ma', $companySettings['company_email']);
        $this->assertEquals('+212522000000', $companySettings['company_phone']);
        $this->assertEquals('IF12345678', $companySettings['tax_id']);
        $this->assertEquals('Casablanca', $companySettings['city']);
        $this->assertEquals('sarl', $companySettings['forme_juridique']);
    }

    public function test_company_name_is_required(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->put(route('bo.settings.company.update'), [
                'company_name' => '',
                'forme_juridique' => 'sarl',
            ]);

        $response->assertSessionHasErrors('company_name');
    }

    public function test_company_settings_rejects_svg_logo_uploads(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->from(route('bo.settings.company.edit'))
            ->put(route('bo.settings.company.update'), [
                'company_name' => 'Societe test',
                'forme_juridique' => 'sarl',
                'logo' => UploadedFile::fake()->createWithContent('logo.svg', '<svg><script>alert(1)</script></svg>'),
            ]);

        $response->assertRedirect(route('bo.settings.company.edit'));
        $response->assertSessionHasErrors('logo');
    }

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
                'invoice_prefix' => 'FAC-',
                'show_company_details' => '1',
                'payment_terms_days' => '30',
                'invoice_terms' => 'Paiement a 30 jours',
                'invoice_footer' => 'Merci pour votre confiance.',
            ]);

        $response->assertRedirect(route('bo.settings.invoice.edit'));
        $response->assertSessionHas('success');

        $this->settings->refresh();
        $invoiceSettings = $this->settings->invoice_settings;

        $this->assertEquals('FAC-', $invoiceSettings['invoice_prefix']);
        $this->assertEquals('30', $invoiceSettings['payment_terms_days']);
        $this->assertEquals('Paiement a 30 jours', $invoiceSettings['invoice_terms']);
    }

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
                'locale' => 'fr',
                'timezone' => 'Africa/Casablanca',
                'currency' => 'MAD',
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
                'locale' => 'xx',
                'timezone' => 'Africa/Casablanca',
                'currency' => 'MAD',
                'date_format' => 'd/m/Y',
                'time_format' => '24',
            ]);

        $response->assertSessionHasErrors('locale');
    }

    public function test_non_admin_with_invoice_permissions_can_access_invoice_settings(): void
    {
        $invoiceViewPerm = Permission::create([
            'tenant_id' => null,
            'name' => 'settings.invoices.view',
            'guard_name' => 'web',
        ]);
        $invoiceEditPerm = Permission::create([
            'tenant_id' => null,
            'name' => 'settings.invoices.edit',
            'guard_name' => 'web',
        ]);

        $role = Role::create([
            'tenant_id' => $this->tenant->id,
            'name' => 'settings-manager',
            'guard_name' => 'web',
        ]);
        $role->givePermissionTo([$invoiceViewPerm, $invoiceEditPerm]);

        $user = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
        ]);
        $user->assignRole($role);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $response = $this->actingAs($user)
            ->get(route('bo.settings.invoice.edit'));

        $response->assertOk();
        $response->assertViewIs('backoffice.settings.invoice');
    }

    public function test_non_admin_with_localization_permissions_can_access_locale_settings(): void
    {
        $localeViewPerm = Permission::create([
            'tenant_id' => null,
            'name' => 'settings.localization.view',
            'guard_name' => 'web',
        ]);
        $localeEditPerm = Permission::create([
            'tenant_id' => null,
            'name' => 'settings.localization.edit',
            'guard_name' => 'web',
        ]);

        $role = Role::create([
            'tenant_id' => $this->tenant->id,
            'name' => 'locale-manager',
            'guard_name' => 'web',
        ]);
        $role->givePermissionTo([$localeViewPerm, $localeEditPerm]);

        $user = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
        ]);
        $user->assignRole($role);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $response = $this->actingAs($user)
            ->get(route('bo.settings.locale.edit'));

        $response->assertOk();
        $response->assertViewIs('backoffice.settings.locale');
    }

    public function test_user_without_permission_cannot_access_settings(): void
    {
        $basicUser = User::factory()->create([
            'tenant_id' => $this->tenant->id,
            'status' => 'active',
        ]);

        $response = $this->actingAs($basicUser)
            ->get(route('bo.settings.company.edit'));

        $response->assertStatus(403);
    }
}
