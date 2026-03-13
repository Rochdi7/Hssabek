<?php

namespace App\Http\Controllers\Backoffice\CRM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Store\StoreCustomerAddressRequest;
use App\Http\Requests\CRM\Update\UpdateCustomerAddressRequest;
use App\Models\CRM\Customer;
use App\Models\CRM\CustomerAddress;

class CustomerAddressController extends Controller
{
    public function store(StoreCustomerAddressRequest $request, Customer $customer)
    {
        $this->authorize('update', $customer);

        $customer->addresses()->create($request->safe()->except('customer_id'));

        return redirect()->route('bo.crm.customers.show', $customer)
            ->with('success', __('Adresse ajoutée avec succès.'));
    }

    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $address)
    {
        $customer = Customer::findOrFail($address->customer_id);
        $this->authorize('update', $customer);

        $address->update($request->validated());

        return redirect()->route('bo.crm.customers.show', $address->customer_id)
            ->with('success', __('Adresse mise à jour avec succès.'));
    }

    public function destroy(CustomerAddress $address)
    {
        $customer = Customer::findOrFail($address->customer_id);
        $this->authorize('update', $customer);

        $customerId = $address->customer_id;
        $address->delete();

        return redirect()->route('bo.crm.customers.show', $customerId)
            ->with('success', __('Adresse supprimée avec succès.'));
    }
}
