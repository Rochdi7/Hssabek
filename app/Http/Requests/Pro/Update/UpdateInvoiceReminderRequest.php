<?php

namespace App\Http\Requests\Pro\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceReminderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'invoice_id' => ['sometimes', 'uuid', 'exists:invoices,id'],
            'type' => ['sometimes', 'in:before_due,on_due,after_due'],
            'channel' => ['sometimes', 'in:email,sms,whatsapp'],
            'status' => ['sometimes', 'in:scheduled,sent,failed,cancelled'],
            'scheduled_at' => ['sometimes', 'date'],
            'sent_at' => ['sometimes', 'nullable', 'date'],
            'meta' => ['sometimes', 'nullable', 'array'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
