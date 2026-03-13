<?php

namespace App\Http\Requests\Access;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only SuperAdmin can create permissions
        return $this->user()->tenant_id === null;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z_]+\.[a-z_]+\.[a-z_]+$/', // Must match group.module.action format
                Rule::unique('permissions')->where(function ($query) {
                    $query->where('guard_name', 'web')
                        ->whereNull('tenant_id');
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => __('Le nom de la permission doit suivre le format : groupe.module.action (ex. : sales.invoices.create).'),
            'name.unique' => __('Cette permission existe déjà.'),
        ];
    }
}
