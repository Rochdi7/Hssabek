<?php

namespace App\Http\Controllers\Backoffice\Pro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pro\Store\StoreBranchRequest;
use App\Http\Requests\Pro\Update\UpdateBranchRequest;
use App\Models\Pro\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Branch::class);

        $branches = Branch::query()
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                    ->orWhere('code', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%");
            }))
            ->orderBy('name')
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.pro.branches.index', compact('branches'));
    }

    public function create()
    {
        $this->authorize('create', Branch::class);

        return view('backoffice.pro.branches.create');
    }

    public function store(StoreBranchRequest $request)
    {
        $this->authorize('create', Branch::class);

        Branch::create($request->validated());

        return redirect()->route('bo.pro.branches.index')
            ->with('success', 'Succursale créée avec succès.');
    }

    public function edit(Branch $branch)
    {
        $this->authorize('update', $branch);

        return view('backoffice.pro.branches.edit', compact('branch'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $this->authorize('update', $branch);

        $branch->update($request->validated());

        return redirect()->route('bo.pro.branches.index')
            ->with('success', 'Succursale mise à jour avec succès.');
    }

    public function destroy(Branch $branch)
    {
        $this->authorize('delete', $branch);

        $branch->delete();

        return redirect()->route('bo.pro.branches.index')
            ->with('success', 'Succursale supprimée avec succès.');
    }
}
