<?php

namespace App\Http\Requests\Purchases\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreDebitNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id' => ['required', 'uuid', 'exists:suppliers,id'],
            'purchase_order_id' => ['nullable', 'uuid', 'exists:purchase_orders,id'],
            'vendor_bill_id' => ['nullable', 'uuid', 'exists:vendor_bills,id'],
            'number' => ['required', 'string', 'max:50'],
            'status' => ['required', 'in:draft,issued,applied,cancelled'],
            'issue_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'currency' => ['required', 'string', 'size:3', 'exists:currencies,code'],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'tax_total' => ['required', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
