<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreSupplierRequest;
use App\Http\Requests\Purchases\Update\UpdateSupplierRequest;
use App\Models\Purchases\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Supplier::class);

        $query = Supplier::query()
            ->withCount(['purchaseOrders', 'vendorBills']);

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

        $suppliers = $query->latest()->paginate($request->input('per_page', 15))->withQueryString();

        return view('backoffice.purchases.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        $this->authorize('create', Supplier::class);

        return view('backoffice.purchases.suppliers.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        $this->authorize('create', Supplier::class);

        Supplier::create($request->validated());

        return redirect()->route('bo.purchases.suppliers.index')
            ->with('success', 'Fournisseur créé avec succès.');
    }

    public function show(Supplier $supplier)
    {
        $this->authorize('view', $supplier);

        $supplier->load([
            'purchaseOrders' => fn($q) => $q->latest()->take(10),
            'vendorBills' => fn($q) => $q->latest()->take(10),
        ]);

        return view('backoffice.purchases.suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        $this->authorize('update', $supplier);

        return view('backoffice.purchases.suppliers.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $this->authorize('update', $supplier);

        $supplier->update($request->validated());

        return redirect()->route('bo.purchases.suppliers.index')
            ->with('success', 'Fournisseur mis à jour avec succès.');
    }

    public function destroy(Supplier $supplier)
    {
        $this->authorize('delete', $supplier);

        $supplier->delete();

        return redirect()->route('bo.purchases.suppliers.index')
            ->with('success', 'Fournisseur supprimé avec succès.');
    }
}
