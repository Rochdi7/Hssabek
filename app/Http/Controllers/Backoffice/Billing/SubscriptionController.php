<?php

namespace App\Http\Controllers\Backoffice\Billing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Billing\Store\StoreSubscriptionRequest;
use App\Http\Requests\Billing\Update\UpdateSubscriptionRequest;
use App\Models\Billing\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::with('customer', 'plan')->paginate(15);
        return response()->json($subscriptions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->validated());
        return response()->json($subscription, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        $subscription->load('customer', 'plan');
        return response()->json($subscription);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->validated());
        return response()->json($subscription);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return response()->json(null, 204);
    }
}
