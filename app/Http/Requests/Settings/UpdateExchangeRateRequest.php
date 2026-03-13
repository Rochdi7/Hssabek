<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExchangeRateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rate' => ['required', 'numeric', 'min:0.000001'],
            'date' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'rate.required' => __('Le taux de change est obligatoire.'),
            'rate.numeric' => __('Le taux doit être un nombre.'),
            'rate.min' => __('Le taux doit être supérieur à zéro.'),
            'date.date' => __('La date doit être une date valide.'),
        ];
    }
}
