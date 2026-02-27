<?php

namespace App\Http\Requests\Pro\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceReminderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'invoice_id' => ['required', 'uuid', 'exists:invoices,id'],
            'type' => ['required', 'in:before_due,on_due,after_due'],
            'channel' => ['required', 'in:email,sms,whatsapp'],
            'status' => ['required', 'in:scheduled,sent,failed,cancelled'],
            'scheduled_at' => ['required', 'date'],
            'sent_at' => ['nullable', 'date'],
            'meta' => ['nullable', 'array'],
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
