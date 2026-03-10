<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreBankAccountRequest;
use App\Http\Requests\Finance\Update\UpdateBankAccountRequest;
use App\Models\Finance\BankAccount;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', BankAccount::class);

        $accounts = BankAccount::query()
            ->when($request->search, fn ($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('account_holder_name', 'like', "%{$s}%")
                  ->orWhere('account_number', 'like', "%{$s}%")
                  ->orWhere('bank_name', 'like', "%{$s}%");
            }))
            ->when($request->status === 'active', fn ($q) => $q->where('is_active', true))
            ->when($request->status === 'inactive', fn ($q) => $q->where('is_active', false))
            ->orderBy('bank_name')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.finance.bank-accounts.index', compact('accounts'));
    }

    public function create()
    {
        $this->authorize('create', BankAccount::class);

        return view('backoffice.finance.bank-accounts.create');
    }

    public function store(StoreBankAccountRequest $request)
    {
        $this->authorize('create', BankAccount::class);

        $data = $request->validated();
        $data['currency'] = TenantContext::get()?->default_currency ?? 'MAD';
        $data['is_active'] = $request->boolean('is_active', true);
        $data['current_balance'] = $data['opening_balance'];

        BankAccount::create($data);

        return redirect()->route('bo.finance.bank-accounts.index')
            ->with('success', 'Compte bancaire créé avec succès.');
    }

    public function show(BankAccount $bankAccount)
    {
        $this->authorize('view', $bankAccount);

        $bankAccount->load(['expenses' => fn ($q) => $q->latest('expense_date')->limit(10),
            'incomes' => fn ($q) => $q->latest('income_date')->limit(10)]);

        return view('backoffice.finance.bank-accounts.show', compact('bankAccount'));
    }

    public function edit(BankAccount $bankAccount)
    {
        $this->authorize('update', $bankAccount);

        return view('backoffice.finance.bank-accounts.edit', compact('bankAccount'));
    }

    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        $this->authorize('update', $bankAccount);

        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active', true);

        $bankAccount->update($data);

        return redirect()->route('bo.finance.bank-accounts.index')
            ->with('success', 'Compte bancaire mis à jour avec succès.');
    }

    public function destroy(BankAccount $bankAccount)
    {
        $this->authorize('delete', $bankAccount);

        if ($bankAccount->expenses()->exists() || $bankAccount->incomes()->exists()) {
            return redirect()->route('bo.finance.bank-accounts.index')
                ->with('error', 'Impossible de supprimer ce compte : il contient des transactions.');
        }

        $bankAccount->delete();

        return redirect()->route('bo.finance.bank-accounts.index')
            ->with('success', 'Compte bancaire supprimé avec succès.');
    }
}
