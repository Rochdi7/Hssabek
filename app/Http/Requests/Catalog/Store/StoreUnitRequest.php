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
            'name.required'       => __("Le nom de l'unité est obligatoire."),
            'name.max'            => __('Le nom ne doit pas dépasser 255 caractères.'),
            'name.unique'         => __("Ce nom d'unité est déjà utilisé."),
            'short_name.required' => __("L'abréviation est obligatoire."),
            'short_name.max'      => __("L'abréviation ne doit pas dépasser 10 caractères."),
            'short_name.unique'   => __('Cette abréviation est déjà utilisée.'),
        ];
    }
}
