<?php

namespace App\Http\Requests\Traits;

use App\Models\Catalog\TaxCategory;

/**
 * Resolves tax selection from form inputs where tax_group_id can be
 * either a real TaxGroup UUID or a "cat_<uuid>" TaxCategory reference.
 */
trait ResolveTaxSelection
{
    protected function resolveTaxItems(): void
    {
        $items = $this->input('items', []);

        foreach ($items as $index => $item) {
            $taxGroupId = $item['tax_group_id'] ?? null;

            if ($taxGroupId && str_starts_with($taxGroupId, 'cat_')) {
                $categoryId = substr($taxGroupId, 4);
                $category = TaxCategory::find($categoryId);

                $items[$index]['tax_rate'] = $category ? (float) $category->rate : 0;
                $items[$index]['tax_group_id'] = null;
            }
        }

        $this->merge(['items' => $items]);
    }

    protected function prepareForValidation(): void
    {
        $this->resolveTaxItems();
    }
}
