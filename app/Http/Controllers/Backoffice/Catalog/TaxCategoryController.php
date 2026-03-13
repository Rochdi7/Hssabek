<?php

namespace App\Http\Controllers\Backoffice\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Store\StoreTaxCategoryRequest;
use App\Http\Requests\Catalog\Update\UpdateTaxCategoryRequest;
use App\Models\Catalog\TaxCategory;

class TaxCategoryController extends Controller
{
    public function store(StoreTaxCategoryRequest $request)
    {
        $this->authorize('create', TaxCategory::class);

        TaxCategory::create($request->validated());

        return redirect()->back()->with('success', __('Taux de taxe ajouté avec succès.'));
    }

    public function update(UpdateTaxCategoryRequest $request, TaxCategory $taxCategory)
    {
        $this->authorize('update', $taxCategory);

        $taxCategory->update($request->validated());

        return redirect()->back()->with('success', __('Taux de taxe mis à jour avec succès.'));
    }

    public function destroy(TaxCategory $taxCategory)
    {
        $this->authorize('delete', $taxCategory);

        abort_if(
            $taxCategory->products()->exists(),
            422,
            'Impossible de supprimer une taxe utilisée par des produits.'
        );

        $taxCategory->delete();

        return redirect()->back()->with('success', __('Taux de taxe supprimé avec succès.'));
    }
}
