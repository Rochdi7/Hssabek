<?php

namespace App\Http\Controllers\Backoffice\Finance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\Store\StoreFinanceCategoryRequest;
use App\Http\Requests\Finance\Update\UpdateFinanceCategoryRequest;
use App\Models\Finance\FinanceCategory;
use Illuminate\Http\Request;

class FinanceCategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', FinanceCategory::class);

        $categories = FinanceCategory::query()
            ->when($request->search, fn ($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->when($request->type, fn ($q, $t) => $q->where('type', $t))
            ->orderBy('type')->orderBy('name')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.finance.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', FinanceCategory::class);

        return view('backoffice.finance.categories.create');
    }

    public function store(StoreFinanceCategoryRequest $request)
    {
        $this->authorize('create', FinanceCategory::class);

        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active', true);

        FinanceCategory::create($data);

        return redirect()->route('bo.finance.categories.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    public function edit(FinanceCategory $financeCategory)
    {
        $this->authorize('update', $financeCategory);

        return view('backoffice.finance.categories.edit', compact('financeCategory'));
    }

    public function update(UpdateFinanceCategoryRequest $request, FinanceCategory $financeCategory)
    {
        $this->authorize('update', $financeCategory);

        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active', true);

        $financeCategory->update($data);

        return redirect()->route('bo.finance.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(FinanceCategory $financeCategory)
    {
        $this->authorize('delete', $financeCategory);

        if ($financeCategory->expenses()->exists() || $financeCategory->incomes()->exists()) {
            return redirect()->route('bo.finance.categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie : elle est utilisée par des transactions.');
        }

        $financeCategory->delete();

        return redirect()->route('bo.finance.categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}
