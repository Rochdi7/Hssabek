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
        $rules = [
            'email' => ['required', 'email', 'max:255'],
            'role_id' => [
                'required',
                'integer',
                Rule::exists('roles', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'password_mode' => ['required', 'in:auto,manual'],
        ];

        if ($this->input('password_mode') === 'manual') {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        return $rules;
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
            'password_mode.required' => __('Le mode de mot de passe est obligatoire.'),
            'password_mode.in' => __('Le mode de mot de passe sélectionné est invalide.'),
            'password.required' => __('Le mot de passe est obligatoire.'),
            'password.min' => __('Le mot de passe doit contenir au moins 8 caractères.'),
            'password.confirmed' => __('La confirmation du mot de passe ne correspond pas.'),
        ];
    }
}
