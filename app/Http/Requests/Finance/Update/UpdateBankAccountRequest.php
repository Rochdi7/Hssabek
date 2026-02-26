<?php

namespace App\Http\Requests\Finance\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $accountId = $this->route('bankAccount');
        return [
            'account_name' => 'sometimes|required|string|max:255',
            'account_number' => "sometimes|required|string|unique:bank_accounts,account_number,{$accountId}",
            'bank_name' => 'sometimes|required|string|max:255',
            'currency_id' => 'sometimes|required|exists:currencies,id',
            'balance' => 'sometimes|required|numeric|min:0',
            'is_active' => 'boolean',
        ];
    }
}
