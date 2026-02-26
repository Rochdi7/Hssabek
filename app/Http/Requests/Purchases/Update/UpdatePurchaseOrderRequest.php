<?php

namespace App\Http\Requests\Purchases\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $poId = $this->route('purchaseOrder');
        return [
            'supplier_id' => 'sometimes|required|exists:suppliers,id',
            'po_number' => "sometimes|required|string|unique:purchase_orders,po_number,{$poId}",
            'po_date' => 'sometimes|required|date',
            'expected_delivery_date' => 'sometimes|required|date|after_or_equal:po_date',
            'status' => 'sometimes|required|in:draft,pending,received,cancelled',
            'notes' => 'nullable|string',
        ];
    }
}
