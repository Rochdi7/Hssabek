<?php

namespace Tests\Unit\Services;

use App\Models\CRM\Customer;
use App\Models\Finance\Expense;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Services\Reports\ReportService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ReportServiceTest extends TestCase
{
    use RefreshDatabase;

    private ReportService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);

        Cache::flush();
        $this->service = app(ReportService::class);
    }

    private function bindRequest(int $page, int $perPage): void
    {
        app()->instance('request', Request::create('/backoffice/reports', 'GET', [
            'page' => $page,
            'per_page' => $perPage,
        ]));
    }

    private function assertDifferentPagesAreNotMixed(callable $resolver, string $paginatorKey): void
    {
        $this->bindRequest(1, 5);
        $page1 = $resolver();

        $this->bindRequest(2, 5);
        $page2 = $resolver();

        $this->assertSame(1, $page1[$paginatorKey]->currentPage());
        $this->assertSame(2, $page2[$paginatorKey]->currentPage());

        $page1Ids = collect($page1[$paginatorKey]->items())->pluck('id')->all();
        $page2Ids = collect($page2[$paginatorKey]->items())->pluck('id')->all();

        $this->assertNotEmpty($page1Ids);
        $this->assertNotEmpty($page2Ids);
        $this->assertNotEquals($page1Ids, $page2Ids);
    }

    public function test_sales_summary_cache_is_paginated_per_page_number(): void
    {
        $customer = Customer::factory()->create();

        for ($i = 0; $i < 12; $i++) {
            Invoice::factory()->create([
                'customer_id' => $customer->id,
                'status' => 'sent',
                'issue_date' => now()->subDays($i)->toDateString(),
                'due_date' => now()->addDays(30)->toDateString(),
            ]);
        }

        $from = now()->subMonths(2)->toDateString();
        $to = now()->addDay()->toDateString();

        $this->assertDifferentPagesAreNotMixed(
            fn () => $this->service->salesSummary($from, $to),
            'invoices'
        );
    }

    public function test_customer_summary_cache_is_paginated_per_page_number(): void
    {
        Customer::factory()->count(12)->create();

        $from = now()->subMonths(2)->toDateString();
        $to = now()->addDay()->toDateString();

        $this->assertDifferentPagesAreNotMixed(
            fn () => $this->service->customerSummary($from, $to),
            'customers'
        );
    }

    public function test_purchase_summary_cache_is_paginated_per_page_number(): void
    {
        $supplier = Supplier::factory()->create();

        for ($i = 0; $i < 12; $i++) {
            VendorBill::factory()->create([
                'supplier_id' => $supplier->id,
                'status' => 'posted',
                'issue_date' => now()->subDays($i)->toDateString(),
                'due_date' => now()->addDays(30)->toDateString(),
            ]);
        }

        $from = now()->subMonths(2)->toDateString();
        $to = now()->addDay()->toDateString();

        $this->assertDifferentPagesAreNotMixed(
            fn () => $this->service->purchaseSummary($from, $to),
            'vendorBills'
        );
    }

    public function test_finance_summary_cache_is_paginated_per_page_number(): void
    {
        for ($i = 0; $i < 12; $i++) {
            Expense::factory()->create([
                'expense_date' => now()->subDays($i)->toDateString(),
                'payment_mode' => 'bank_transfer',
                'payment_status' => 'paid',
            ]);
        }

        $from = now()->subMonths(2)->toDateString();
        $to = now()->addDay()->toDateString();

        $this->assertDifferentPagesAreNotMixed(
            fn () => $this->service->financeSummary($from, $to),
            'expenses'
        );
    }
}
