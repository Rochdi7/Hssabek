<?php

namespace App\Http\Controllers\Backoffice\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Store\StoreUnitRequest;
use App\Http\Requests\Catalog\Update\UpdateUnitRequest;
use App\Models\Catalog\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Unit::class);

        $units = Unit::withCount('products')
            ->latest()
            ->paginate(request()->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.catalog.units.index', compact('units'));
    }

    public function store(StoreUnitRequest $request)
    {
        $this->authorize('create', Unit::class);

        Unit::create($request->validated());

        return redirect()->back()->with('success', __('Unité ajoutée avec succès.'));
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $this->authorize('update', $unit);

        $unit->update($request->validated());

        return redirect()->back()->with('success', __('Unité mise à jour avec succès.'));
    }

    public function destroy(Unit $unit)
    {
        $this->authorize('delete', $unit);

        abort_if(
            $unit->products()->exists(),
            422,
            'Impossible de supprimer une unité utilisée par des produits.'
        );

        $unit->delete();

        return redirect()->back()->with('success', __('Unité supprimée avec succès.'));
    }
}
