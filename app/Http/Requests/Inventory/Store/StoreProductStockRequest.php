<?php

namespace App\Http\Requests\Inventory\Store;

use App\Http\Requests\TenantFormRequest;

class StoreProductStockRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id'       => ['required', 'uuid', $this->tenantExists('products')],
            'warehouse_id'     => ['required', 'uuid', $this->tenantExists('warehouses')],
            'quantity'         => ['required', 'numeric', 'min:0'],
            'reorder_level'    => ['nullable', 'numeric', 'min:0'],
            'reorder_quantity' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required'    => __('Le produit est obligatoire.'),
            'product_id.exists'      => __('Le produit sélectionné est invalide.'),
            'warehouse_id.required'  => __('L\'entrepôt est obligatoire.'),
            'warehouse_id.exists'    => __('L\'entrepôt sélectionné est invalide.'),
            'quantity.required'      => __('La quantité est obligatoire.'),
            'quantity.numeric'       => __('La quantité doit être un nombre.'),
            'quantity.min'           => __('La quantité ne peut pas être négative.'),
        ];
    }
}
