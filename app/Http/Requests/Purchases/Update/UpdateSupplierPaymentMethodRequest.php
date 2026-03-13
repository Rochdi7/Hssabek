<?php

namespace App\Http\Requests\Purchases\Update;

use App\Http\Requests\TenantFormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierPaymentMethodRequest extends TenantFormRequest
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
                    ->where('tenant_id', $this->tenantId())
                    ->ignore($this->route('supplierPaymentMethod')),
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
            'name.required'  => __('Le nom de la méthode est obligatoire.'),
            'name.unique'    => __('Une méthode de paiement avec ce nom existe déjà.'),
            'name.max'       => __('Le nom ne peut pas dépasser 255 caractères.'),
            'provider.required' => __('Le type est obligatoire.'),
            'provider.in'    => __('Le type sélectionné est invalide.'),
        ];
    }
}
