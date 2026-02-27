<?php

namespace App\Http\Requests\Sales\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryChallanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'uuid', 'exists:customers,id'],
            'quote_id' => ['nullable', 'uuid', 'exists:quotes,id'],
            'invoice_id' => ['nullable', 'uuid', 'exists:invoices,id'],
            'number' => ['required', 'string', 'max:50'],
            'status' => ['required', 'in:draft,issued,delivered,cancelled'],
            'issue_date' => ['required', 'date'],
            'delivered_at' => ['nullable', 'date'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
