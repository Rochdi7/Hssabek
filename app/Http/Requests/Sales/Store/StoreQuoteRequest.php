<?php

namespace App\Http\Requests\Sales\Store;

use App\Http\Requests\Traits\ResolveTaxSelection;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
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
            'customer_id' => ['required', 'uuid', Rule::exists('customers', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'expiry_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'terms' => ['nullable', 'string', 'max:2000'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.label' => ['required', 'string', 'max:255'],
            'items.*.description' => ['nullable', 'string', 'max:1000'],
            'items.*.product_id' => ['nullable', 'uuid', Rule::exists('products', 'id')->where('tenant_id', $tenantId)],
            'items.*.quantity' => ['required', 'numeric', 'min:0.001'],
            'items.*.unit_id' => ['nullable', 'uuid', Rule::exists('units', 'id')->where('tenant_id', $tenantId)],
            'items.*.unit_price' => ['required', 'numeric', 'min:0'],
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
            'customer_id.required' => __('Le client est obligatoire.'),
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'issue_date.required' => __('La date d\'émission est obligatoire.'),
            'expiry_date.after_or_equal' => __('La date d\'expiration doit être postérieure ou égale à la date d\'émission.'),
            'items.required' => __('Au moins un article est obligatoire.'),
            'items.min' => __('Au moins un article est obligatoire.'),
            'items.*.label.required' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required' => __('Le prix unitaire est obligatoire.'),
        ];
    }
}
