<?php

namespace App\Http\Requests\Purchases\Store;

use App\Http\Requests\TenantFormRequest;

class StoreSupplierPaymentRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id'       => ['required', 'uuid', $this->tenantExists('suppliers')],
            'bank_account_id'   => ['nullable', 'uuid', $this->tenantExists('bank_accounts')],
            'payment_method_id' => ['nullable', 'uuid', $this->tenantExists('payment_methods')],
            'amount'            => ['required', 'numeric', 'gt:0'],
            'paid_at'           => ['required', 'date'],
            'reference_number'  => ['nullable', 'string', 'max:120'],
            'notes'             => ['nullable', 'string', 'max:2000'],

            'allocations'                    => ['nullable', 'array'],
            'allocations.*.vendor_bill_id'   => ['required', 'uuid', $this->tenantExists('vendor_bills')],
            'allocations.*.amount_applied'   => ['required', 'numeric', 'min:0.01'],
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_id.required'                   => 'Le fournisseur est obligatoire.',
            'supplier_id.exists'                     => 'Le fournisseur sélectionné est invalide.',
            'bank_account_id.exists'                 => 'Le compte bancaire sélectionné est invalide.',
            'payment_method_id.exists'               => 'Le mode de paiement sélectionné est invalide.',
            'amount.required'                        => 'Le montant est obligatoire.',
            'amount.gt'                              => 'Le montant doit être supérieur à zéro.',
            'paid_at.required'                       => 'La date du paiement est obligatoire.',
            'allocations.*.vendor_bill_id.required'  => 'La facture fournisseur est obligatoire.',
            'allocations.*.vendor_bill_id.exists'    => 'La facture fournisseur sélectionnée est invalide.',
            'allocations.*.amount_applied.required'  => 'Le montant de l\'allocation est obligatoire.',
            'allocations.*.amount_applied.min'       => 'Le montant de l\'allocation doit être supérieur à zéro.',
        ];
    }
}
