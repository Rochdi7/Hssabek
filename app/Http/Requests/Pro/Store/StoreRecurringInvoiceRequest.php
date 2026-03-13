<?php

namespace App\Http\Requests\Pro\Store;

use App\Http\Requests\TenantFormRequest;

class StoreRecurringInvoiceRequest extends TenantFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id'          => ['required', 'uuid', $this->tenantExists('customers')],
            'template_invoice_id'  => ['nullable', 'uuid', $this->tenantExists('invoices')],
            'interval'             => ['required', 'in:week,month,year'],
            'every'                => ['sometimes', 'integer', 'min:1'],
            'next_run_at'          => ['required', 'date'],
            'end_at'               => ['nullable', 'date', 'after_or_equal:next_run_at'],
            'status'               => ['sometimes', 'in:active,paused,cancelled'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required'      => __('Le client est obligatoire.'),
            'customer_id.exists'        => __('Le client sélectionné est invalide.'),
            'template_invoice_id.exists' => __('La facture modèle sélectionnée est invalide.'),
            'interval.required'         => __('L\'intervalle de récurrence est obligatoire.'),
            'interval.in'               => __('L\'intervalle doit être : semaine, mois ou année.'),
            'next_run_at.required'      => __('La date de prochaine exécution est obligatoire.'),
            'end_at.after_or_equal'     => __('La date de fin doit être postérieure ou égale à la prochaine exécution.'),
        ];
    }
}
