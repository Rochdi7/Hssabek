<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'code' => ['required', 'string', 'size:3', 'alpha', 'unique:currencies,code'],
            'symbol' => ['required', 'string', 'max:10'],
            'rate' => ['required', 'numeric', 'min:0.000001'],
            'is_default' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de la devise est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 100 caractères.',
            'code.required' => 'Le code devise est obligatoire.',
            'code.size' => 'Le code devise doit contenir exactement 3 caractères.',
            'code.alpha' => 'Le code devise ne doit contenir que des lettres.',
            'code.unique' => 'Ce code devise existe déjà.',
            'symbol.required' => 'Le symbole est obligatoire.',
            'symbol.max' => 'Le symbole ne doit pas dépasser 10 caractères.',
            'rate.required' => 'Le taux de change est obligatoire.',
            'rate.numeric' => 'Le taux doit être un nombre.',
            'rate.min' => 'Le taux doit être supérieur à zéro.',
        ];
    }
}
