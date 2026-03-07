<?php

namespace App\Http\Requests\Finance\Store;

use App\Http\Requests\BaseFormRequest;

class StoreLoanRequest extends BaseFormRequest
{
    protected function baseRules(): array
    {
        return [
            'lender_type'       => 'required|in:bank,personal,other',
            'lender_name'       => 'required|string|max:255',
            'reference_number'  => 'nullable|string|max:100',
            'principal_amount'  => 'required|numeric|min:0.01',
            'interest_rate'     => 'nullable|numeric|min:0|max:100',
            'interest_type'     => 'required|in:fixed,reducing',
            'total_amount'      => 'required|numeric|min:0.01',
            'remaining_balance' => 'required|numeric|min:0',
            'start_date'        => 'required|date',
            'end_date'          => 'nullable|date|after_or_equal:start_date',
            'payment_frequency' => 'required|in:monthly,quarterly,yearly',
            'status'            => 'sometimes|in:active,closed,defaulted',
            'notes'             => 'nullable|string|max:2000',
        ];
    }

    protected function baseMessages(): array
    {
        return [
            'lender_type.required'       => 'Le type de prêteur est obligatoire.',
            'lender_type.in'             => 'Le type de prêteur est invalide.',
            'lender_name.required'       => 'Le nom du prêteur est obligatoire.',
            'principal_amount.required'  => 'Le montant principal est obligatoire.',
            'principal_amount.min'       => 'Le montant principal doit être supérieur à zéro.',
            'interest_rate.max'          => 'Le taux d\'intérêt ne peut pas dépasser 100%.',
            'interest_type.required'     => 'Le type d\'intérêt est obligatoire.',
            'total_amount.required'      => 'Le montant total est obligatoire.',
            'remaining_balance.required' => 'Le solde restant est obligatoire.',
            'start_date.required'        => 'La date de début est obligatoire.',
            'end_date.after_or_equal'    => 'La date de fin doit être postérieure ou égale à la date de début.',
            'payment_frequency.required' => 'La fréquence de paiement est obligatoire.',
            'payment_frequency.in'       => 'La fréquence de paiement est invalide.',
            'status.required'            => 'Le statut est obligatoire.',
        ];
    }
}
