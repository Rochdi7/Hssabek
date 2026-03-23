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
            'bank_account_id'   => ['required', 'uuid', $this->tenantExists('bank_accounts')],
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
            'supplier_id.required'                   => __('Le fournisseur est obligatoire.'),
            'supplier_id.exists'                     => __('Le fournisseur sélectionné est invalide.'),
            'bank_account_id.required'               => __('Le compte bancaire est obligatoire.'),
            'bank_account_id.exists'                 => __('Le compte bancaire sélectionné est invalide.'),
            'payment_method_id.exists'               => __('Le mode de paiement sélectionné est invalide.'),
            'amount.required'                        => __('Le montant est obligatoire.'),
            'amount.gt'                              => __('Le montant doit être supérieur à zéro.'),
            'paid_at.required'                       => __('La date du paiement est obligatoire.'),
            'allocations.*.vendor_bill_id.required'  => __('La facture fournisseur est obligatoire.'),
            'allocations.*.vendor_bill_id.exists'    => __('La facture fournisseur sélectionnée est invalide.'),
            'allocations.*.amount_applied.required'  => __('Le montant de l\'allocation est obligatoire.'),
            'allocations.*.amount_applied.min'       => __('Le montant de l\'allocation doit être supérieur à zéro.'),
        ];
    }
}
