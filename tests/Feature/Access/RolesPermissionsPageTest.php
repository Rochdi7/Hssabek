<?php

namespace Tests\Feature\Access;

use App\Models\Tenancy\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RolesPermissionsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions_page_shows_dashboard_and_export_permissions_in_french(): void
    {
        app()->setLocale('fr');

        $data = $this->createTenantWithAdmin();

        $role = Role::create([
            'tenant_id' => $data['tenant']->id,
            'name' => 'custom-role',
            'guard_name' => 'web',
        ]);

        $response = $this->actingAs($data['user'])
            ->get(route('bo.access.roles.permissions', $role));

        $response->assertOk();
        $response->assertSeeText('Tableau de bord');
        $response->assertSeeText('Exporter');
    }

    public function test_permissions_page_is_translatable_in_arabic(): void
    {
        app()->setLocale('ar');

        $data = $this->createTenantWithAdmin();

        $role = Role::create([
            'tenant_id' => $data['tenant']->id,
            'name' => 'custom-role',
            'guard_name' => 'web',
        ]);

        $response = $this->actingAs($data['user'])
            ->get(route('bo.access.roles.permissions', $role));

        $response->assertOk();
        $response->assertSeeText('لوحة القيادة');
        $response->assertSeeText('تصدير');
    }
}
