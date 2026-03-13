<?php

namespace App\Http\Requests\CRM\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'position' => ['nullable', 'string', 'max:100'],
            'is_primary' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom du contact est obligatoire.'),
            'name.max' => __('Le nom du contact ne doit pas dépasser 255 caractères.'),
            'email.email' => __("L'adresse e-mail du contact n'est pas valide."),
            'email.max' => __("L'adresse e-mail ne doit pas dépasser 255 caractères."),
            'phone.max' => __('Le téléphone ne doit pas dépasser 30 caractères.'),
            'position.max' => __('Le poste ne doit pas dépasser 100 caractères.'),
            'is_primary.boolean' => __('Le champ « Contact principal » doit être vrai ou faux.'),
        ];
    }
}
