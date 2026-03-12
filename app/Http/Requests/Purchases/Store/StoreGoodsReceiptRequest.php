<?php

namespace App\Http\Requests\Purchases\Store;

use App\Http\Requests\TenantFormRequest;

class StoreGoodsReceiptRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purchase_order_id' => ['nullable', 'uuid', $this->tenantExists('purchase_orders')],
            'warehouse_id'      => ['required', 'uuid', $this->tenantExists('warehouses')],
            'received_at'       => ['nullable', 'date'],
            'reference_number'  => ['nullable', 'string', 'max:120'],
            'notes'             => ['nullable', 'string', 'max:2000'],

            'items'                  => ['required', 'array', 'min:1'],
            'items.*.product_id'     => ['required', 'uuid', $this->tenantExists('products')],
            'items.*.quantity'       => ['required', 'numeric', 'min:0.001'],
            'items.*.note'           => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'purchase_order_id.exists'    => 'Le bon de commande sélectionné est invalide.',
            'warehouse_id.required'       => 'L\'entrepôt est obligatoire.',
            'warehouse_id.exists'         => 'L\'entrepôt sélectionné est invalide.',
            'items.required'              => 'Au moins un article est obligatoire.',
            'items.min'                   => 'Au moins un article est obligatoire.',
            'items.*.product_id.required' => 'Le produit est obligatoire.',
            'items.*.product_id.exists'   => 'Le produit sélectionné est invalide.',
            'items.*.quantity.required'   => 'La quantité est obligatoire.',
            'items.*.quantity.min'        => 'La quantité doit être supérieure à zéro.',
        ];
    }
}
