<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Store\StoreStockTransferRequest;
use App\Http\Requests\Inventory\Update\UpdateStockTransferRequest;
use App\Models\Inventory\StockTransfer;
use Illuminate\Http\Request;

class StockTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = StockTransfer::with('fromWarehouse', 'toWarehouse')->paginate(15);
        return response()->json($transfers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockTransferRequest $request)
    {
        $transfer = StockTransfer::create($request->validated());
        return response()->json($transfer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StockTransfer $stockTransfer)
    {
        $stockTransfer->load('fromWarehouse', 'toWarehouse', 'items');
        return response()->json($stockTransfer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockTransferRequest $request, StockTransfer $stockTransfer)
    {
        $stockTransfer->update($request->validated());
        return response()->json($stockTransfer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockTransfer $stockTransfer)
    {
        $stockTransfer->delete();
        return response()->json(null, 204);
    }
}
