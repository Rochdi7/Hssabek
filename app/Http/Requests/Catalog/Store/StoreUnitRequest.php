<?php

namespace App\Http\Requests\Catalog\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreUnitRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('units', 'name')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'short_name' => [
                'required', 'string', 'max:10',
                Rule::unique('units', 'short_name')
                    ->where('tenant_id', TenantContext::id()),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'name.required'       => "Le nom de l'unité est obligatoire.",
            'name.max'            => 'Le nom ne doit pas dépasser 255 caractères.',
            'name.unique'         => "Ce nom d'unité est déjà utilisé.",
            'short_name.required' => "L'abréviation est obligatoire.",
            'short_name.max'      => "L'abréviation ne doit pas dépasser 10 caractères.",
            'short_name.unique'   => 'Cette abréviation est déjà utilisée.',
        ];
    }
}
