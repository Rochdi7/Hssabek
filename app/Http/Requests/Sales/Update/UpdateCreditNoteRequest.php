<?php

namespace App\Http\Requests\Sales\Update;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCreditNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenantId = TenantContext::id();

        return [
            'customer_id' => ['sometimes', 'required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'invoice_id' => ['nullable', 'uuid', Rule::exists('invoices', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['sometimes', 'required', 'date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],

            'items' => ['sometimes', 'required', 'array', 'min:1'],
            'items.*.label' => ['required_with:items', 'string', 'max:255'],
            'items.*.description' => ['nullable', 'string', 'max:1000'],
            'items.*.quantity' => ['required_with:items', 'numeric', 'min:0.001'],
            'items.*.unit_price' => ['required_with:items', 'numeric', 'min:0'],
            'items.*.tax_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'invoice_id.exists' => __('La facture sélectionnée est invalide.'),
            'items.min' => __('Au moins un article est obligatoire.'),
            'items.*.label.required_with' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required_with' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required_with' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
