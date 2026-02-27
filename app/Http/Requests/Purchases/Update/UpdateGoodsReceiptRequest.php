<?php

namespace App\Http\Requests\Purchases\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGoodsReceiptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purchase_order_id' => ['sometimes', 'nullable', 'uuid', 'exists:purchase_orders,id'],
            'warehouse_id' => ['sometimes', 'uuid', 'exists:warehouses,id'],
            'number' => ['sometimes', 'string', 'max:50'],
            'status' => ['sometimes', 'in:draft,received,cancelled'],
            'received_at' => ['sometimes', 'nullable', 'date'],
            'notes' => ['sometimes', 'nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
