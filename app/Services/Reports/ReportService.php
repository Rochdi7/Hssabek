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
    private function monthGroupExpression(string $column): string
    {
        return DB::connection()->getDriverName() === 'sqlite'
            ? "strftime('%Y-%m', {$column})"
            : "DATE_FORMAT({$column}, '%Y-%m')";
    }

    private function tenantId(): string
    {
        return TenantContext::id() ?? throw new \RuntimeException('No tenant context.');
    }

    private function cacheVersion(): int
    {
        return (int) Cache::get("report:version:{$this->tenantId()}", 0);
    }

    private function resolvePagination(): array
    {
        $request = request();
        $page = max(1, (int) $request->query('page', 1));
        $perPage = max(1, (int) $request->query('per_page', 15));

        return [$page, $perPage];
    }

    private function cacheKey(string $prefix, string $from, string $to, ?int $page = null, ?int $perPage = null): string
    {
        if ($page === null || $perPage === null) {
            [$page, $perPage] = $this->resolvePagination();
        }

        $v = $this->cacheVersion();
        return "report:{$prefix}:{$this->tenantId()}:v{$v}:{$from}:{$to}:p{$page}:pp{$perPage}";
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
        [$page, $perPage] = $this->resolvePagination();
        return Cache::remember($this->cacheKey('sales', $from, $to, $page, $perPage), 300, function () use ($from, $to, $perPage) {

            $summary = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->selectRaw("
                    COUNT(*) as invoice_count,
                    COALESCE(SUM(total), 0) as total_revenue,
                    COALESCE(SUM(CASE WHEN status = 'paid' THEN total ELSE 0 END), 0) as collected,
                    COALESCE(SUM(CASE WHEN status != 'paid' THEN amount_due ELSE 0 END), 0) as outstanding
                ")
                ->first();

            $monthExpr = $this->monthGroupExpression('issue_date');
            $byMonth = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->selectRaw("{$monthExpr} as month, COALESCE(SUM(total), 0) as revenue")
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

            $statusBreakdown = Invoice::whereBetween('issue_date', [$from, $to])
                ->selectRaw("status, COUNT(*) as count")
                ->groupBy('status')
                ->get()
                ->keyBy('status');

            $invoices = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->with('customer:id,name')
                ->latest('issue_date')
                ->paginate($perPage)
                ->withQueryString();

            return compact('summary', 'byMonth', 'topCustomers', 'statusBreakdown', 'invoices');
        });
    }

    // ─── CUSTOMERS ───

    public function customerSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);
        [$page, $perPage] = $this->resolvePagination();

        return Cache::remember($this->cacheKey('customers', $from, $to, $page, $perPage), 300, function () use ($from, $to, $perPage) {

            $totalCustomers = Customer::count();

            $newCustomers = Customer::whereBetween('created_at', [$from, $to . ' 23:59:59'])->count();

            $totalRevenue = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->sum('total');

            $avgRevenue = $totalCustomers > 0
                ? round($totalRevenue / $totalCustomers, 2)
                : 0;

            $monthExpr = $this->monthGroupExpression('created_at');
            $newCustomersByMonth = Customer::whereBetween('created_at', [$from, $to . ' 23:59:59'])
                ->selectRaw("{$monthExpr} as month, COUNT(*) as count")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $topCustomersByRevenue = Invoice::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->with('customer:id,name')
                ->selectRaw('customer_id, COALESCE(SUM(total), 0) as total')
                ->groupBy('customer_id')
                ->orderByDesc('total')
                ->limit(10)
                ->get();

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
                ->paginate($perPage)
                ->withQueryString();

            return compact('totalCustomers', 'newCustomers', 'totalRevenue', 'avgRevenue', 'newCustomersByMonth', 'topCustomersByRevenue', 'customers');
        });
    }

    // ─── PURCHASES ───

    public function purchaseSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);
        [$page, $perPage] = $this->resolvePagination();

        return Cache::remember($this->cacheKey('purchases', $from, $to, $page, $perPage), 300, function () use ($from, $to, $perPage) {

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

            $monthExpr = $this->monthGroupExpression('issue_date');
            $purchasesByMonth = VendorBill::whereBetween('issue_date', [$from, $to])
                ->where('status', '!=', 'cancelled')
                ->selectRaw("{$monthExpr} as month, COALESCE(SUM(total), 0) as total")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $purchaseStatusBreakdown = VendorBill::whereBetween('issue_date', [$from, $to])
                ->selectRaw("status, COUNT(*) as count")
                ->groupBy('status')
                ->get()
                ->keyBy('status');

            $vendorBills = VendorBill::whereBetween('issue_date', [$from, $to])
                ->with('supplier:id,name')
                ->latest('issue_date')
                ->paginate($perPage)
                ->withQueryString();

            return compact('totalPurchases', 'paidPurchases', 'pendingPurchases', 'cancelledPurchases', 'purchasesByMonth', 'purchaseStatusBreakdown', 'vendorBills');
        });
    }

    // ─── FINANCE ───

    public function financeSummary(string $from, string $to): array
    {
        [$from, $to] = $this->validateDateRange($from, $to);
        [$page, $perPage] = $this->resolvePagination();

        return Cache::remember($this->cacheKey('finance', $from, $to, $page, $perPage), 300, function () use ($from, $to, $perPage) {

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

            $expMonthExpr = $this->monthGroupExpression('expense_date');
            $incMonthExpr = $this->monthGroupExpression('income_date');

            $expensesByMonth = Expense::whereBetween('expense_date', [$from, $to])
                ->selectRaw("{$expMonthExpr} as month, COALESCE(SUM(amount), 0) as total")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $incomesByMonth = Income::whereBetween('income_date', [$from, $to])
                ->selectRaw("{$incMonthExpr} as month, COALESCE(SUM(amount), 0) as total")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $expenses = Expense::whereBetween('expense_date', [$from, $to])
                ->with(['category:id,name', 'supplier:id,name', 'bankAccount:id,account_holder_name'])
                ->latest('expense_date')
                ->paginate($perPage)
                ->withQueryString();

            return compact('totalExpenses', 'totalIncome', 'netProfit', 'expensesByCategory', 'incomesByCategory', 'expensesByMonth', 'incomesByMonth', 'expenses');
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

            $monthExpr = $this->monthGroupExpression('issue_date');
            // Revenue last 12 months (line chart)
            $revenueTrend = Invoice::where('issue_date', '>=', $now->copy()->subMonths(11)->startOfMonth())
                ->where('status', '!=', 'void')
                ->selectRaw("{$monthExpr} as month, COALESCE(SUM(total), 0) as revenue")
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

            $stockByCategory = Product::where('is_active', true)
                ->with('category:id,name')
                ->selectRaw('category_id, COUNT(*) as product_count, COALESCE(SUM(selling_price * quantity), 0) as total_value')
                ->groupBy('category_id')
                ->orderByDesc('total_value')
                ->get();

            $topProductsByValue = Product::where('is_active', true)
                ->selectRaw('name, selling_price, quantity, (selling_price * quantity) as total_value')
                ->orderByDesc(DB::raw('selling_price * quantity'))
                ->limit(10)
                ->get();

            return compact('totalValue', 'lowStockCount', 'outOfStockCount', 'pendingReorders', 'products', 'lowStockItems', 'stockByCategory', 'topProductsByValue');
        });
    }
}
