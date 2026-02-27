<?php

namespace App\Http\Requests\Purchases\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierPaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'supplier_id' => ['required', 'uuid', 'exists:suppliers,id'],
            'vendor_bill_id' => ['nullable', 'uuid', 'exists:vendor_bills,id'],
            'payment_method_id' => ['nullable', 'uuid', 'exists:supplier_payment_methods,id'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'paid_at' => ['required', 'date'],
            'status' => ['required', 'in:pending,succeeded,failed,cancelled'],
            'reference' => ['nullable', 'string', 'max:120'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
