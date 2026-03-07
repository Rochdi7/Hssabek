<?php

namespace App\Http\Requests\Inventory\Update;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class UpdateWarehouseRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'address'    => 'nullable|string|max:500',
            'is_default' => 'boolean',
            'is_active'  => 'boolean',
        ];
    }

    protected function updateRules(): array
    {
        $warehouseId = $this->route('warehouse')?->id ?? $this->route('warehouse');

        return [
            'name'       => [
                'required', 'string', 'max:255',
                Rule::unique('warehouses')->where('tenant_id', TenantContext::id())->ignore($warehouseId),
            ],
            'code'       => [
                'nullable', 'string', 'max:50',
                Rule::unique('warehouses')->where('tenant_id', TenantContext::id())->ignore($warehouseId),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'name.required' => 'Le nom de l\'entrepôt est obligatoire.',
            'name.max'      => 'Le nom ne doit pas dépasser 255 caractères.',
            'name.unique'   => 'Un entrepôt avec ce nom existe déjà.',
            'code.max'      => 'Le code ne doit pas dépasser 50 caractères.',
            'code.unique'   => 'Un entrepôt avec ce code existe déjà.',
            'address.max'   => 'L\'adresse ne doit pas dépasser 500 caractères.',
        ];
    }
}
