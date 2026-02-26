<?php

namespace App\Http\Requests\Finance\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankAccountRequest extends FormRequest
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
        return [
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|unique:bank_accounts',
            'bank_name' => 'required|string|max:255',
            'currency_id' => 'required|exists:currencies,id',
            'balance' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ];
    }
}
