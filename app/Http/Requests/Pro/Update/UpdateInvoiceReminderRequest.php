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
        return [
            'invoice_id.exists'  => __('La facture sélectionnée est invalide.'),
            'type.in'            => __('Le type de rappel est invalide.'),
            'channel.in'         => __('Le canal de notification est invalide.'),
            'status.in'          => __('Le statut est invalide.'),
            'scheduled_at.date'  => __('La date de planification n\'est pas valide.'),
        ];
    }
}
