<?php

namespace App\Http\Requests\Sales\Store;

use App\Http\Requests\TenantFormRequest;

class StoreRefundRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'payment_id'  => ['required', 'uuid', $this->tenantExists('payments')],
            'amount'      => ['required', 'numeric', 'gt:0'],
            'refunded_at' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'payment_id.required' => __('Le paiement est obligatoire.'),
            'payment_id.exists'   => __('Le paiement sélectionné est invalide.'),
            'amount.required'     => __('Le montant est obligatoire.'),
            'amount.gt'           => __('Le montant doit être supérieur à zéro.'),
            'refunded_at.required' => __('La date du remboursement est obligatoire.'),
        ];
    }
}
