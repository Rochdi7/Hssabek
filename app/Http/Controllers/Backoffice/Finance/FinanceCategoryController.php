<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreFinanceCategoryRequest;
use App\Http\Requests\Finance\Update\UpdateFinanceCategoryRequest;
use App\Models\Finance\FinanceCategory;
use Illuminate\Http\Request;

class FinanceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FinanceCategory::paginate(15);
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinanceCategoryRequest $request)
    {
        $category = FinanceCategory::create($request->validated());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FinanceCategory $financeCategory)
    {
        return response()->json($financeCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinanceCategoryRequest $request, FinanceCategory $financeCategory)
    {
        $financeCategory->update($request->validated());
        return response()->json($financeCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinanceCategory $financeCategory)
    {
        $financeCategory->delete();
        return response()->json(null, 204);
    }
}
