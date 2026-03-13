<?php

namespace App\Http\Requests\Billing\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionInvoiceRequest extends FormRequest
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
            'amount' => 'sometimes|required|numeric|min:0',
            'due_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|in:draft,sent,paid,overdue,cancelled',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.numeric' => __('Le montant doit être un nombre.'),
            'due_date.date'  => __('La date d\'échéance n\'est pas valide.'),
            'status.in'      => __('Le statut est invalide.'),
        ];
    }
}
