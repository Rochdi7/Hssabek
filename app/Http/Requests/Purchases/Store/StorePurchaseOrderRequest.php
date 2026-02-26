<?php

namespace App\Http\Requests\Purchases\Store;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrderRequest extends FormRequest
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
        return [
            'supplier_id' => 'required|exists:suppliers,id',
            'po_number' => 'required|string|unique:purchase_orders',
            'po_date' => 'required|date',
            'expected_delivery_date' => 'required|date|after_or_equal:po_date',
            'status' => 'required|in:draft,pending,received,cancelled',
            'notes' => 'nullable|string',
        ];
    }
}
