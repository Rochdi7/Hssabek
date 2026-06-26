<?php

namespace App\Http\Requests\Purchases\Store;

use App\Http\Requests\TenantFormRequest;
use App\Models\Purchases\PurchaseOrderItem;
use Illuminate\Validation\Validator;

class StoreGoodsReceiptRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'number_mode'       => ['nullable', 'in:manuel,auto'],
            'number'            => ['required_if:number_mode,manuel', 'nullable', 'string', 'max:100'],
            'purchase_order_id' => ['nullable', 'uuid', $this->tenantExists('purchase_orders')],
            'warehouse_id'      => ['required', 'uuid', $this->tenantExists('warehouses')],
            'received_at'       => ['nullable', 'date'],
            'reference_number'  => ['nullable', 'string', 'max:120'],
            'notes'             => ['nullable', 'string', 'max:2000'],

            'items'                            => ['required', 'array', 'min:1'],
            'items.*.product_id'               => ['required', 'uuid', $this->tenantExists('products')],
            'items.*.quantity'                 => ['required', 'numeric', 'min:0.001'],
            'items.*.unit_cost'                => ['nullable', 'numeric', 'min:0'],
            'items.*.tax_rate'                 => ['nullable', 'numeric', 'min:0'],
            'items.*.purchase_order_item_id'   => ['nullable', 'uuid', $this->tenantExists('purchase_order_items')],
            'items.*.note'                     => ['nullable', 'string', 'max:500'],
        ];
    }

    /**
     * Block over-receiving: a line's quantity may never exceed the linked PO
     * item's remaining quantity (ordered − already received).
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            foreach ($this->input('items', []) as $i => $item) {
                $poItemId = $item['purchase_order_item_id'] ?? null;
                if (!$poItemId) {
                    continue;
                }

                $poItem = PurchaseOrderItem::find($poItemId);
                if (!$poItem) {
                    continue;
                }

                $remaining = (float) $poItem->quantity - (float) $poItem->received_quantity;
                $qty = (float) ($item['quantity'] ?? 0);

                if ($qty > $remaining + 0.0001) {
                    $validator->errors()->add(
                        "items.{$i}.quantity",
                        __('La quantité reçue (:qty) dépasse la quantité restante à recevoir (:remaining).', [
                            'qty'       => rtrim(rtrim(number_format($qty, 3, '.', ''), '0'), '.'),
                            'remaining' => rtrim(rtrim(number_format(max($remaining, 0), 3, '.', ''), '0'), '.'),
                        ])
                    );
                }
            }
        });
    }

    public function messages(): array
    {
        return [
            'purchase_order_id.exists'    => __('Le bon de commande sélectionné est invalide.'),
            'warehouse_id.required'       => __('L\'entrepôt est obligatoire.'),
            'warehouse_id.exists'         => __('L\'entrepôt sélectionné est invalide.'),
            'items.required'              => __('Au moins un article est obligatoire.'),
            'items.min'                   => __('Au moins un article est obligatoire.'),
            'items.*.product_id.required' => __('Le produit est obligatoire.'),
            'items.*.product_id.exists'   => __('Le produit sélectionné est invalide.'),
            'items.*.quantity.required'   => __('La quantité est obligatoire.'),
            'items.*.quantity.min'        => __('La quantité doit être supérieure à zéro.'),
        ];
    }
}
