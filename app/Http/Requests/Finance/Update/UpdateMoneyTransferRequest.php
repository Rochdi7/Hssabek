<?php

namespace App\Http\Requests\Finance\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateMoneyTransferRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_bank_account_id' => ['sometimes', 'uuid', $this->tenantExists('bank_accounts')],
            'to_bank_account_id'   => ['sometimes', 'uuid', $this->tenantExists('bank_accounts'), 'different:from_bank_account_id'],
            'amount'               => ['sometimes', 'numeric', 'gt:0'],
            'transfer_date'        => ['sometimes', 'date'],
            'reference_number'     => ['sometimes', 'nullable', 'string', 'max:120'],
            'notes'                => ['sometimes', 'nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'from_bank_account_id.exists'  => __('Le compte source est invalide.'),
            'to_bank_account_id.exists'    => __('Le compte destination est invalide.'),
            'to_bank_account_id.different' => __('Le compte destination doit être différent du compte source.'),
            'amount.gt'                    => __('Le montant doit être supérieur à zéro.'),
            'transfer_date.date'           => __('La date du transfert n\'est pas valide.'),
        ];
    }
}
