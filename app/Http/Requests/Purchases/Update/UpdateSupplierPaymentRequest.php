<?php

namespace App\Http\Requests\Purchases\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateSupplierPaymentRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount'            => ['sometimes', 'numeric', 'gt:0'],
            'paid_at'           => ['sometimes', 'date'],
            'bank_account_id'   => ['sometimes', 'required', 'uuid', $this->tenantExists('bank_accounts')],
            'payment_method_id' => ['sometimes', 'nullable', 'uuid', $this->tenantExists('supplier_payment_methods')],
            'reference_number'  => ['sometimes', 'nullable', 'string', 'max:120'],
            'notes'             => ['sometimes', 'nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'bank_account_id.exists'   => __('Le compte bancaire sélectionné est invalide.'),
            'payment_method_id.exists' => __('La méthode de paiement sélectionnée est invalide.'),
            'amount.gt'                => __('Le montant doit être supérieur à zéro.'),
            'amount.numeric'           => __('Le montant doit être un nombre valide.'),
            'paid_at.date'             => __('La date de paiement est invalide.'),
            'reference_number.max'     => __('La référence ne peut pas dépasser 120 caractères.'),
            'notes.max'                => __('Les notes ne peuvent pas dépasser 2000 caractères.'),
        ];
    }
}
