<?php

namespace App\Http\Requests\CRM\Store;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'type' => ['required', 'in:individual,company'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'payment_terms_days' => ['nullable', 'integer', 'min:0', 'max:365'],
            'status' => ['required', 'in:active,inactive'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('customers', 'email')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'tax_id' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('customers', 'tax_id')
                    ->where('tenant_id', TenantContext::id()),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'type.required' => __('Le type de client est obligatoire.'),
            'type.in' => __('Le type de client doit être « Particulier » ou « Entreprise ».'),
            'name.required' => __('Le nom est obligatoire.'),
            'name.max' => __('Le nom ne doit pas dépasser 255 caractères.'),
            'email.email' => __("L'adresse e-mail n'est pas valide."),
            'email.unique' => __('Cette adresse e-mail est déjà utilisée par un autre client.'),
            'phone.max' => __('Le téléphone ne doit pas dépasser 30 caractères.'),
            'tax_id.unique' => __("Ce numéro d'identification fiscale est déjà utilisé."),
            'tax_id.max' => __("L'identifiant fiscal ne doit pas dépasser 50 caractères."),
            'payment_terms_days.integer' => __('Le délai de paiement doit être un nombre entier.'),
            'payment_terms_days.min' => __('Le délai de paiement ne peut pas être négatif.'),
            'payment_terms_days.max' => __('Le délai de paiement ne doit pas dépasser 365 jours.'),
            'status.required' => __('Le statut est obligatoire.'),
            'status.in' => __('Le statut doit être « Actif » ou « Inactif ».'),
            'notes.max' => __('Les notes ne doivent pas dépasser 2000 caractères.'),
        ];
    }
}
