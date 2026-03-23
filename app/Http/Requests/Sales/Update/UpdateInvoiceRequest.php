<?php

namespace App\Http\Requests\Sales\Update;

use App\Http\Requests\Traits\ResolveTaxSelection;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
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
            'bank_account_id' => ['required', 'uuid', Rule::exists('bank_accounts', 'id')->where('tenant_id', $tenantId)],
            'issue_date' => ['sometimes', 'required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'enable_tax' => ['nullable', 'boolean'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'terms' => ['nullable', 'string', 'max:2000'],

            // Recurring fields
            'is_recurring' => ['nullable', 'boolean'],
            'recurring_interval' => ['required_if:is_recurring,1', 'nullable', 'in:week,month,year'],
            'recurring_every' => ['required_if:is_recurring,1', 'nullable', 'integer', 'min:1'],
            'recurring_next_run_at' => ['required_if:is_recurring,1', 'nullable', 'date', 'after_or_equal:today'],
            'recurring_end_at' => ['nullable', 'date', 'after_or_equal:recurring_next_run_at'],

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
            'bank_account_id.required' => __('Le compte bancaire est obligatoire.'),
            'bank_account_id.exists' => __('Le compte bancaire sélectionné est invalide.'),
            'customer_id.exists' => __('Le client sélectionné est invalide.'),
            'items.min' => __('Au moins un article est obligatoire.'),
            'items.*.label.required_with' => __('Le libellé de l\'article est obligatoire.'),
            'items.*.quantity.required_with' => __('La quantité est obligatoire.'),
            'items.*.unit_price.required_with' => __('Le prix unitaire est obligatoire.'),
            'recurring_interval.required_if' => __('L\'intervalle de récurrence est obligatoire.'),
            'recurring_every.required_if' => __('La fréquence de récurrence est obligatoire.'),
            'recurring_next_run_at.required_if' => __('La date de première exécution est obligatoire pour la récurrence.'),
            'recurring_next_run_at.after_or_equal' => __('La date de première exécution doit être aujourd\'hui ou ultérieure.'),
            'recurring_end_at.after_or_equal' => __('La date de fin doit être postérieure ou égale à la date de première exécution.'),
        ];
    }
}
