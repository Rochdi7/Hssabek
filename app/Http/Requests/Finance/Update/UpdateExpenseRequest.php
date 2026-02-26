<?php

namespace App\Http\Requests\Finance\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
            'category_id' => 'sometimes|required|exists:finance_categories,id',
            'bank_account_id' => 'sometimes|required|exists:bank_accounts,id',
            'amount' => 'sometimes|required|numeric|min:0.01',
            'description' => 'nullable|string',
            'expense_date' => 'sometimes|required|date',
            'reference' => 'nullable|string|max:100',
        ];
    }
}
