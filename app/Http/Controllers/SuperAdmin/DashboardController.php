<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Billing\SubscriptionInvoice;
use App\Models\Tenancy\Tenant;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Cache::remember('sa:dashboard:kpis', 300, function () {
            $now   = now();
            $today = $now->toDateString();

            // ─── Tenant counts ───
            $totalTenants    = Tenant::count();
            $activeTenants   = Tenant::where('status', 'active')->count();
            $suspendedTenants = Tenant::where('status', 'suspended')->count();
            $activePlans     = Plan::where('is_active', true)->count();

            // ─── Most ordered plan ───
            $mostOrderedPlan = Plan::withCount('subscriptions')
                ->orderByDesc('subscriptions_count')
                ->first();

            // ─── Top tenant (most subscriptions) ───
            $topTenant = Tenant::withCount('subscriptions')
                ->orderByDesc('subscriptions_count')
                ->first();

            // ─── Latest registered tenants (7) ───
            $latestTenants = Tenant::query()
                ->latest()
                ->limit(7)
                ->get()
                ->map(function ($tenant) {
                    $sub = Subscription::withoutGlobalScopes()
                        ->where('tenant_id', $tenant->id)
                        ->with('plan')
                        ->latest()
                        ->first();
                    $tenant->latest_subscription = $sub;
                    return $tenant;
                });

            // ─── Earnings by month (last 12 months) ───
            $earningsTrend = SubscriptionInvoice::withoutGlobalScopes()
                ->where('created_at', '>=', $now->copy()->subMonths(11)->startOfMonth())
                ->where('status', 'paid')
                ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COALESCE(SUM(amount), 0) as total")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // ─── Expired subscriptions ───
            $expiredSubscriptions = Subscription::withoutGlobalScopes()
                ->with(['plan', 'tenant'])
                ->where('ends_at', '<', $today)
                ->whereIn('status', ['expired', 'cancelled'])
                ->latest('ends_at')
                ->limit(7)
                ->get();

            // ─── Recent subscription invoices (8) ───
            $recentInvoices = SubscriptionInvoice::withoutGlobalScopes()
                ->with(['subscription.plan', 'subscription.tenant'])
                ->latest()
                ->limit(8)
                ->get();

            // ─── Subscription status breakdown (pie chart) ───
            $subscriptionsByStatus = Subscription::withoutGlobalScopes()
                ->selectRaw("status, COUNT(*) as count")
                ->groupBy('status')
                ->get()
                ->keyBy('status');

            // ─── Total revenue (all time) ───
            $totalRevenue = SubscriptionInvoice::withoutGlobalScopes()
                ->where('status', 'paid')
                ->sum('amount');

            // ─── Revenue this month ───
            $revenueMtd = SubscriptionInvoice::withoutGlobalScopes()
                ->where('status', 'paid')
                ->where('created_at', '>=', $now->copy()->startOfMonth())
                ->sum('amount');

            // ─── Tenant growth by month (last 12 months) ───
            $tenantGrowth = Tenant::where('created_at', '>=', $now->copy()->subMonths(11)->startOfMonth())
                ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // ─── Subscriptions by plan (for plan distribution chart) ───
            $subscriptionsByPlan = Subscription::withoutGlobalScopes()
                ->join('plans', 'subscriptions.plan_id', '=', 'plans.id')
                ->selectRaw('plans.name as plan_name, COUNT(*) as total')
                ->groupBy('plans.name')
                ->orderByDesc('total')
                ->get();

            return compact(
                'totalTenants', 'activeTenants', 'suspendedTenants', 'activePlans',
                'mostOrderedPlan', 'topTenant',
                'latestTenants', 'earningsTrend',
                'expiredSubscriptions', 'recentInvoices',
                'subscriptionsByStatus',
                'totalRevenue', 'revenueMtd',
                'tenantGrowth', 'subscriptionsByPlan'
            );
        });

        return view('backoffice.superadmin.index', $data);
    }
}
