<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Billing\Subscription;
use App\Services\Billing\PlanLimitService;
use App\Services\Tenancy\TenantContext;

class PlansBillingsController extends Controller
{
    public function index(PlanLimitService $limitService)
    {
        $tenant = TenantContext::require();
        $currentSubscription = Subscription::with('plan')
            ->where('status', '!=', 'cancelled')
            ->where(function ($q) {
                $q->whereNull('cancels_at')->orWhere('cancels_at', '>', now());
            })
            ->latest('starts_at')
            ->first();
        $subscriptionHistory = Subscription::with('plan')
            ->latest('starts_at')
            ->get();

        // Trial info — only show if tenant has free trial AND an active trialing subscription exists
        $hasTrialingSubscription = Subscription::where('tenant_id', $tenant->id)
            ->where('status', 'trialing')
            ->exists();
        $isOnTrial = $hasTrialingSubscription
            && $tenant->has_free_trial
            && $tenant->trial_ends_at
            && $tenant->trial_ends_at->isFuture();
        $trialDaysLeft = $isOnTrial ? (int) now()->diffInDays($tenant->trial_ends_at, false) : 0;
        $trialDaysLeft = max(0, $trialDaysLeft);

        // Usage & limits
        $usageData = $limitService->getAllUsage();

        return view('backoffice.settings.plans-billings', compact(
            'tenant',
            'currentSubscription',
            'subscriptionHistory',
            'isOnTrial',
            'trialDaysLeft',
            'usageData'
        ));
    }
}
