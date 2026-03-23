<?php

namespace App\Http\Requests\Sales\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateDeliveryChallanRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id'  => ['sometimes', 'uuid', $this->tenantExists('customers')],
            'bank_account_id' => ['required', 'uuid', $this->tenantExists('bank_accounts')],
            'quote_id'     => ['sometimes', 'nullable', 'uuid', $this->tenantExists('quotes')],
            'invoice_id'   => ['sometimes', 'nullable', 'uuid', $this->tenantExists('invoices')],
            'challan_date' => ['sometimes', 'date'],
            'due_date'     => ['sometimes', 'nullable', 'date', 'after_or_equal:challan_date'],
            'enable_tax'   => ['sometimes', 'boolean'],
            'reference_number' => ['sometimes', 'nullable', 'string', 'max:100'],
            'notes'        => ['sometimes', 'nullable', 'string', 'max:2000'],
            'terms'        => ['sometimes', 'nullable', 'string', 'max:2000'],
            'delivered_at' => ['sometimes', 'nullable', 'date'],

            'items'                  => ['nullable', 'array'],
            'items.*.product_id'     => ['nullable', 'uuid', $this->tenantExists('products')],
            'items.*.label'          => ['nullable', 'string', 'max:255'],
            'items.*.quantity'       => ['required', 'numeric', 'min:0.001'],
            'items.*.unit_price'     => ['nullable', 'numeric', 'min:0'],
            'items.*.tax_rate'       => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'bank_account_id.required' => __('Le compte bancaire est obligatoire.'),
            'bank_account_id.exists' => __('Le compte bancaire sélectionné est invalide.'),
            'customer_id.exists'    => __('Le client sélectionné est invalide.'),
            'quote_id.exists'       => __('Le devis sélectionné est invalide.'),
            'invoice_id.exists'     => __('La facture sélectionnée est invalide.'),
            'challan_date.date'     => __('La date du bon de livraison n\'est pas valide.'),
            'due_date.after_or_equal' => __('La date d\'échéance doit être postérieure ou égale à la date du bon.'),
            'items.*.quantity.required' => __('La quantité est obligatoire pour chaque article.'),
            'items.*.quantity.min'      => __('La quantité doit être supérieure à 0.'),
        ];
    }
}
