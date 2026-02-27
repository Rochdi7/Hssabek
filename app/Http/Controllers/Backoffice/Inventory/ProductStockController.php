<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Store\StoreProductStockRequest;
use App\Http\Requests\Inventory\Update\UpdateProductStockRequest;
use App\Models\Inventory\ProductStock;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = ProductStock::with('product', 'warehouse')->paginate(15);
        return response()->json($stocks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductStockRequest $request)
    {
        $stock = ProductStock::create($request->validated());
        return response()->json($stock, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductStock $productStock)
    {
        $productStock->load('product', 'warehouse');
        return response()->json($productStock);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductStockRequest $request, ProductStock $productStock)
    {
        $productStock->update($request->validated());
        return response()->json($productStock);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductStock $productStock)
    {
        $productStock->delete();
        return response()->json(null, 204);
    }
}
