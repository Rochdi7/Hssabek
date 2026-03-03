<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Billing\Subscription;
use App\Services\Tenancy\TenantContext;

class PlansBillingsController extends Controller
{
    public function index()
    {
        $tenant = TenantContext::get();
        $currentSubscription = Subscription::with('plan')
            ->where('status', '!=', 'cancelled')
            ->latest('starts_at')
            ->first();
        $subscriptionHistory = Subscription::with('plan')
            ->latest('starts_at')
            ->get();

        return view('backoffice.settings.plans-billings', compact('currentSubscription', 'subscriptionHistory'));
    }
}
