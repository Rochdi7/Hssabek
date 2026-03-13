<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaxCategoryRequest extends FormRequest
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
            'name.required' => __('Le nom du taux de taxe est obligatoire.'),
            'name.max' => __('Le nom ne doit pas dépasser 255 caractères.'),
            'rate.required' => __('Le taux est obligatoire.'),
            'rate.numeric' => __('Le taux doit être un nombre.'),
            'rate.min' => __('Le taux ne peut pas être négatif.'),
            'rate.max' => __('Le taux ne peut pas dépasser 100.'),
            'type.required' => __('Le type de taxe est obligatoire.'),
            'type.in' => __('Le type doit être pourcentage ou fixe.'),
        ];
    }
}
