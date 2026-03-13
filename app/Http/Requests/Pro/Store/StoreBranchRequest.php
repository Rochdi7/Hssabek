<?php

namespace App\Http\Requests\Pro\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'code' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:50'],
            'tax_id' => ['nullable', 'string', 'max:80'],
            'address_snapshot' => ['nullable', 'array'],
            'is_active' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom de la succursale est obligatoire.'),
            'name.max'      => __('Le nom ne doit pas dépasser 120 caractères.'),
            'code.required' => __('Le code est obligatoire.'),
            'code.max'      => __('Le code ne doit pas dépasser 50 caractères.'),
            'email.email'   => __('L\'adresse e-mail n\'est pas valide.'),
        ];
    }
}
