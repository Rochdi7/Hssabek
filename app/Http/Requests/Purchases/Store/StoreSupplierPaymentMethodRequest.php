<?php

namespace App\Http\Requests\Purchases\Store;

use App\Http\Requests\TenantFormRequest;
use Illuminate\Validation\Rule;

class StoreSupplierPaymentMethodRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => [
                'required',
                'string',
                'max:255',
                Rule::unique('supplier_payment_methods', 'name')
                    ->where('tenant_id', $this->tenantId()),
            ],
            'provider'  => ['required', 'in:manual,stripe,paypal,other'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->has('is_active') ? true : false,
        ]);
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Le nom de la méthode est obligatoire.',
            'name.unique'    => 'Une méthode de paiement avec ce nom existe déjà.',
            'name.max'       => 'Le nom ne peut pas dépasser 255 caractères.',
            'provider.required' => 'Le type est obligatoire.',
            'provider.in'    => 'Le type sélectionné est invalide.',
        ];
    }
}
