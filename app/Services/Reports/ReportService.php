<?php

namespace App\Services\Reports;

use App\Models\CRM\Customer;
use App\Models\Catalog\Product;
use App\Models\Finance\Expense;
use App\Models\Finance\Income;
use App\Models\Inventory\ProductStock;
use App\Models\Inventory\StockMovement;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportService
{
    private function tenantId(): string
    {
        return TenantContext::id() ?? throw new \RuntimeException('No tenant context.');
    }

    private function cacheVersion(): int
    {
        return (int) Cache::get("report:version:{$this->tenantId()}", 0);
    }

    private function cacheKey(string $prefix, string $from, string $to): string
    {
        $v = $this->cacheVersion();
        return "report:{$prefix}:{$this->tenantId()}:v{$v}:{$from}:{$to}";
    }

    /**
     * Flush all report/dashboard caches for a tenant by incrementing the version key.
     * Old versioned keys will expire naturally (TTL 5 min).
     */
    public static function flushTenantCache(?string $tenantId = null): void
    {
        $tenantId = $tenantId ?? TenantContext::id();
        if (!$tenantId) {
            return;
        }

        Cache::increment("report:version:{$tenantId}");
        Cache::forget("dashboard:kpis:{$tenantId}");
        Cache::forget("report:inventory:{$tenantId}");
    }

    private function validateDateRange(?string $from, ?string $to): array
    {
        try {
            $from = $from ? Carbon::parse($from) : Carbon::now()->startOfMonth();
            $to = $to ? Carbon::parse($to) : Carbon::now()->endOfMonth();
        } catch (\Exception) {
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth();
        }

        if ($from->diffInDays($to) > 366) {
            $from = $to->copy()->subDays(366);
        }

        return [$from->toDateString(), $to->toDateString()];
    }

    // ─── SALES ───

    public function salesSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);
        return Cache::remember($this->cacheKey('sales', $from, $to), 300, function () use ($from, $to) {

            $summary = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->selectRaw("
                    COUNT(*) as invoice_count,
                    COALESCE(SUM(total), 0) as total_revenue,
                    COALESCE(SUM(CASE WHEN status = 'paid' THEN total ELSE 0 END), 0) as collected,
                    COALESCE(SUM(CASE WHEN status != 'paid' THEN amount_due ELSE 0 END), 0) as outstanding
                ")
                ->first();

            $byMonth = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->selectRaw("DATE_FORMAT(issue_date, '%Y-%m') as month, COALESCE(SUM(total), 0) as revenue")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $topCustomers = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->with('customer:id,name')
                ->selectRaw('customer_id, COALESCE(SUM(total), 0) as total')
                ->groupBy('customer_id')
                ->orderByDesc('total')
                ->limit(10)
                ->get();

            $invoices = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->with('customer:id,name')
                ->latest('issue_date')
                ->paginate(15)
                ->withQueryString();

            return compact('summary', 'byMonth', 'topCustomers', 'invoices');
        });
    }

    // ─── CUSTOMERS ───

    public function customerSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);

        return Cache::remember($this->cacheKey('customers', $from, $to), 300, function () use ($from, $to) {

            $totalCustomers = Customer::count();

            $newCustomers = Customer::whereBetween('created_at', [$from, $to . ' 23:59:59'])->count();

            $totalRevenue = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->sum('total');

            $avgRevenue = $totalCustomers > 0
                ? round($totalRevenue / $totalCustomers, 2)
                : 0;

            $customers = Customer::withCount(['invoices' => function ($q) use ($from, $to) {
                    $q->whereBetween('issue_date', [$from, $to])
                      ->where('status', '!=', 'cancelled');
                }])
                ->withSum(['invoices as total_revenue' => function ($q) use ($from, $to) {
                    $q->whereBetween('issue_date', [$from, $to])
                      ->where('status', '!=', 'cancelled');
                }], 'total')
                ->withSum(['invoices as total_due' => function ($q) use ($from, $to) {
                    $q->whereBetween('issue_date', [$from, $to])
                      ->where('status', '!=', 'cancelled');
                }], 'amount_due')
                ->latest()
                ->paginate(15)
                ->withQueryString();

            return compact('totalCustomers', 'newCustomers', 'totalRevenue', 'avgRevenue', 'customers');
        });
    }

    // ─── PURCHASES ───

    public function purchaseSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);

        return Cache::remember($this->cacheKey('purchases', $from, $to), 300, function () use ($from, $to) {

            $totalPurchases = VendorBill::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->sum('total');

            $paidPurchases = VendorBill::whereBetween('issue_date', [$from, $to])
                ->where('status', 'paid')
                ->sum('total');

            $pendingPurchases = VendorBill::whereBetween('issue_date', [$from, $to])
                ->whereNotIn('status', ['paid', 'cancelled'])
                ->sum('total');

            $cancelledPurchases = VendorBill::whereBetween('issue_date', [$from, $to])
                ->where('status', 'cancelled')
                ->sum('total');

            $vendorBills = VendorBill::whereBetween('issue_date', [$from, $to])
                ->with('supplier:id,name')
                ->latest('issue_date')
                ->paginate(15)
                ->withQueryString();

            return compact('totalPurchases', 'paidPurchases', 'pendingPurchases', 'cancelledPurchases', 'vendorBills');
        });
    }

    // ─── FINANCE ───

    public function financeSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);

        return Cache::remember($this->cacheKey('finance', $from, $to), 300, function () use ($from, $to) {

            $totalExpenses = Expense::whereBetween('expense_date', [$from, $to])
                ->sum('amount');

            $totalIncome = Income::whereBetween('income_date', [$from, $to])
                ->sum('amount');

            $netProfit = $totalIncome - $totalExpenses;

            $expensesByCategory = Expense::whereBetween('expense_date', [$from, $to])
                ->with('category:id,name')
                ->selectRaw('category_id, COALESCE(SUM(amount), 0) as total')
                ->groupBy('category_id')
                ->orderByDesc('total')
                ->get();

            $incomesByCategory = Income::whereBetween('income_date', [$from, $to])
                ->with('category:id,name')
                ->selectRaw('category_id, COALESCE(SUM(amount), 0) as total')
                ->groupBy('category_id')
                ->orderByDesc('total')
                ->get();

            $expenses = Expense::whereBetween('expense_date', [$from, $to])
                ->with(['category:id,name', 'supplier:id,name', 'bankAccount:id,account_holder_name'])
                ->latest('expense_date')
                ->paginate(15)
                ->withQueryString();

            return compact('totalExpenses', 'totalIncome', 'netProfit', 'expensesByCategory', 'incomesByCategory', 'expenses');
        });
    }

    // ─── DASHBOARD ───

    public function dashboardKpis(): array
    {
        $tenantId = $this->tenantId();
        $cacheKey = "dashboard:kpis:{$tenantId}";

        return Cache::remember($cacheKey, 300, function () {
            $now     = now();
            $mtdFrom = $now->copy()->startOfMonth()->toDateString();
            $ytdFrom = $now->copy()->startOfYear()->toDateString();
            $today   = $now->toDateString();

            // Revenue MTD (non-void invoices)
            $revenueMtd = Invoice::whereBetween('issue_date', [$mtdFrom, $today])
                ->where('status', '!=', 'void')
                ->sum('total');

            // Revenue YTD
            $revenueYtd = Invoice::whereBetween('issue_date', [$ytdFrom, $today])
                ->where('status', '!=', 'void')
                ->sum('total');

            // Outstanding (unpaid invoices)
            $outstanding = Invoice::whereIn('status', ['sent', 'partial', 'overdue'])
                ->sum('amount_due');

            // Overdue count
            $overdueCount = Invoice::whereIn('status', ['sent', 'partial'])
                ->where('due_date', '<', $today)
                ->count();

            // Collected (paid)
            $collected = Invoice::whereBetween('issue_date', [$mtdFrom, $today])
                ->where('status', 'paid')
                ->sum('total');

            // Total customers
            $customerCount = Customer::count();

            // Invoice status breakdown
            $statusBreakdown = Invoice::selectRaw("status, COUNT(*) as count, COALESCE(SUM(total), 0) as total")
                ->groupBy('status')
                ->get()
                ->keyBy('status');

            // Recent invoices (last 5)
            $recentInvoices = Invoice::with('customer:id,name')
                ->latest('issue_date')
                ->limit(5)
                ->get();

            // Recent quotes (last 5)
            $recentQuotes = \App\Models\Sales\Quote::with('customer:id,name')
                ->latest('issue_date')
                ->limit(5)
                ->get();

            // Top customers (YTD)
            $topCustomers = Invoice::whereBetween('issue_date', [$ytdFrom, $today])
                ->where('status', '!=', 'void')
                ->with('customer:id,name')
                ->selectRaw('customer_id, COALESCE(SUM(total), 0) as revenue')
                ->groupBy('customer_id')
                ->orderByDesc('revenue')
                ->limit(5)
                ->get();

            // Revenue last 12 months (line chart)
            $revenueTrend = Invoice::where('issue_date', '>=', $now->copy()->subMonths(11)->startOfMonth())
                ->where('status', '!=', 'void')
                ->selectRaw("DATE_FORMAT(issue_date, '%Y-%m') as month, COALESCE(SUM(total), 0) as revenue")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // Low stock alerts
            $lowStockCount = ProductStock::whereNotNull('reorder_point')
                ->whereRaw('quantity_on_hand <= reorder_point')
                ->count();

            // Total expenses MTD
            $expensesMtd = Expense::whereBetween('expense_date', [$mtdFrom, $today])
                ->sum('amount');

            return compact(
                'revenueMtd', 'revenueYtd', 'outstanding', 'overdueCount',
                'collected', 'customerCount', 'statusBreakdown',
                'recentInvoices', 'recentQuotes', 'topCustomers',
                'revenueTrend', 'lowStockCount', 'expensesMtd'
            );
        });
    }

    // ─── INVENTORY ───

    public function inventorySummary(): array
    {
        $tenantId = $this->tenantId();
        $cacheKey = "report:inventory:{$tenantId}";

        return Cache::remember($cacheKey, 300, function () {

            $totalValue = Product::where('is_active', true)
                ->selectRaw('COALESCE(SUM(selling_price * quantity), 0) as total')
                ->value('total');

            $lowStockCount = ProductStock::whereRaw('quantity_on_hand <= reorder_point')
                ->where('quantity_on_hand', '>', 0)
                ->count();

            $outOfStockCount = ProductStock::where('quantity_on_hand', '<=', 0)->count();

            $pendingReorders = ProductStock::whereRaw('quantity_on_hand <= reorder_point')
                ->count();

            $products = Product::where('is_active', true)
                ->with(['category:id,name', 'unit:id,name,short_name'])
                ->latest()
                ->paginate(15)
                ->withQueryString();

            $lowStockItems = ProductStock::whereRaw('quantity_on_hand <= reorder_point')
                ->with(['product:id,name,sku,code', 'warehouse:id,name'])
                ->orderBy('quantity_on_hand')
                ->get();

            return compact('totalValue', 'lowStockCount', 'outOfStockCount', 'pendingReorders', 'products', 'lowStockItems');
        });
    }
}
