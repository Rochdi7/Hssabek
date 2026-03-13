<?php

namespace App\Http\Requests\Catalog\Store;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('product_categories', 'name')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'slug' => [
                'nullable', 'string', 'max:255',
                Rule::unique('product_categories', 'slug')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Le nom de la catégorie est obligatoire.'),
            'name.max'      => __('Le nom ne doit pas dépasser 255 caractères.'),
            'name.unique'   => __('Ce nom de catégorie est déjà utilisé.'),
            'slug.unique'   => __('Ce slug est déjà utilisé.'),
        ];
    }
}
