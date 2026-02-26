<?php

namespace App\Http\Requests\Finance\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
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
            'code' => 'required|string|size:3|unique:currencies',
            'name' => 'required|string|max:255|unique:currencies',
            'symbol' => 'required|string|max:10',
            'exchange_rate' => 'required|numeric|min:0.01',
            'is_active' => 'boolean',
        ];
    }
}
