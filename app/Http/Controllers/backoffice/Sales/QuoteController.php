<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreQuoteRequest;
use App\Http\Requests\Sales\Update\UpdateQuoteRequest;
use App\Models\Sales\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::with('customer')->paginate(15);
        return response()->json($quotes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {
        $quote = Quote::create($request->validated());
        return response()->json($quote, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        $quote->load('customer', 'items', 'charges');
        return response()->json($quote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $quote->update($request->validated());
        return response()->json($quote);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return response()->json(null, 204);
    }
}
