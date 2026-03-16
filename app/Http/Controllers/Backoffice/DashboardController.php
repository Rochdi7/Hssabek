<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use App\Models\CRM\Customer;
use App\Models\Finance\Currency;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\CreditNote;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\Quote;
use App\Models\System\AccountRequest;
use App\Models\System\Announcement;
use App\Services\Reports\ReportService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct(
        private readonly ReportService $reportService,
    ) {}

    public function index()
    {
        $tenant = TenantContext::get();
        $kpis     = $this->reportService->dashboardKpis();
        $currency = $tenant?->default_currency ?? 'MAD';
        $announcements = Announcement::active()->orderByDesc('published_at')->limit(5)->get();

        // Show setup wizard for admin users on tenants that haven't completed setup
        $showSetupWizard = false;
        $currencies = collect();
        $prefill = [];
        if ($tenant && !$tenant->setup_completed) {
            $user = auth()->user();
            if ($user && ($user->hasRole('admin') || $user->hasRole('owner'))) {
                $showSetupWizard = true;
                $currencies = Currency::orderBy('name')->get();

                // Pre-fill from existing tenant data + original account request
                $prefill['company_name'] = $tenant->name;
                $prefill['company_email'] = $user->email;

                $accountRequest = AccountRequest::where('contact_email', $user->email)
                    ->where('status', 'approved')
                    ->latest()
                    ->first();

                if ($accountRequest) {
                    $prefill['company_email'] = $accountRequest->company_email ?? $user->email;
                    $prefill['company_phone'] = $accountRequest->company_phone ?? '';
                    $prefill['address']       = $accountRequest->company_address ?? '';
                    $prefill['city']          = $accountRequest->company_city ?? '';
                    $prefill['country']       = $accountRequest->company_country ?? '';
                }

                // Also check if TenantSetting already has some data
                $settings = $tenant->settings;
                if ($settings && !empty($settings->company_settings)) {
                    $cs = $settings->company_settings;
                    $prefill = array_merge($prefill, array_filter($cs));
                }
            }
        }

        $now   = now();
        $today = $now->toDateString();

        // Extra counts for richer dashboard UI (live, not cached)
        $customerCount     = Customer::count();
        $invoiceCount      = Invoice::count();
        $quoteCount        = Quote::count();
        $productCount      = Product::count();
        $draftInvoiceCount = Invoice::where('status', 'draft')->count();
        $totalSalesYtd     = $kpis['revenueYtd'];
        $totalPurchasesYtd = VendorBill::whereBetween('issue_date', [$now->copy()->startOfYear()->toDateString(), $today])
            ->where('status', '!=', 'cancelled')
            ->sum('total');
        $creditNotesTotal  = CreditNote::sum('total');

        // Invoice statistics — real DB aggregations
        $invoicedTotal    = Invoice::where('status', '!=', 'void')->sum('total');
        $receivedTotal    = Invoice::where('status', '!=', 'void')->sum('amount_paid');
        $outstandingTotal = Invoice::whereIn('status', ['sent', 'partial', 'overdue'])->sum('amount_due');
        $overdueTotal     = Invoice::where(function ($q) use ($today) {
            $q->where('status', 'overdue')
              ->orWhere(function ($q2) use ($today) {
                  $q2->whereIn('status', ['sent', 'partial'])->where('due_date', '<', $today);
              });
        })->sum('amount_due');

        // Recent payments for transactions
        $recentPayments = Payment::with(['customer', 'allocations.invoice'])
            ->latest('payment_date')
            ->limit(5)
            ->get();

        // Monthly collected (payments) for last 12 months — real data for chart
        $monthExpr = DB::connection()->getDriverName() === 'sqlite'
            ? "strftime('%Y-%m', payment_date)"
            : "DATE_FORMAT(payment_date, '%Y-%m')";
        $collectedTrend = Payment::where('payment_date', '>=', $now->copy()->subMonths(11)->startOfMonth())
            ->where('status', 'succeeded')
            ->selectRaw("{$monthExpr} as month, COALESCE(SUM(amount), 0) as collected")
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('collected', 'month');

        return view('backoffice.dashboard', array_merge($kpis, compact(
            'currency', 'announcements', 'showSetupWizard', 'currencies', 'prefill',
            'customerCount', 'invoiceCount', 'quoteCount', 'productCount', 'draftInvoiceCount',
            'totalSalesYtd', 'totalPurchasesYtd', 'creditNotesTotal',
            'invoicedTotal', 'receivedTotal', 'outstandingTotal', 'overdueTotal',
            'recentPayments', 'collectedTrend'
        )));
    }
}
