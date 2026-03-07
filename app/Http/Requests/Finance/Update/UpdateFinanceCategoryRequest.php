<?php

namespace App\Http\Requests\Finance\Update;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class UpdateFinanceCategoryRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('finance_categories')->where('tenant_id', TenantContext::id()),
            ],
            'type'      => 'required|in:expense,income',
            'is_active' => 'boolean',
        ];
    }

    protected function updateRules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('finance_categories')->where('tenant_id', TenantContext::id())
                    ->ignore($this->route('finance_category')),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique'   => 'Une catégorie avec ce nom existe déjà.',
            'type.required' => 'Le type de catégorie est obligatoire.',
            'type.in'       => 'Le type doit être "dépense" ou "revenu".',
        ];
    }
}
