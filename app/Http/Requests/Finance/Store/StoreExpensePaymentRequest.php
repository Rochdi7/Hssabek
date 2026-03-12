<?php

namespace App\Http\Requests\Finance\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreExpensePaymentRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'amount'          => 'required|numeric|min:0.01',
            'payment_date'    => 'required|date',
            'payment_mode'    => 'required|in:cash,bank_transfer,card,cheque,other',
            'bank_account_id' => [
                'nullable',
                'uuid',
                Rule::exists('bank_accounts', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'note'            => 'nullable|string|max:500',
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'amount.required'        => 'Le montant est obligatoire.',
            'amount.numeric'         => 'Le montant doit être un nombre.',
            'amount.min'             => 'Le montant doit être supérieur à zéro.',
            'payment_date.required'  => 'La date du paiement est obligatoire.',
            'payment_mode.required'  => 'Le mode de paiement est obligatoire.',
            'payment_mode.in'        => 'Le mode de paiement est invalide.',
            'bank_account_id.exists' => 'Le compte bancaire sélectionné est invalide.',
        ];
    }
}
