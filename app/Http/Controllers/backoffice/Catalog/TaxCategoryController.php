<?php

namespace App\Http\Controllers\Backoffice\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Store\StoreTaxCategoryRequest;
use App\Http\Requests\Catalog\Update\UpdateTaxCategoryRequest;
use App\Models\Catalog\TaxCategory;
use Illuminate\Http\Request;

class TaxCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = TaxCategory::paginate(15);
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxCategoryRequest $request)
    {
        $category = TaxCategory::create($request->validated());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxCategory $taxCategory)
    {
        return response()->json($taxCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxCategoryRequest $request, TaxCategory $taxCategory)
    {
        $taxCategory->update($request->validated());
        return response()->json($taxCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxCategory $taxCategory)
    {
        $taxCategory->delete();
        return response()->json(null, 204);
    }
}
