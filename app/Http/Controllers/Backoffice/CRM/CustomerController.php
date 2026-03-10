<?php

namespace App\Http\Controllers\Backoffice\CRM;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Store\StoreCustomerRequest;
use App\Http\Requests\CRM\Update\UpdateCustomerRequest;
use App\Models\CRM\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Customer::class);

        $query = Customer::query()
            ->withCount(['invoices', 'quotes']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($type = $request->input('type')) {
            $query->where('type', $type);
        }

        $customers = $query->latest()->paginate(request()->input('per_page', 15))->withQueryString();

        return view('backoffice.crm.customers.index', compact('customers'));
    }

    public function create()
    {
        $this->authorize('create', Customer::class);

        return view('backoffice.crm.customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $this->authorize('create', Customer::class);

        Customer::create($request->validated());

        return redirect()->route('bo.crm.customers.index')
            ->with('success', 'Client créé avec succès.');
    }

    public function show(Customer $customer)
    {
        $this->authorize('view', $customer);

        $customer->load([
            'addresses',
            'contacts',
            'invoices' => fn($q) => $q->latest()->take(10),
            'quotes' => fn($q) => $q->latest()->take(5),
        ]);

        return view('backoffice.crm.customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $this->authorize('update', $customer);

        return view('backoffice.crm.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->authorize('update', $customer);

        $customer->update($request->validated());

        return redirect()->route('bo.crm.customers.index')
            ->with('success', 'Client mis à jour avec succès.');
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect()->route('bo.crm.customers.index')
            ->with('success', 'Client supprimé avec succès.');
    }
}
