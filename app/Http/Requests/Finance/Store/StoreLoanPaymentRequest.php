<?php

namespace App\Http\Requests\Finance\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreLoanPaymentRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'amount'          => 'required|numeric|min:0.01',
            'payment_date'    => 'required|date',
            'payment_mode'    => 'required|in:cash,bank_transfer,card,cheque,other',
            'note'            => 'nullable|string|max:500',
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'amount.required'        => __('Le montant est obligatoire.'),
            'amount.numeric'         => __('Le montant doit être un nombre.'),
            'amount.min'             => __('Le montant doit être supérieur à zéro.'),
            'payment_date.required'  => __('La date du paiement est obligatoire.'),
            'payment_mode.required'  => __('Le mode de paiement est obligatoire.'),
            'payment_mode.in'        => __('Le mode de paiement est invalide.'),
        ];
    }
}
