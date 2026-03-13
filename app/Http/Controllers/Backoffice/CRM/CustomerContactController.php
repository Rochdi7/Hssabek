<?php

namespace App\Http\Controllers\Backoffice\CRM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Store\StoreCustomerContactRequest;
use App\Http\Requests\CRM\Update\UpdateCustomerContactRequest;
use App\Models\CRM\Customer;
use App\Models\CRM\CustomerContact;

class CustomerContactController extends Controller
{
    public function store(StoreCustomerContactRequest $request, Customer $customer)
    {
        $this->authorize('update', $customer);

        $customer->contacts()->create($request->safe()->except('customer_id'));

        return redirect()->route('bo.crm.customers.show', $customer)
            ->with('success', __('Contact ajouté avec succès.'));
    }

    public function update(UpdateCustomerContactRequest $request, CustomerContact $contact)
    {
        $customer = Customer::findOrFail($contact->customer_id);
        $this->authorize('update', $customer);

        $contact->update($request->validated());

        return redirect()->route('bo.crm.customers.show', $contact->customer_id)
            ->with('success', __('Contact mis à jour avec succès.'));
    }

    public function destroy(CustomerContact $contact)
    {
        $customer = Customer::findOrFail($contact->customer_id);
        $this->authorize('update', $customer);

        $customerId = $contact->customer_id;
        $contact->delete();

        return redirect()->route('bo.crm.customers.show', $customerId)
            ->with('success', __('Contact supprimé avec succès.'));
    }
}
