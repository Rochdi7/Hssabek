<?php

namespace App\Http\Requests\Billing\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionInvoiceRequest extends FormRequest
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
            'subscription_id' => 'required|exists:subscriptions,id',
            'invoice_number' => 'required|string|unique:subscription_invoices',
            'amount' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'status' => 'required|in:draft,sent,paid,overdue,cancelled',
        ];
    }

    public function messages(): array
    {
        return [
            'subscription_id.required'  => __('L\'abonnement est obligatoire.'),
            'subscription_id.exists'    => __('L\'abonnement sélectionné est invalide.'),
            'invoice_number.required'   => __('Le numéro de facture est obligatoire.'),
            'invoice_number.unique'     => __('Ce numéro de facture existe déjà.'),
            'amount.required'           => __('Le montant est obligatoire.'),
            'invoice_date.required'     => __('La date de facture est obligatoire.'),
            'due_date.required'         => __('La date d\'échéance est obligatoire.'),
            'due_date.after_or_equal'   => __('La date d\'échéance doit être postérieure ou égale à la date de facture.'),
            'status.required'           => __('Le statut est obligatoire.'),
            'status.in'                 => __('Le statut est invalide.'),
        ];
    }
}
