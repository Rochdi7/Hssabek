<?php

namespace App\Http\Requests\Finance\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreExpenseRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'reference_number'  => 'nullable|string|max:100',
            'amount'            => 'required|numeric|min:0.01',
            'expense_date'      => 'required|date',
            'payment_mode'      => 'required|in:cash,bank_transfer,card,cheque,other',
            'payment_status'    => 'required|in:unpaid,paid,partial',
            'bank_account_id'   => [
                'nullable',
                'uuid',
                Rule::exists('bank_accounts', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'supplier_id'       => [
                'nullable',
                'uuid',
                Rule::exists('suppliers', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'category_id'       => [
                'nullable',
                'uuid',
                Rule::exists('finance_categories', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'description'       => 'nullable|string|max:2000',
            'paid_amount'       => 'nullable|numeric|min:0.01|lt:amount',
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'amount.required'         => __('Le montant est obligatoire.'),
            'amount.numeric'          => __('Le montant doit être un nombre.'),
            'amount.min'              => __('Le montant doit être supérieur à zéro.'),
            'expense_date.required'   => __('La date de la dépense est obligatoire.'),
            'payment_mode.required'   => __('Le mode de paiement est obligatoire.'),
            'payment_mode.in'         => __('Le mode de paiement est invalide.'),
            'payment_status.required' => __('Le statut de paiement est obligatoire.'),
            'payment_status.in'       => __('Le statut de paiement est invalide.'),
            'bank_account_id.exists'  => __('Le compte bancaire sélectionné est invalide.'),
            'supplier_id.exists'      => __('Le fournisseur sélectionné est invalide.'),
            'category_id.exists'      => __('La catégorie sélectionnée est invalide.'),
            'paid_amount.min'         => __('Le montant payé doit être supérieur à zéro.'),
            'paid_amount.lt'          => __('Le montant payé doit être inférieur au montant total.'),
        ];
    }
}
