<?php

namespace App\Http\Requests\Sales\Store;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenantId = TenantContext::id();

        return [
            'customer_id' => ['required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'bank_account_id' => ['required', 'uuid', Rule::exists('bank_accounts', 'id')->where('tenant_id', $tenantId)],
            'payment_method_id' => ['nullable', 'uuid', Rule::exists('payment_methods', 'id')->where('tenant_id', $tenantId)],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'payment_date' => ['required', 'date'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],

            // Allocations — required, min 1
            'allocations' => ['required', 'array', 'min:1'],
            'allocations.*.invoice_id' => ['required', 'uuid', Rule::exists('invoices', 'id')->where('tenant_id', $tenantId)],
            'allocations.*.amount_applied' => ['required', 'numeric', 'min:0.01'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => __('Le client est obligatoire.'),
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'bank_account_id.required' => __('Le compte bancaire est obligatoire.'),
            'bank_account_id.exists' => __('Le compte bancaire sélectionné est invalide.'),
            'amount.required' => __('Le montant est obligatoire.'),
            'amount.min' => __('Le montant doit être supérieur à 0.'),
            'payment_date.required' => __('La date de paiement est obligatoire.'),
            'allocations.required' => __('Au moins une allocation de facture est obligatoire.'),
            'allocations.min' => __('Au moins une allocation de facture est obligatoire.'),
            'allocations.*.invoice_id.required' => __('La facture est obligatoire pour chaque allocation.'),
            'allocations.*.invoice_id.exists' => __('La facture sélectionnée est invalide.'),
            'allocations.*.amount_applied.required' => __('Le montant appliqué est obligatoire.'),
            'allocations.*.amount_applied.min' => __('Le montant appliqué doit être supérieur à 0.'),
        ];
    }
}
