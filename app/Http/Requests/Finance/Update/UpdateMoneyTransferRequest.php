<?php

namespace App\Http\Requests\Finance\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMoneyTransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_bank_account_id' => ['sometimes', 'uuid', 'exists:bank_accounts,id'],
            'to_bank_account_id' => ['sometimes', 'uuid', 'exists:bank_accounts,id', 'different:from_bank_account_id'],
            'amount' => ['sometimes', 'numeric', 'gt:0'],
            'transfer_date' => ['sometimes', 'date'],
            'status' => ['sometimes', 'in:pending,completed,failed,cancelled'],
            'reference' => ['sometimes', 'nullable', 'string', 'max:120'],
            'notes' => ['sometimes', 'nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
