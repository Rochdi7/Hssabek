<?php

namespace App\Http\Requests\Sales\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryChallanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['sometimes', 'uuid', 'exists:customers,id'],
            'quote_id' => ['sometimes', 'nullable', 'uuid', 'exists:quotes,id'],
            'invoice_id' => ['sometimes', 'nullable', 'uuid', 'exists:invoices,id'],
            'number' => ['sometimes', 'string', 'max:50'],
            'status' => ['sometimes', 'in:draft,issued,delivered,cancelled'],
            'issue_date' => ['sometimes', 'date'],
            'delivered_at' => ['sometimes', 'nullable', 'date'],
            'notes' => ['sometimes', 'nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
