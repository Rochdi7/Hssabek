<?php

namespace App\Http\Requests\Finance\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreMoneyTransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_bank_account_id' => ['required', 'uuid', 'exists:bank_accounts,id'],
            'to_bank_account_id' => ['required', 'uuid', 'exists:bank_accounts,id', 'different:from_bank_account_id'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'transfer_date' => ['required', 'date'],
            'status' => ['required', 'in:pending,completed,failed,cancelled'],
            'reference' => ['nullable', 'string', 'max:120'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
