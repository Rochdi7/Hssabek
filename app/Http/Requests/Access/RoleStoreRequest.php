<?php

namespace App\Http\Requests\Access;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Authorization handled by middleware/controller
    }

    public function rules(): array
    {
        $user = $this->user();
        $isSuperAdmin = $user->tenant_id === null;

        $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];

        if ($isSuperAdmin) {
            // SuperAdmin can optionally assign a tenant_id
            $rules['tenant_id'] = ['nullable', 'uuid', 'exists:tenants,id'];

            // Unique per tenant + guard
            $rules['name'][] = Rule::unique('roles')->where(function ($query) {
                $query->where('tenant_id', $this->input('tenant_id'))
                    ->where('guard_name', 'web');
            });
        } else {
            // Tenant admin: tenant_id is auto-assigned, cannot be spoofed
            $rules['name'][] = Rule::unique('roles')->where(function ($query) use ($user) {
                $query->where('tenant_id', $user->tenant_id)
                    ->where('guard_name', 'web');
            });
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('Un rôle avec ce nom existe déjà.'),
        ];
    }
}
