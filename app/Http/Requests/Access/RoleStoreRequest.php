<?php

namespace App\Http\Requests\Access;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
            $rules['tenant_id'] = ['nullable', 'uuid', 'exists:tenants,id'];

            $rules['name'][] = Rule::unique('roles')->where(function ($query) {
                $query->where('tenant_id', $this->input('tenant_id'))
                    ->where('guard_name', 'web');
            });
        } else {
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
            'name.unique' => __('permissions.messages.role_unique'),
        ];
    }
}
