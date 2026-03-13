<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreExchangeRateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quote_currency' => ['required', 'string', 'size:3', 'exists:currencies,code'],
            'rate' => ['required', 'numeric', 'min:0.000001'],
            'date' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'quote_currency.required' => __('La devise est obligatoire.'),
            'quote_currency.size' => __('Le code devise doit contenir 3 caractères.'),
            'quote_currency.exists' => __('La devise sélectionnée n\'existe pas.'),
            'rate.required' => __('Le taux de change est obligatoire.'),
            'rate.numeric' => __('Le taux doit être un nombre.'),
            'rate.min' => __('Le taux doit être supérieur à zéro.'),
            'date.date' => __('La date doit être une date valide.'),
        ];
    }
}
