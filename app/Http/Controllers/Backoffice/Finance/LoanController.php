<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreLoanPaymentRequest;
use App\Http\Requests\Finance\Store\StoreLoanRequest;
use App\Http\Requests\Finance\Update\UpdateLoanRequest;
use App\Models\Finance\BankAccount;
use App\Models\Finance\Loan;
use App\Models\Finance\LoanPayment;
use App\Services\Finance\LoanService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct(
        private readonly LoanService $loanService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Loan::class);

        $loans = Loan::query()
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('lender_name', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%");
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->when($request->loan_type, fn($q, $t) => $q->where('loan_type', $t))
            ->when($request->lender_type, fn($q, $t) => $q->where('lender_type', $t))
            ->latest('start_date')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.finance.loans.index', compact('loans'));
    }

    public function create()
    {
        $this->authorize('create', Loan::class);

        $nextReference = app(DocumentNumberService::class)->preview('loan_ref');

        return view('backoffice.finance.loans.create', compact('nextReference'));
    }

    public function store(StoreLoanRequest $request)
    {
        $this->authorize('create', Loan::class);

        $data = $request->validated();
        $data['created_by'] = auth()->id();

        $this->loanService->create($data);

        return redirect()->route('bo.finance.loans.index')
            ->with('success', __('Prêt enregistré avec succès.'));
    }

    public function show(Loan $loan)
    {
        $this->authorize('view', $loan);

        $loan->load(['payments.bankAccount', 'createdBy']);
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        return view('backoffice.finance.loans.show', compact('loan', 'bankAccounts'));
    }

    public function edit(Loan $loan)
    {
        $this->authorize('update', $loan);

        $nextReference = app(DocumentNumberService::class)->preview('loan_ref');

        return view('backoffice.finance.loans.edit', compact('loan', 'nextReference'));
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $this->authorize('update', $loan);

        $this->loanService->update($loan, $request->validated());

        return redirect()->route('bo.finance.loans.show', $loan)
            ->with('success', __('Prêt mis à jour avec succès.'));
    }

    public function addPayment(StoreLoanPaymentRequest $request, Loan $loan)
    {
        $this->authorize('update', $loan);

        if ($loan->remaining_amount <= 0) {
            return redirect()->route('bo.finance.loans.show', $loan)
                ->with('error', __('Ce prêt est déjà entièrement remboursé.'));
        }

        try {
            $this->loanService->addPayment($loan, $request->validated());

            return redirect()->route('bo.finance.loans.show', $loan)
                ->with('success', __('Paiement enregistré avec succès.'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('bo.finance.loans.show', $loan)
                ->with('error', $e->getMessage());
        }
    }

    public function deletePayment(Loan $loan, LoanPayment $payment)
    {
        $this->authorize('update', $loan);

        if ($payment->loan_id !== $loan->id) {
            abort(404);
        }

        $this->loanService->deletePayment($loan, $payment);

        return redirect()->route('bo.finance.loans.show', $loan)
            ->with('success', __('Paiement supprimé avec succès.'));
    }

    public function destroy(Loan $loan)
    {
        $this->authorize('delete', $loan);

        if ($loan->payments()->exists()) {
            return redirect()->route('bo.finance.loans.index')
                ->with('error', __('Impossible de supprimer ce prêt : il contient des paiements enregistrés.'));
        }

        $this->loanService->delete($loan);

        return redirect()->route('bo.finance.loans.index')
            ->with('success', __('Prêt supprimé avec succès.'));
    }
}
