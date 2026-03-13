<?php

namespace App\Http\Requests\Inventory\Update;

use App\Http\Requests\TenantFormRequest;

class UpdateStockMovementRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id'    => ['sometimes', 'uuid', $this->tenantExists('products')],
            'warehouse_id'  => ['sometimes', 'uuid', $this->tenantExists('warehouses')],
            'movement_type' => ['sometimes', 'in:stock_in,stock_out,adjustment_in,adjustment_out'],
            'quantity'      => ['sometimes', 'numeric', 'min:0.001'],
            'note'          => ['nullable', 'string', 'max:1000'],
            'moved_at'      => ['sometimes', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.exists'      => __('Le produit sélectionné est invalide.'),
            'warehouse_id.exists'    => __('L\'entrepôt sélectionné est invalide.'),
            'movement_type.in'       => __('Le type de mouvement est invalide.'),
            'quantity.numeric'       => __('La quantité doit être un nombre.'),
            'quantity.min'           => __('La quantité doit être supérieure à zéro.'),
            'note.max'               => __('La note ne doit pas dépasser 1000 caractères.'),
            'moved_at.date'          => __('La date du mouvement n\'est pas valide.'),
        ];
    }
}
