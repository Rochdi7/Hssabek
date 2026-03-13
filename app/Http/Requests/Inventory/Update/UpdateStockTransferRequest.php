<?php

namespace App\Http\Requests\Inventory\Update;

use App\Services\Tenancy\TenantContext;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStockTransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_warehouse_id' => [
                'required', 'uuid',
                Rule::exists('warehouses', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'to_warehouse_id'   => [
                'required', 'uuid', 'different:from_warehouse_id',
                Rule::exists('warehouses', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'notes'             => 'nullable|string|max:1000',
            'items'             => 'required|array|min:1',
            'items.*.product_id' => [
                'required', 'uuid',
                Rule::exists('products', 'id')->where('tenant_id', TenantContext::id()),
            ],
            'items.*.quantity'  => 'required|numeric|min:0.001',
        ];
    }

    public function messages(): array
    {
        return [
            'from_warehouse_id.required'   => __('L\'entrepôt source est obligatoire.'),
            'from_warehouse_id.exists'     => __('L\'entrepôt source est invalide.'),
            'to_warehouse_id.required'     => __('L\'entrepôt de destination est obligatoire.'),
            'to_warehouse_id.exists'       => __('L\'entrepôt de destination est invalide.'),
            'to_warehouse_id.different'    => __('L\'entrepôt de destination doit être différent de la source.'),
            'items.required'               => __('Vous devez ajouter au moins un produit.'),
            'items.min'                    => __('Vous devez ajouter au moins un produit.'),
            'items.*.product_id.required'  => __('Le produit est obligatoire pour chaque ligne.'),
            'items.*.product_id.exists'    => __('Un produit sélectionné est invalide.'),
            'items.*.quantity.required'    => __('La quantité est obligatoire pour chaque ligne.'),
            'items.*.quantity.min'         => __('La quantité doit être supérieure à zéro.'),
        ];
    }
}
