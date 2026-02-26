<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreVendorBillRequest;
use App\Http\Requests\Purchases\Update\UpdateVendorBillRequest;
use App\Models\Purchases\VendorBill;
use Illuminate\Http\Request;

class VendorBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = VendorBill::with('supplier')->paginate(15);
        return response()->json($bills);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorBillRequest $request)
    {
        $bill = VendorBill::create($request->validated());
        return response()->json($bill, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(VendorBill $vendorBill)
    {
        $vendorBill->load('supplier');
        return response()->json($vendorBill);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorBillRequest $request, VendorBill $vendorBill)
    {
        $vendorBill->update($request->validated());
        return response()->json($vendorBill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorBill $vendorBill)
    {
        $vendorBill->delete();
        return response()->json(null, 204);
    }
}
