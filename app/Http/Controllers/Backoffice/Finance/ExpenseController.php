<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreExpensePaymentRequest;
use App\Http\Requests\Finance\Store\StoreExpenseRequest;
use App\Http\Requests\Finance\Update\UpdateExpenseRequest;
use App\Models\Finance\BankAccount;
use App\Models\Finance\Expense;
use App\Models\Finance\FinanceCategory;
use App\Models\Purchases\Supplier;
use App\Services\Finance\ExpenseService;
use App\Services\Reports\ReportService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct(
        private readonly ExpenseService $expenseService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Expense::class);

        $expenses = Expense::query()
            ->with(['category', 'bankAccount', 'supplier'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('expense_number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%")
                    ->orWhere('description', 'like', "%{$s}%");
            }))
            ->when($request->category_id, fn($q, $c) => $q->where('category_id', $c))
            ->when($request->payment_status, fn($q, $s) => $q->where('payment_status', $s))
            ->latest('expense_date')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        $categories = FinanceCategory::where('type', 'expense')->orderBy('name')->get();

        return view('backoffice.finance.expenses.index', compact('expenses', 'categories'));
    }

    public function create()
    {
        $this->authorize('create', Expense::class);

        $categories = FinanceCategory::where('type', 'expense')->where('is_active', true)->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $suppliers = Supplier::orderBy('name')->get();
        $nextReference = app(DocumentNumberService::class)->preview('expense_ref');

        return view('backoffice.finance.expenses.create', compact('categories', 'bankAccounts', 'suppliers', 'nextReference'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $this->authorize('create', Expense::class);

        $this->expenseService->create($request->validated());

        ReportService::flushTenantCache();

        return redirect()->route('bo.finance.expenses.index')
            ->with('success', 'Dépense enregistrée avec succès.');
    }

    public function show(Expense $expense)
    {
        $this->authorize('view', $expense);

        $expense->load(['category', 'bankAccount', 'supplier', 'payments.bankAccount']);
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        return view('backoffice.finance.expenses.show', compact('expense', 'bankAccounts'));
    }

    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);

        $categories = FinanceCategory::where('type', 'expense')->where('is_active', true)->orderBy('name')->get();
        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();
        $suppliers = Supplier::orderBy('name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('expense_ref');

        return view('backoffice.finance.expenses.edit', compact('expense', 'categories', 'bankAccounts', 'suppliers', 'nextReference'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $this->authorize('update', $expense);

        $this->expenseService->update($expense, $request->validated());

        ReportService::flushTenantCache();

        return redirect()->route('bo.finance.expenses.index')
            ->with('success', 'Dépense mise à jour avec succès.');
    }

    public function addPayment(StoreExpensePaymentRequest $request, Expense $expense)
    {
        $this->authorize('update', $expense);

        if ($expense->remaining_amount <= 0) {
            return redirect()->route('bo.finance.expenses.show', $expense)
                ->with('error', 'Cette dépense est déjà entièrement payée.');
        }

        try {
            $this->expenseService->addPayment($expense, $request->validated());
            ReportService::flushTenantCache();

            return redirect()->route('bo.finance.expenses.show', $expense)
                ->with('success', 'Paiement enregistré avec succès.');
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('bo.finance.expenses.show', $expense)
                ->with('error', $e->getMessage());
        }
    }

    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $this->expenseService->delete($expense);

        ReportService::flushTenantCache();

        return redirect()->route('bo.finance.expenses.index')
            ->with('success', 'Dépense supprimée avec succès.');
    }
}
