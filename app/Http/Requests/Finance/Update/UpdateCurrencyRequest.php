<?php

namespace App\Http\Requests\Finance\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest
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
        $currencyId = $this->route('currency');
        return [
            'code' => "sometimes|required|string|size:3|unique:currencies,code,{$currencyId}",
            'name' => "sometimes|required|string|max:255|unique:currencies,name,{$currencyId}",
            'symbol' => 'sometimes|required|string|max:10',
            'exchange_rate' => 'sometimes|required|numeric|min:0.01',
            'is_active' => 'boolean',
        ];
    }
}
