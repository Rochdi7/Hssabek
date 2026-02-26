<?php

namespace App\Http\Controllers\Backoffice\CRM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Store\StoreCustomerContactRequest;
use App\Http\Requests\CRM\Update\UpdateCustomerContactRequest;
use App\Models\CRM\CustomerContact;
use Illuminate\Http\Request;

class CustomerContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = CustomerContact::with('customer')->paginate(15);
        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerContactRequest $request)
    {
        $contact = CustomerContact::create($request->validated());
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerContact $customerContact)
    {
        $customerContact->load('customer');
        return response()->json($customerContact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerContactRequest $request, CustomerContact $customerContact)
    {
        $customerContact->update($request->validated());
        return response()->json($customerContact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerContact $customerContact)
    {
        $customerContact->delete();
        return response()->json(null, 204);
    }
}
