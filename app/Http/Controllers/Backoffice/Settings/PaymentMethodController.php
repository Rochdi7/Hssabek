<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Sales\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::orderBy('name')->get();

        return view('backoffice.settings.payment-methods', compact('paymentMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Le nom du mode de paiement est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 100 caractères.',
        ]);

        PaymentMethod::create([
            'name' => $validated['name'],
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('bo.settings.payment-methods.index')
            ->with('success', __('Mode de paiement ajouté avec succès.'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Le nom du mode de paiement est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 100 caractères.',
        ]);

        $paymentMethod->update([
            'name' => $validated['name'],
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('bo.settings.payment-methods.index')
            ->with('success', __('Mode de paiement mis à jour avec succès.'));
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        if ($paymentMethod->payments()->exists()) {
            return redirect()->route('bo.settings.payment-methods.index')
                ->with('error', __('Ce mode de paiement est utilisé par des paiements existants et ne peut pas être supprimé.'));
        }

        $paymentMethod->delete();

        return redirect()->route('bo.settings.payment-methods.index')
            ->with('success', __('Mode de paiement supprimé avec succès.'));
    }
}
