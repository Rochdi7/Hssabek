<?php

namespace App\Http\Requests\Sales\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateRefundRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount'      => ['required', 'numeric', 'gt:0'],
            'status'      => ['required', 'in:pending,processed,failed'],
            'refunded_at' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required'     => __('Le montant est obligatoire.'),
            'amount.gt'           => __('Le montant doit être supérieur à zéro.'),
            'status.required'     => __('Le statut est obligatoire.'),
            'status.in'           => __('Le statut est invalide.'),
            'refunded_at.required' => __('La date du remboursement est obligatoire.'),
        ];
    }
}
