<?php

namespace App\Http\Requests\Purchases\Store;

use App\Http\Requests\TenantFormRequest;

class StoreDebitNoteRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id'       => ['required', 'uuid', $this->tenantExists('suppliers')],
            'bank_account_id'   => ['required', 'uuid', $this->tenantExists('bank_accounts')],
            'purchase_order_id' => ['nullable', 'uuid', $this->tenantExists('purchase_orders')],
            'vendor_bill_id'    => ['nullable', 'uuid', $this->tenantExists('vendor_bills')],
            'debit_note_date'   => ['required', 'date'],
            'due_date'          => ['nullable', 'date', 'after_or_equal:debit_note_date'],
            'enable_tax'        => ['nullable', 'boolean'],
            'reference_number'  => ['nullable', 'string', 'max:100'],
            'notes'             => ['nullable', 'string', 'max:2000'],
            'terms'             => ['nullable', 'string', 'max:2000'],

            'items'                    => ['required', 'array', 'min:1'],
            'items.*.label'            => ['required', 'string', 'max:255'],
            'items.*.description'      => ['nullable', 'string', 'max:1000'],
            'items.*.quantity'         => ['required', 'numeric', 'min:0.001'],
            'items.*.unit_price'       => ['required', 'numeric', 'min:0'],
            'items.*.discount_type'    => ['nullable', 'in:none,percentage,fixed'],
            'items.*.discount_value'   => ['nullable', 'numeric', 'min:0'],
            'items.*.tax_rate'         => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'bank_account_id.required'    => __('Le compte bancaire est obligatoire.'),
            'bank_account_id.exists'      => __('Le compte bancaire sélectionné est invalide.'),
            'supplier_id.required'        => __('Le fournisseur est obligatoire.'),
            'supplier_id.exists'          => __('Le fournisseur sélectionné est invalide.'),
            'purchase_order_id.exists'    => __('Le bon de commande sélectionné est invalide.'),
            'vendor_bill_id.exists'       => __('La facture fournisseur sélectionnée est invalide.'),
            'debit_note_date.required'    => __('La date de la note de débit est obligatoire.'),
            'due_date.after_or_equal'     => __('La date d\'échéance doit être postérieure ou égale à la date de la note.'),
            'items.required'              => __('Au moins un article est obligatoire.'),
            'items.min'                   => __('Au moins un article est obligatoire.'),
            'items.*.label.required'      => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required'   => __('La quantité est obligatoire.'),
            'items.*.unit_price.required' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
