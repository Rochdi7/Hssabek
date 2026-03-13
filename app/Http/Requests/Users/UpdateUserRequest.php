<?php

namespace App\Http\Requests\Users;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = $this->route('user');

        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'roles' => ['nullable', 'array'],
            'roles.*' => [
                'integer',
                Rule::exists('roles', 'id')->where('tenant_id', TenantContext::id()),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom est obligatoire.'),
            'name.max' => __('Le nom ne doit pas dépasser 255 caractères.'),
            'phone.max' => __('Le téléphone ne doit pas dépasser 30 caractères.'),
            'roles.array' => __('Les rôles doivent être un tableau.'),
            'roles.*.exists' => __("Le rôle sélectionné n'existe pas."),
        ];
    }
}
