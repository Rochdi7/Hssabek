<?php

namespace App\Http\Requests\Sales\Store;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCreditNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenantId = TenantContext::id();

        return [
            'customer_id' => ['required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'bank_account_id' => ['required', 'uuid', Rule::exists('bank_accounts', 'id')->where('tenant_id', $tenantId)],
            'invoice_id' => ['nullable', 'uuid', Rule::exists('invoices', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['required', 'date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],

            // Line items
            'items' => ['required', 'array', 'min:1'],
            'items.*.label' => ['required', 'string', 'max:255'],
            'items.*.description' => ['nullable', 'string', 'max:1000'],
            'items.*.quantity' => ['required', 'numeric', 'min:0.001'],
            'items.*.unit_price' => ['required', 'numeric', 'min:0'],
            'items.*.tax_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'bank_account_id.required' => __('Le compte bancaire est obligatoire.'),
            'bank_account_id.exists' => __('Le compte bancaire sélectionné est invalide.'),
            'customer_id.required' => __('Le client est obligatoire.'),
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'invoice_id.exists' => __('La facture sélectionnée est invalide.'),
            'issue_date.required' => __('La date d\'émission est obligatoire.'),
            'items.required' => __('Au moins un article est obligatoire.'),
            'items.min' => __('Au moins un article est obligatoire.'),
            'items.*.label.required' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
