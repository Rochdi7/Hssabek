<?php

namespace App\Http\Requests\Purchases\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDebitNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id' => ['sometimes', 'uuid', 'exists:suppliers,id'],
            'purchase_order_id' => ['sometimes', 'nullable', 'uuid', 'exists:purchase_orders,id'],
            'vendor_bill_id' => ['sometimes', 'nullable', 'uuid', 'exists:vendor_bills,id'],
            'number' => ['sometimes', 'string', 'max:50'],
            'status' => ['sometimes', 'in:draft,issued,applied,cancelled'],
            'issue_date' => ['sometimes', 'date'],
            'due_date' => ['sometimes', 'nullable', 'date', 'after_or_equal:issue_date'],
            'currency' => ['sometimes', 'string', 'size:3', 'exists:currencies,code'],
            'subtotal' => ['sometimes', 'numeric', 'min:0'],
            'tax_total' => ['sometimes', 'numeric', 'min:0'],
            'total' => ['sometimes', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
