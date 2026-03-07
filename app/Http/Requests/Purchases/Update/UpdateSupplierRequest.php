<?php

namespace App\Http\Requests\Purchases\Update;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'name'               => 'required|string|max:255',
            'phone'              => 'nullable|string|max:30',
            'payment_terms_days' => 'nullable|integer|min:0|max:365',
            'status'             => 'required|in:active,inactive',
            'notes'              => 'nullable|string|max:2000',
        ];
    }

    protected function updateRules(): array
    {
        $supplierId = $this->route('supplier')?->id ?? $this->route('supplier');

        return [
            'email'              => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('suppliers', 'email')
                    ->where('tenant_id', TenantContext::id())
                    ->ignore($supplierId),
            ],
            'tax_id'             => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('suppliers', 'tax_id')
                    ->where('tenant_id', TenantContext::id())
                    ->ignore($supplierId),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'name.required'              => 'Le nom du fournisseur est obligatoire.',
            'name.max'                   => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.email'                => 'L\'adresse e-mail n\'est pas valide.',
            'email.unique'               => 'Cette adresse e-mail est déjà utilisée par un autre fournisseur.',
            'tax_id.unique'              => 'Cet identifiant fiscal est déjà utilisé par un autre fournisseur.',
            'payment_terms_days.integer' => 'Le délai de paiement doit être un nombre entier.',
            'payment_terms_days.min'     => 'Le délai de paiement ne peut pas être négatif.',
            'status.required'            => 'Le statut est obligatoire.',
            'status.in'                  => 'Le statut doit être actif ou inactif.',
        ];
    }
}
