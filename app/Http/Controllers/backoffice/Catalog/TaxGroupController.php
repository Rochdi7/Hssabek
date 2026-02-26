<?php

namespace App\Http\Controllers\Backoffice\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Store\StoreTaxGroupRequest;
use App\Http\Requests\Catalog\Update\UpdateTaxGroupRequest;
use App\Models\Catalog\TaxGroup;
use Illuminate\Http\Request;

class TaxGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = TaxGroup::paginate(15);
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxGroupRequest $request)
    {
        $group = TaxGroup::create($request->validated());
        return response()->json($group, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxGroup $taxGroup)
    {
        return response()->json($taxGroup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxGroupRequest $request, TaxGroup $taxGroup)
    {
        $taxGroup->update($request->validated());
        return response()->json($taxGroup);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxGroup $taxGroup)
    {
        $taxGroup->delete();
        return response()->json(null, 204);
    }
}
