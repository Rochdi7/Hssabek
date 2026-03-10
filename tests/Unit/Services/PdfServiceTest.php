<?php

namespace Tests\Unit\Services;

use App\Models\Tenancy\TenantSetting;
use App\Services\Sales\PdfService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class PdfServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_resolve_view_supports_catalog_code_selection_per_document_type(): void
    {
        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        TenantSetting::create([
            'tenant_id' => $tenant->id,
            'invoice_settings' => [
                'pdf_templates' => [
                    'quote' => 'quote-modern',
                ],
            ],
        ]);

        DB::table('template_catalog')->insert([
            'id' => (string) Str::uuid(),
            'code' => 'quote-modern',
            'name' => 'Quote Modern',
            'slug' => 'quote-modern',
            'document_type' => 'quote',
            'engine' => 'blade',
            'view_path' => 'pdf.templates.modern.quote',
            'price' => 0,
            'currency' => 'MAD',
            'is_free' => true,
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $service = app(PdfService::class);
        $method = new \ReflectionMethod(PdfService::class, 'resolveView');
        $method->setAccessible(true);

        $resolved = $method->invoke($service, 'quote');

        $this->assertSame('pdf.templates.modern.quote', $resolved);
    }
}

