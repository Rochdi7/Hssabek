<?php

namespace App\Http\Requests\CRM\Update;

use App\Http\Requests\BaseFormRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends BaseFormRequest
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

    protected function updateRules(): array
    {
        $customerId = $this->route('customer')?->id;

        return [
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('customers', 'email')
                    ->where('tenant_id', TenantContext::id())
                    ->ignore($customerId),
            ],
            'tax_id' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('customers', 'tax_id')
                    ->where('tenant_id', TenantContext::id())
                    ->ignore($customerId),
            ],
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'type.required' => 'Le type de client est obligatoire.',
            'type.in' => 'Le type de client doit être « Particulier » ou « Entreprise ».',
            'name.required' => 'Le nom est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'email.email' => "L'adresse e-mail n'est pas valide.",
            'email.unique' => 'Cette adresse e-mail est déjà utilisée par un autre client.',
            'phone.max' => 'Le téléphone ne doit pas dépasser 30 caractères.',
            'tax_id.unique' => "Ce numéro d'identification fiscale est déjà utilisé.",
            'tax_id.max' => "L'identifiant fiscal ne doit pas dépasser 50 caractères.",
            'payment_terms_days.integer' => 'Le délai de paiement doit être un nombre entier.',
            'payment_terms_days.min' => 'Le délai de paiement ne peut pas être négatif.',
            'payment_terms_days.max' => 'Le délai de paiement ne doit pas dépasser 365 jours.',
            'status.required' => 'Le statut est obligatoire.',
            'status.in' => 'Le statut doit être « Actif » ou « Inactif ».',
            'notes.max' => 'Les notes ne doivent pas dépasser 2000 caractères.',
        ];
    }
}
