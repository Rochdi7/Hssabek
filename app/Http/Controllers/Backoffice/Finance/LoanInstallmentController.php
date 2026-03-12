<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Loan;
use App\Models\Finance\LoanInstallment;
use App\Services\Finance\LoanService;
use Illuminate\Http\Request;

class LoanInstallmentController extends Controller
{
    public function __construct(
        private readonly LoanService $loanService,
    ) {}

    public function index(Loan $loan)
    {
        $this->authorize('view', $loan);

        $loan->load(['installments' => fn($q) => $q->orderBy('installment_number')]);

        return view('backoffice.finance.loans.installments.index', compact('loan'));
    }

    public function pay(Request $request, Loan $loan, LoanInstallment $installment)
    {
        $this->authorize('update', $loan);

        // Ensure installment belongs to loan
        if ($installment->loan_id !== $loan->id) {
            abort(404);
        }

        if ($installment->status === 'paid') {
            return redirect()->back()->with('error', 'Cette échéance est déjà entièrement payée.');
        }

        $validated = $request->validate([
            'amount'       => ['required', 'numeric', 'min:0.01', 'max:' . $installment->remaining_amount],
            'payment_date' => ['required', 'date'],
            'notes'        => ['nullable', 'string', 'max:1000'],
        ], [
            'amount.required'       => 'Le montant est obligatoire.',
            'amount.numeric'        => 'Le montant doit être un nombre.',
            'amount.min'            => 'Le montant doit être supérieur à 0.',
            'amount.max'            => 'Le montant ne peut pas dépasser le solde restant (:max).',
            'payment_date.required' => 'La date de paiement est obligatoire.',
            'payment_date.date'     => 'La date de paiement doit être une date valide.',
        ]);

        $this->loanService->payInstallment($installment, $validated);

        return redirect()->route('bo.finance.loans.installments.index', $loan)
            ->with('success', 'Paiement de l\'échéance enregistré avec succès.');
    }

    public function generate(Loan $loan)
    {
        $this->authorize('update', $loan);

        $this->loanService->generateInstallmentSchedule($loan);

        return redirect()->route('bo.finance.loans.installments.index', $loan)
            ->with('success', 'Échéancier généré avec succès.');
    }
}
