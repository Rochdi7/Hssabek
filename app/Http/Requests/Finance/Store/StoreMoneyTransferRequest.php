<?php

namespace App\Http\Requests\Finance\Store;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMoneyTransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_bank_account_id' => [
                'required', 'uuid',
                Rule::exists('bank_accounts', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'to_bank_account_id' => [
                'required', 'uuid', 'different:from_bank_account_id',
                Rule::exists('bank_accounts', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'amount'        => 'required|numeric|gt:0',
            'transfer_date' => 'required|date',
            'reference_number' => 'nullable|string|max:120',
            'notes'         => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'from_bank_account_id.required' => __('Le compte source est obligatoire.'),
            'from_bank_account_id.exists'   => __('Le compte source est invalide.'),
            'to_bank_account_id.required'   => __('Le compte destination est obligatoire.'),
            'to_bank_account_id.exists'     => __('Le compte destination est invalide.'),
            'to_bank_account_id.different'  => __('Le compte destination doit être différent du compte source.'),
            'amount.required'               => __('Le montant est obligatoire.'),
            'amount.gt'                     => __('Le montant doit être supérieur à zéro.'),
            'transfer_date.required'        => __('La date du transfert est obligatoire.'),
        ];
    }
}
