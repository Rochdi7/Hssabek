<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreIncomeRequest;
use App\Http\Requests\Finance\Update\UpdateIncomeRequest;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Finance\FinanceCategory;
use App\Models\Finance\Income;
use App\Services\Finance\IncomeService;
use App\Services\Reports\ReportService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function __construct(
        private readonly IncomeService $incomeService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Income::class);

        $incomes = Income::query()
            ->with(['category', 'bankAccount', 'customer'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('income_number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%")
                    ->orWhere('description', 'like', "%{$s}%");
            }))
            ->when($request->category_id, fn($q, $c) => $q->where('category_id', $c))
            ->latest('income_date')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        $categories = FinanceCategory::where('type', 'income')->orderBy('name')->get();

        return view('backoffice.finance.incomes.index', compact('incomes', 'categories'));
    }

    public function create()
    {
        $this->authorize('create', Income::class);

        $categories = FinanceCategory::where('type', 'income')->where('is_active', true)->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $customers = Customer::orderBy('name')->get();
        $nextReference = app(DocumentNumberService::class)->preview('income_ref');

        return view('backoffice.finance.incomes.create', compact('categories', 'bankAccounts', 'customers', 'nextReference'));
    }

    public function store(StoreIncomeRequest $request)
    {
        $this->authorize('create', Income::class);

        $this->incomeService->create($request->validated());

        ReportService::flushTenantCache();

        return redirect()->route('bo.finance.incomes.index')
            ->with('success', 'Revenu enregistré avec succès.');
    }

    public function edit(Income $income)
    {
        $this->authorize('update', $income);

        $categories = FinanceCategory::where('type', 'income')->where('is_active', true)->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $customers = Customer::orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('income_ref');

        return view('backoffice.finance.incomes.edit', compact('income', 'categories', 'bankAccounts', 'customers', 'nextReference'));
    }

    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $this->authorize('update', $income);

        $this->incomeService->update($income, $request->validated());

        ReportService::flushTenantCache();

        return redirect()->route('bo.finance.incomes.index')
            ->with('success', 'Revenu mis à jour avec succès.');
    }

    public function destroy(Income $income)
    {
        $this->authorize('delete', $income);

        $this->incomeService->delete($income);

        ReportService::flushTenantCache();

        return redirect()->route('bo.finance.incomes.index')
            ->with('success', 'Revenu supprimé avec succès.');
    }
}
