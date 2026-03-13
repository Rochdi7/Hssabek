<?php

namespace App\Http\Requests\Inventory\Store;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStockMovementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id'    => [
                'required', 'uuid',
                Rule::exists('products', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'warehouse_id'  => [
                'required', 'uuid',
                Rule::exists('warehouses', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'movement_type' => 'required|in:stock_in,stock_out,adjustment_in,adjustment_out',
            'quantity'      => 'required|numeric|min:0.001',
            'note'          => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required'    => __('Le produit est obligatoire.'),
            'product_id.exists'      => __('Le produit sélectionné est invalide.'),
            'warehouse_id.required'  => __('L\'entrepôt est obligatoire.'),
            'warehouse_id.exists'    => __('L\'entrepôt sélectionné est invalide.'),
            'movement_type.required' => __('Le type de mouvement est obligatoire.'),
            'movement_type.in'       => __('Le type de mouvement est invalide.'),
            'quantity.required'      => __('La quantité est obligatoire.'),
            'quantity.numeric'       => __('La quantité doit être un nombre.'),
            'quantity.min'           => __('La quantité doit être supérieure à zéro.'),
            'note.max'              => __('La note ne doit pas dépasser 1000 caractères.'),
        ];
    }
}
