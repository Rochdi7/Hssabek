<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreTaxCategoryRequest;
use App\Http\Requests\Settings\UpdateTaxCategoryRequest;
use App\Http\Requests\Settings\StoreTaxGroupRequest;
use App\Http\Requests\Settings\UpdateTaxGroupRequest;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\TaxGroup;
use App\Models\Catalog\TaxGroupRate;

class TaxRateSettingsController extends Controller
{
    public function index()
    {
        $taxCategories = TaxCategory::latest()->get();
        $taxGroups = TaxGroup::with('rates')->latest()->get();

        return view('backoffice.settings.tax-rates', compact('taxCategories', 'taxGroups'));
    }

    public function storeTaxCategory(StoreTaxCategoryRequest $request)
    {
        TaxCategory::create($request->validated());

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Taux de taxe ajouté avec succès.');
    }

    public function updateTaxCategory(UpdateTaxCategoryRequest $request, TaxCategory $taxCategory)
    {
        $taxCategory->update($request->validated());

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Taux de taxe mis à jour avec succès.');
    }

    public function toggleTaxCategory(TaxCategory $taxCategory)
    {
        $taxCategory->update(['is_active' => !$taxCategory->is_active]);

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Statut du taux de taxe mis à jour.');
    }

    public function destroyTaxCategory(TaxCategory $taxCategory)
    {
        $taxCategory->delete();

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Taux de taxe supprimé avec succès.');
    }

    public function storeTaxGroup(StoreTaxGroupRequest $request)
    {
        $group = TaxGroup::create([
            'name' => $request->name,
            'is_active' => true,
        ]);

        if ($request->has('rates')) {
            foreach ($request->rates as $index => $rate) {
                TaxGroupRate::create([
                    'tax_group_id' => $group->id,
                    'name' => $rate['name'],
                    'rate' => $rate['rate'],
                    'position' => $index + 1,
                ]);
            }
        }

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Groupe de taxes ajouté avec succès.');
    }

    public function updateTaxGroup(UpdateTaxGroupRequest $request, TaxGroup $taxGroup)
    {
        $taxGroup->update(['name' => $request->name]);

        $taxGroup->rates()->delete();
        if ($request->has('rates')) {
            foreach ($request->rates as $index => $rate) {
                TaxGroupRate::create([
                    'tax_group_id' => $taxGroup->id,
                    'name' => $rate['name'],
                    'rate' => $rate['rate'],
                    'position' => $index + 1,
                ]);
            }
        }

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Groupe de taxes mis à jour avec succès.');
    }

    public function toggleTaxGroup(TaxGroup $taxGroup)
    {
        $taxGroup->update(['is_active' => !$taxGroup->is_active]);

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Statut du groupe de taxes mis à jour.');
    }

    public function destroyTaxGroup(TaxGroup $taxGroup)
    {
        $taxGroup->rates()->delete();
        $taxGroup->delete();

        return redirect()->route('bo.settings.tax-rates.index')
            ->with('success', 'Groupe de taxes supprimé avec succès.');
    }
}
