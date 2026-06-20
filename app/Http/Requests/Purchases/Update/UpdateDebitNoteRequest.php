<?php

namespace App\Http\Requests\Purchases\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateDebitNoteRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id'       => ['sometimes', 'uuid', $this->tenantExists('suppliers')],
            'purchase_order_id' => ['sometimes', 'nullable', 'uuid', $this->tenantExists('purchase_orders')],
            'vendor_bill_id'    => ['sometimes', 'nullable', 'uuid', $this->tenantExists('vendor_bills')],
            'debit_note_date'   => ['sometimes', 'date'],
            'due_date'          => ['sometimes', 'nullable', 'date', 'after_or_equal:debit_note_date'],
            'enable_tax'        => ['sometimes', 'boolean'],
            'reference_number'  => ['sometimes', 'nullable', 'string', 'max:100'],
            'notes'             => ['sometimes', 'nullable', 'string', 'max:2000'],
            'terms'             => ['sometimes', 'nullable', 'string', 'max:2000'],

            'items'                    => ['sometimes', 'array', 'min:1'],
            'items.*.label'            => ['required_with:items', 'string', 'max:255'],
            'items.*.description'      => ['nullable', 'string', 'max:1000'],
            'items.*.quantity'         => ['required_with:items', 'numeric', 'min:0.001'],
            'items.*.unit_price'       => ['required_with:items', 'numeric', 'min:0'],
            'items.*.discount_type'    => ['nullable', 'in:none,percentage,fixed'],
            'items.*.discount_value'   => ['nullable', 'numeric', 'min:0'],
            'items.*.tax_rate'         => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_id.exists'          => __('Le fournisseur sélectionné est invalide.'),
            'purchase_order_id.exists'    => __('Le bon de commande sélectionné est invalide.'),
            'vendor_bill_id.exists'       => __('La facture fournisseur sélectionnée est invalide.'),
            'debit_note_date.date'        => __('La date de la note de débit n\'est pas valide.'),
            'due_date.after_or_equal'     => __('La date d\'échéance doit être postérieure ou égale à la date de la note.'),
            'items.*.label.required_with' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required_with' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required_with' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
