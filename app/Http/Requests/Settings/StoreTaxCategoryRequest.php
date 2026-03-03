<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaxCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'type' => ['required', 'in:percentage,fixed'],
            'is_default' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du taux de taxe est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'rate.required' => 'Le taux est obligatoire.',
            'rate.numeric' => 'Le taux doit être un nombre.',
            'rate.min' => 'Le taux ne peut pas être négatif.',
            'rate.max' => 'Le taux ne peut pas dépasser 100.',
            'type.required' => 'Le type de taxe est obligatoire.',
            'type.in' => 'Le type doit être pourcentage ou fixe.',
        ];
    }
}
