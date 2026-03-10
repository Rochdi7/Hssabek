<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreLoanRequest;
use App\Http\Requests\Finance\Update\UpdateLoanRequest;
use App\Models\Finance\Loan;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Loan::class);

        $loans = Loan::query()
            ->with(['installments'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('lender_name', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%");
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->when($request->lender_type, fn($q, $t) => $q->where('lender_type', $t))
            ->latest('start_date')
            ->paginate(15)
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

        Loan::create($data);

        return redirect()->route('bo.finance.loans.index')
            ->with('success', 'Prêt enregistré avec succès.');
    }

    public function show(Loan $loan)
    {
        $this->authorize('view', $loan);

        $loan->load(['installments' => fn($q) => $q->orderBy('due_date'), 'createdBy']);

        return view('backoffice.finance.loans.show', compact('loan'));
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

        $loan->update($request->validated());

        return redirect()->route('bo.finance.loans.index')
            ->with('success', 'Prêt mis à jour avec succès.');
    }

    public function destroy(Loan $loan)
    {
        $this->authorize('delete', $loan);

        if ($loan->installments()->where('status', 'paid')->exists()) {
            return redirect()->route('bo.finance.loans.index')
                ->with('error', 'Impossible de supprimer ce prêt : il contient des échéances payées.');
        }

        $loan->installments()->delete();
        $loan->delete();

        return redirect()->route('bo.finance.loans.index')
            ->with('success', 'Prêt supprimé avec succès.');
    }
}
