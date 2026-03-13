<?php

namespace App\Http\Requests\CRM\Store;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => [
                'required',
                Rule::exists('customers', 'id')
                    ->where('tenant_id', TenantContext::id()),
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'position' => ['nullable', 'string', 'max:100'],
            'is_primary' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => __('Le client est obligatoire.'),
            'customer_id.exists' => __("Le client sélectionné n'existe pas."),
            'name.required' => __('Le nom du contact est obligatoire.'),
            'name.max' => __('Le nom du contact ne doit pas dépasser 255 caractères.'),
            'email.email' => __("L'adresse e-mail du contact n'est pas valide."),
            'email.max' => __("L'adresse e-mail ne doit pas dépasser 255 caractères."),
            'phone.max' => __('Le téléphone ne doit pas dépasser 30 caractères.'),
            'position.max' => __('Le poste ne doit pas dépasser 100 caractères.'),
            'is_primary.boolean' => __('Le champ « Contact principal » doit être vrai ou faux.'),
        ];
    }
}
