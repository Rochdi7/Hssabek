<?php

namespace Tests\Unit\Services;

use App\Models\Tenancy\Tenant;
use App\Services\System\DocumentNumberService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentNumberServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * next() must return sequential, formatted document numbers.
     */
    public function test_generates_sequential_document_numbers(): void
    {
        $tenant = $this->createTenant('dns-a');
        TenantContext::set($tenant);

        $service = app(DocumentNumberService::class);

        $first  = $service->next('invoice');
        $second = $service->next('invoice');

        $this->assertMatchesRegularExpression('/^INV-\d{5}$/', $first);
        $this->assertMatchesRegularExpression('/^INV-\d{5}$/', $second);
        $this->assertNotEquals($first, $second);
    }

    /**
     * next() must use the format: PREFIX-00001 padded to 5 digits.
     */
    public function test_first_number_is_padded_correctly(): void
    {
        $tenant = $this->createTenant('dns-b');
        TenantContext::set($tenant);

        $service = app(DocumentNumberService::class);
        $number  = $service->next('invoice');

        $this->assertEquals('INV-00001', $number);
    }

    /**
     * next() must increment the sequence on each call.
     */
    public function test_numbers_increment_by_one(): void
    {
        $tenant = $this->createTenant('dns-c');
        TenantContext::set($tenant);

        $service = app(DocumentNumberService::class);

        $first  = $service->next('quote');
        $second = $service->next('quote');
        $third  = $service->next('quote');

        $this->assertEquals('QUO-00001', $first);
        $this->assertEquals('QUO-00002', $second);
        $this->assertEquals('QUO-00003', $third);
    }

    /**
     * next() must throw RuntimeException when TenantContext is not set.
     */
    public function test_throws_when_no_tenant_context(): void
    {
        TenantContext::forget();

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('TenantContext not set.');

        app(DocumentNumberService::class)->next('invoice');
    }

    /**
     * Different document types must have independent sequences.
     */
    public function test_separate_sequences_per_document_type(): void
    {
        $tenant = $this->createTenant('dns-d');
        TenantContext::set($tenant);

        $service = app(DocumentNumberService::class);

        $inv1 = $service->next('invoice');
        $quo1 = $service->next('quote');
        $inv2 = $service->next('invoice');

        $this->assertEquals('INV-00001', $inv1);
        $this->assertEquals('QUO-00001', $quo1);
        $this->assertEquals('INV-00002', $inv2);
    }
}
