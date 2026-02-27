<?php

namespace App\Http\Controllers\Backoffice\Billing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Billing\Store\StoreSubscriptionInvoiceRequest;
use App\Http\Requests\Billing\Update\UpdateSubscriptionInvoiceRequest;
use App\Models\Billing\SubscriptionInvoice;
use Illuminate\Http\Request;

class SubscriptionInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = SubscriptionInvoice::with('subscription')->paginate(15);
        return response()->json($invoices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionInvoiceRequest $request)
    {
        $invoice = SubscriptionInvoice::create($request->validated());
        return response()->json($invoice, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubscriptionInvoice $subscriptionInvoice)
    {
        $subscriptionInvoice->load('subscription');
        return response()->json($subscriptionInvoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionInvoiceRequest $request, SubscriptionInvoice $subscriptionInvoice)
    {
        $subscriptionInvoice->update($request->validated());
        return response()->json($subscriptionInvoice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscriptionInvoice $subscriptionInvoice)
    {
        $subscriptionInvoice->delete();
        return response()->json(null, 204);
    }
}
