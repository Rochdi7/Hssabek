<?php

namespace App\Http\Requests\Sales\Update;

use App\Http\Requests\Traits\ResolveTaxSelection;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuoteRequest extends FormRequest
{
    use ResolveTaxSelection;
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenantId = TenantContext::id();

        return [
            'customer_id' => ['sometimes', 'required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['sometimes', 'required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'expiry_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'terms' => ['nullable', 'string', 'max:2000'],

            'items' => ['sometimes', 'required', 'array', 'min:1'],
            'items.*.label' => ['required_with:items', 'string', 'max:255'],
            'items.*.description' => ['nullable', 'string', 'max:1000'],
            'items.*.product_id' => ['nullable', 'uuid', Rule::exists('products', 'id')->where('tenant_id', $tenantId)],
            'items.*.quantity' => ['required_with:items', 'numeric', 'min:0.001'],
            'items.*.unit_id' => ['nullable', 'uuid', Rule::exists('units', 'id')->where('tenant_id', $tenantId)],
            'items.*.unit_price' => ['required_with:items', 'numeric', 'min:0'],
            'items.*.discount_type' => ['nullable', Rule::in(['none', 'percentage', 'fixed'])],
            'items.*.discount_value' => ['nullable', 'numeric', 'min:0'],
            'items.*.tax_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'items.*.tax_group_id' => ['nullable', 'uuid', Rule::exists('tax_groups', 'id')->where('tenant_id', $tenantId)],

            'charges' => ['sometimes', 'array'],
            'charges.*.label' => ['required_with:charges', 'string', 'max:255'],
            'charges.*.amount' => ['required_with:charges', 'numeric', 'min:0'],
            'charges.*.tax_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.exists' => 'Le client sélectionné est invalide.',
            'items.min' => 'Au moins un article est obligatoire.',
            'items.*.label.required_with' => 'Le libellé de l\'article est obligatoire.',
            'items.*.quantity.required_with' => 'La quantité est obligatoire.',
            'items.*.unit_price.required_with' => 'Le prix unitaire est obligatoire.',
        ];
    }
}
