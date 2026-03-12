<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreSupplierPaymentMethodRequest;
use App\Http\Requests\Purchases\Update\UpdateSupplierPaymentMethodRequest;
use App\Models\Purchases\SupplierPaymentMethod;
use Illuminate\Http\Request;

class SupplierPaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(auth()->user()->can('purchases.supplier_payment_methods.view'), 403);

        $methods = SupplierPaymentMethod::query()
            ->when($request->search, fn($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->orderBy('name')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.purchases.supplier-payment-methods.index', compact('methods'));
    }

    public function store(StoreSupplierPaymentMethodRequest $request)
    {
        abort_unless(auth()->user()->can('purchases.supplier_payment_methods.create'), 403);

        SupplierPaymentMethod::create($request->validated());

        return redirect()->route('bo.purchases.supplier-payment-methods.index')
            ->with('success', 'Méthode de paiement ajoutée avec succès.');
    }

    public function update(UpdateSupplierPaymentMethodRequest $request, SupplierPaymentMethod $supplierPaymentMethod)
    {
        abort_unless(auth()->user()->can('purchases.supplier_payment_methods.edit'), 403);

        $supplierPaymentMethod->update($request->validated());

        return redirect()->route('bo.purchases.supplier-payment-methods.index')
            ->with('success', 'Méthode de paiement modifiée avec succès.');
    }

    public function destroy(SupplierPaymentMethod $supplierPaymentMethod)
    {
        abort_unless(auth()->user()->can('purchases.supplier_payment_methods.delete'), 403);

        if ($supplierPaymentMethod->payments()->exists()) {
            return redirect()->route('bo.purchases.supplier-payment-methods.index')
                ->with('error', 'Impossible de supprimer cette méthode : elle est utilisée par un ou plusieurs paiements.');
        }

        $supplierPaymentMethod->delete();

        return redirect()->route('bo.purchases.supplier-payment-methods.index')
            ->with('success', 'Méthode de paiement supprimée avec succès.');
    }
}
