<?php

namespace Tests\Feature\Settings;

use App\Models\Tenancy\TenantSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Tests\TestCase;

class InvoiceTemplateSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_preview_does_not_persist_default_template_selection(): void
    {
        ['tenant' => $tenant, 'user' => $user] = $this->createTenantWithAdmin();

        $domain = $tenant->domains()->where('is_primary', true)->value('domain');
        URL::forceRootUrl('http://' . $domain);

        $settings = TenantSetting::where('tenant_id', $tenant->id)->firstOrFail();
        $settings->invoice_settings = [
            'pdf_templates' => [
                'invoice' => 'default',
            ],
        ];
        $settings->save();

        DB::table('template_catalog')->insert([
            'id' => (string) Str::uuid(),
            'code' => 'invoice-modern',
            'name' => 'Invoice Modern',
            'slug' => 'invoice-modern',
            'document_type' => 'invoice',
            'engine' => 'blade',
            'view_path' => 'pdf.templates.modern.invoice',
            'price' => 0,
            'currency' => 'MAD',
            'is_free' => true,
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->actingAs($user)
            ->get(route('bo.settings.invoice-templates.preview', 'invoice-modern'));

        $response->assertStatus(200);

        $settings->refresh();
        $this->assertSame(
            'default',
            data_get($settings->invoice_settings, 'pdf_templates.invoice')
        );
    }
}

