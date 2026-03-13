<?php

namespace App\Http\Requests\Users;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InviteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'role_id' => [
                'required',
                'integer',
                Rule::exists('roles', 'id')->where('tenant_id', TenantContext::id()),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __("L'adresse e-mail est obligatoire."),
            'email.email' => __("L'adresse e-mail n'est pas valide."),
            'email.max' => __("L'adresse e-mail ne doit pas dépasser 255 caractères."),
            'role_id.required' => __('Le rôle est obligatoire.'),
            'role_id.integer' => __('Le rôle sélectionné est invalide.'),
            'role_id.exists' => __("Le rôle sélectionné n'existe pas."),
        ];
    }
}
