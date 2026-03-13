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
            'code' => ['required', 'string', 'size:3', 'alpha'],
            'symbol' => ['required', 'string', 'max:10'],
            'rate' => ['required', 'numeric', 'min:0.000001'],
            'is_default' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom de la devise est obligatoire.'),
            'name.max' => __('Le nom ne doit pas dépasser 100 caractères.'),
            'code.required' => __('Le code devise est obligatoire.'),
            'code.size' => __('Le code devise doit contenir exactement 3 caractères.'),
            'code.alpha' => __('Le code devise ne doit contenir que des lettres.'),
            'symbol.required' => __('Le symbole est obligatoire.'),
            'symbol.max' => __('Le symbole ne doit pas dépasser 10 caractères.'),
            'rate.required' => __('Le taux de change est obligatoire.'),
            'rate.numeric' => __('Le taux doit être un nombre.'),
            'rate.min' => __('Le taux doit être supérieur à zéro.'),
        ];
    }
}
