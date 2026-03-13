<?php

namespace App\Http\Requests\Inventory\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreWarehouseRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'address'    => 'nullable|string|max:500',
            'is_default' => 'boolean',
            'is_active'  => 'boolean',
        ];
    }

    protected function storeRules(): array
    {
        return [
            'name'       => [
                'required', 'string', 'max:255',
                Rule::unique('warehouses')->where('tenant_id', TenantContext::id()),
            ],
            'code'       => [
                'nullable', 'string', 'max:50',
                Rule::unique('warehouses')->where('tenant_id', TenantContext::id()),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'name.required' => __('Le nom de l\'entrepôt est obligatoire.'),
            'name.max'      => __('Le nom ne doit pas dépasser 255 caractères.'),
            'name.unique'   => __('Un entrepôt avec ce nom existe déjà.'),
            'code.max'      => __('Le code ne doit pas dépasser 50 caractères.'),
            'code.unique'   => __('Un entrepôt avec ce code existe déjà.'),
            'address.max'   => __('L\'adresse ne doit pas dépasser 500 caractères.'),
        ];
    }
}
