<?php

namespace App\Http\Requests\Purchases\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateGoodsReceiptRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purchase_order_id' => ['sometimes', 'nullable', 'uuid', $this->tenantExists('purchase_orders')],
            'warehouse_id'      => ['sometimes', 'uuid', $this->tenantExists('warehouses')],
            'received_at'       => ['sometimes', 'nullable', 'date'],
            'reference_number'  => ['sometimes', 'nullable', 'string', 'max:120'],
            'notes'             => ['sometimes', 'nullable', 'string', 'max:2000'],

            'items'                  => ['sometimes', 'array', 'min:1'],
            'items.*.product_id'     => ['required_with:items', 'uuid', $this->tenantExists('products')],
            'items.*.quantity'       => ['required_with:items', 'numeric', 'min:0.001'],
            'items.*.note'           => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'purchase_order_id.exists'         => __('Le bon de commande sélectionné est invalide.'),
            'warehouse_id.exists'              => __('L\'entrepôt sélectionné est invalide.'),
            'items.*.product_id.required_with' => __('Le produit est obligatoire.'),
            'items.*.product_id.exists'        => __('Le produit sélectionné est invalide.'),
            'items.*.quantity.required_with'   => __('La quantité est obligatoire.'),
        ];
    }
}
