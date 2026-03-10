<?php

namespace App\Http\Controllers\Backoffice\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Store\StoreTaxGroupRequest;
use App\Http\Requests\Catalog\Update\UpdateTaxGroupRequest;
use App\Models\Catalog\TaxCategory;
use App\Models\Catalog\TaxGroup;
use App\Models\Catalog\TaxGroupRate;
use Illuminate\Support\Facades\DB;

class TaxGroupController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', TaxGroup::class);

        $taxCategories = TaxCategory::latest()->paginate(request()->input('per_page', 15), ['*'], 'tax_page')->withQueryString();
        $taxGroups = TaxGroup::with('rates')->latest()->paginate(request()->input('per_page', 15), ['*'], 'group_page')->withQueryString();

        return view('backoffice.catalog.tax-rates.index', compact('taxCategories', 'taxGroups'));
    }

    public function store(StoreTaxGroupRequest $request)
    {
        $this->authorize('create', TaxGroup::class);

        DB::transaction(function () use ($request) {
            $data = $request->validated();
            $rates = $data['rates'] ?? [];
            unset($data['rates']);

            $group = TaxGroup::create($data);

            foreach ($rates as $index => $rate) {
                $group->rates()->create([
                    'name'     => $rate['name'],
                    'rate'     => $rate['rate'],
                    'position' => $rate['position'] ?? $index + 1,
                ]);
            }
        });

        return redirect()->back()->with('success', 'Groupe de taxes ajouté avec succès.');
    }

    public function update(UpdateTaxGroupRequest $request, TaxGroup $taxGroup)
    {
        $this->authorize('update', $taxGroup);

        DB::transaction(function () use ($request, $taxGroup) {
            $data = $request->validated();
            $rates = $data['rates'] ?? [];
            unset($data['rates']);

            $taxGroup->update($data);

            if ($request->has('rates')) {
                $taxGroup->rates()->delete();
                foreach ($rates as $index => $rate) {
                    $taxGroup->rates()->create([
                        'name'     => $rate['name'],
                        'rate'     => $rate['rate'],
                        'position' => $rate['position'] ?? $index + 1,
                    ]);
                }
            }
        });

        return redirect()->back()->with('success', 'Groupe de taxes mis à jour avec succès.');
    }

    public function destroy(TaxGroup $taxGroup)
    {
        $this->authorize('delete', $taxGroup);

        $taxGroup->rates()->delete();
        $taxGroup->delete();

        return redirect()->back()->with('success', 'Groupe de taxes supprimé avec succès.');
    }
}
