<?php

namespace App\Http\Requests\Purchases\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierPaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id' => ['sometimes', 'uuid', 'exists:suppliers,id'],
            'vendor_bill_id' => ['sometimes', 'nullable', 'uuid', 'exists:vendor_bills,id'],
            'payment_method_id' => ['sometimes', 'nullable', 'uuid', 'exists:supplier_payment_methods,id'],
            'amount' => ['sometimes', 'numeric', 'gt:0'],
            'paid_at' => ['sometimes', 'date'],
            'status' => ['sometimes', 'in:pending,succeeded,failed,cancelled'],
            'reference' => ['sometimes', 'nullable', 'string', 'max:120'],
            'notes' => ['sometimes', 'nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
