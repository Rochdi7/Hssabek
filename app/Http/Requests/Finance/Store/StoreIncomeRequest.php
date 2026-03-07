<?php

namespace App\Http\Requests\Finance\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreIncomeRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'reference_number'  => 'nullable|string|max:100',
            'amount'            => 'required|numeric|min:0.01',
            'income_date'       => 'required|date',
            'payment_mode'      => 'required|in:cash,bank_transfer,card,cheque,other',
            'bank_account_id'   => [
                'nullable',
                'uuid',
                Rule::exists('bank_accounts', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'customer_id'       => [
                'nullable',
                'uuid',
                Rule::exists('customers', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'category_id'       => [
                'nullable',
                'uuid',
                Rule::exists('finance_categories', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'description'       => 'nullable|string|max:2000',
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'amount.required'        => 'Le montant est obligatoire.',
            'amount.numeric'         => 'Le montant doit être un nombre.',
            'amount.min'             => 'Le montant doit être supérieur à zéro.',
            'income_date.required'   => 'La date du revenu est obligatoire.',
            'payment_mode.required'  => 'Le mode de paiement est obligatoire.',
            'payment_mode.in'        => 'Le mode de paiement est invalide.',
            'bank_account_id.exists' => 'Le compte bancaire sélectionné est invalide.',
            'customer_id.exists'     => 'Le client sélectionné est invalide.',
            'category_id.exists'     => 'La catégorie sélectionnée est invalide.',
        ];
    }
}
