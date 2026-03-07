<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Billing\Plan;
use App\Models\Billing\Subscription;
use App\Models\Tenancy\Tenant;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * List all subscriptions.
     */
    public function index(Request $request)
    {
        $query = Subscription::with('tenant', 'plan')
            ->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $subscriptions = $query->paginate(20);

        $totalSubscriptions = Subscription::count();
        $activeSubscriptions = Subscription::where('status', 'active')->count();
        $trialingSubscriptions = Subscription::where('status', 'trialing')->count();
        $cancelledSubscriptions = Subscription::where('status', 'cancelled')->count();

        $plans = Plan::where('is_active', true)->orderBy('name')->get();
        $tenants = Tenant::where('status', 'active')->orderBy('name')->get();

        return view('backoffice.subscriptions.index', compact(
            'subscriptions',
            'totalSubscriptions',
            'activeSubscriptions',
            'trialingSubscriptions',
            'cancelledSubscriptions',
            'plans',
            'tenants'
        ));
    }

    /**
     * Store a new subscription.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenant_id' => 'required|uuid|exists:tenants,id',
            'plan_id' => 'required|uuid|exists:plans,id',
            'status' => 'required|in:trialing,active,past_due,cancelled',
            'quantity' => 'nullable|integer|min:1',
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after:starts_at',
            'trial_ends_at' => 'nullable|date',
            'cancels_at' => 'nullable|date',
            'provider' => 'required|in:stripe,manual',
            'provider_subscription_id' => 'nullable|string|max:255',
        ]);

        Subscription::create($validated);

        \App\Services\Billing\PlanLimitService::flushPlanCache($validated['tenant_id']);

        return redirect()->route('sa.subscriptions.index')
            ->with('success', 'L\'abonnement a été créé avec succès.');
    }

    /**
     * Update a subscription.
     */
    public function update(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'plan_id' => 'required|uuid|exists:plans,id',
            'status' => 'required|in:trialing,active,past_due,cancelled',
            'quantity' => 'nullable|integer|min:1',
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after:starts_at',
            'trial_ends_at' => 'nullable|date',
            'cancels_at' => 'nullable|date',
            'provider' => 'required|in:stripe,manual',
            'provider_subscription_id' => 'nullable|string|max:255',
        ]);

        $subscription->update($validated);

        \App\Services\Billing\PlanLimitService::flushPlanCache($subscription->tenant_id);

        return redirect()->route('sa.subscriptions.index')
            ->with('success', 'L\'abonnement a été mis à jour avec succès.');
    }

    /**
     * Delete a subscription.
     */
    public function destroy(Subscription $subscription)
    {
        \App\Services\Billing\PlanLimitService::flushPlanCache($subscription->tenant_id);

        $subscription->delete();

        return redirect()->route('sa.subscriptions.index')
            ->with('success', 'L\'abonnement a été supprimé avec succès.');
    }
}
