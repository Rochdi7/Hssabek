<?php

namespace App\Http\Controllers\Backoffice\CRM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Store\StoreCustomerAddressRequest;
use App\Http\Requests\CRM\Update\UpdateCustomerAddressRequest;
use App\Models\CRM\CustomerAddress;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = CustomerAddress::with('customer')->paginate(15);
        return response()->json($addresses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerAddressRequest $request)
    {
        $address = CustomerAddress::create($request->validated());
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerAddress $customerAddress)
    {
        $customerAddress->load('customer');
        return response()->json($customerAddress);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customerAddress)
    {
        $customerAddress->update($request->validated());
        return response()->json($customerAddress);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerAddress $customerAddress)
    {
        $customerAddress->delete();
        return response()->json(null, 204);
    }
}
