<?php

namespace App\Http\Requests\Purchases\Store;

use App\Http\Requests\Traits\ResolveTaxSelection;
use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePurchaseOrderRequest extends FormRequest
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
            'supplier_id'              => ['required', 'uuid', Rule::exists('suppliers', 'id')->where('tenant_id', $tenantId)],
            'warehouse_id'             => ['required', 'uuid', Rule::exists('warehouses', 'id')->where('tenant_id', $tenantId)],
            'order_date'               => 'required|date',
            'expected_date'            => 'nullable|date|after_or_equal:order_date',
            'notes'                    => 'nullable|string|max:2000',
            'terms'                    => 'nullable|string|max:5000',
            'items'                    => 'required|array|min:1',
            'items.*.product_id'       => ['nullable', 'uuid', Rule::exists('products', 'id')->where('tenant_id', $tenantId)],
            'items.*.label'            => 'required|string|max:255',
            'items.*.description'      => 'nullable|string|max:1000',
            'items.*.quantity'         => 'required|numeric|min:0.001',
            'items.*.unit_cost'        => 'required|numeric|min:0',
            'items.*.discount_type'    => 'nullable|in:none,percentage,fixed',
            'items.*.discount_value'   => 'nullable|numeric|min:0',
            'items.*.tax_rate'         => 'nullable|numeric|min:0|max:100',
            'items.*.tax_group_id'     => ['nullable', 'uuid', Rule::exists('tax_groups', 'id')->where('tenant_id', $tenantId)],
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_id.required'       => 'Le fournisseur est obligatoire.',
            'supplier_id.exists'         => 'Le fournisseur sélectionné est invalide.',
            'warehouse_id.required'      => 'L\'entrepôt est obligatoire.',
            'warehouse_id.exists'        => 'L\'entrepôt sélectionné est invalide.',
            'order_date.required'        => 'La date de commande est obligatoire.',
            'expected_date.after_or_equal' => 'La date de livraison prévue doit être postérieure ou égale à la date de commande.',
            'items.required'             => 'Au moins un article est obligatoire.',
            'items.min'                  => 'Au moins un article est obligatoire.',
            'items.*.label.required'     => 'Le libellé de l\'article est obligatoire.',
            'items.*.quantity.required'  => 'La quantité est obligatoire.',
            'items.*.quantity.min'       => 'La quantité doit être supérieure à zéro.',
            'items.*.unit_cost.required' => 'Le coût unitaire est obligatoire.',
        ];
    }
}
