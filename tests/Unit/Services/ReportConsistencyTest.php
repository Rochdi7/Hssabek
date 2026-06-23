<?php

namespace Tests\Unit\Services;

use App\Models\CRM\Customer;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Services\Reports\ReportService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ReportConsistencyTest extends TestCase
{
    use RefreshDatabase;

    private ReportService $service;
    private Customer $customer;
    private Supplier $supplier;

    protected function setUp(): void
    {
        parent::setUp();

        $tenant = $this->createTenant();
        TenantContext::set($tenant);
        Cache::flush();

        $this->customer = Customer::factory()->create();
        $this->supplier = Supplier::factory()->create();
        $this->service = app(ReportService::class);
    }

    private function invoice(string $status, float $total, float $due, ?string $issue = null): Invoice
    {
        return Invoice::factory()->create([
            'customer_id' => $this->customer->id,
            'status' => $status,
            'issue_date' => $issue ?? now()->toDateString(),
            'due_date' => now()->addDays(30)->toDateString(),
            'total' => $total,
            'amount_paid' => $total - $due,
            'amount_due' => $due,
        ]);
    }

    public function test_void_invoices_are_excluded_from_ca(): void
    {
        $this->invoice('unpaid', 1000, 1000);
        $this->invoice('paid', 500, 0);
        $this->invoice('void', 9999, 9999); // must NOT count

        $from = now()->subDay()->toDateString();
        $to = now()->addDay()->toDateString();

        $summary = $this->service->salesSummary($from, $to)['summary'];

        // CA = 1000 + 500, void excluded
        $this->assertEquals(1500.0, (float) $summary->total_revenue);
        $this->assertEquals(2, (int) $summary->invoice_count);
    }

    public function test_dashboard_revenue_ytd_matches_sales_summary_for_same_window(): void
    {
        $this->invoice('unpaid', 1000, 1000, now()->startOfYear()->toDateString());
        $this->invoice('paid', 500, 0, now()->subDays(2)->toDateString());
        $this->invoice('void', 7777, 7777); // excluded everywhere

        $kpis = $this->service->dashboardKpis();

        Cache::flush();
        $summary = $this->service->salesSummary(
            now()->startOfYear()->toDateString(),
            now()->toDateString()
        )['summary'];

        // The core guarantee: dashboard KPI and the sales report agree for the same window.
        $this->assertEquals((float) $summary->total_revenue, (float) $kpis['revenueYtd']);
        // And the void invoice is excluded from both.
        $this->assertEquals(1500.0, (float) $kpis['revenueYtd']);
    }

    public function test_outstanding_includes_unpaid_partial_overdue_not_paid_or_void(): void
    {
        $this->invoice('unpaid', 1000, 1000);
        $this->invoice('partial', 1000, 400);
        $this->invoice('overdue', 1000, 1000);
        $this->invoice('paid', 1000, 0);      // excluded
        $this->invoice('void', 5000, 5000);   // excluded

        $kpis = $this->service->dashboardKpis();

        // 1000 + 400 + 1000 = 2400
        $this->assertEquals(2400.0, (float) $kpis['outstanding']);
    }

    public function test_void_vendor_bills_excluded_from_purchases(): void
    {
        VendorBill::factory()->create([
            'supplier_id' => $this->supplier->id, 'status' => 'unpaid',
            'issue_date' => now()->toDateString(), 'total' => 800, 'amount_due' => 800,
        ]);
        VendorBill::factory()->create([
            'supplier_id' => $this->supplier->id, 'status' => 'void',
            'issue_date' => now()->toDateString(), 'total' => 9999, 'amount_due' => 9999,
        ]);

        $from = now()->subDay()->toDateString();
        $to = now()->addDay()->toDateString();

        $result = $this->service->purchaseSummary($from, $to);

        $this->assertEquals(800.0, (float) $result['totalPurchases']);
        $this->assertEquals(9999.0, (float) $result['cancelledPurchases']); // the void one
    }
}
