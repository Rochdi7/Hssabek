<?php

namespace App\Http\Requests\Traits;

use Illuminate\Validation\Validator;

trait ValidatesMeasurementItems
{
    protected function validateMeasurementItems(Validator $validator): void
    {
        foreach ($this->input('items', []) as $index => $item) {
            $mode = $item['calculation_mode'] ?? 'quantity';

            if ($mode === 'surface') {
                if (!$this->isPositiveNumber($item['length'] ?? null)) {
                    $validator->errors()->add("items.{$index}.length", __('La longueur est obligatoire pour un article en surface.'));
                }

                if (!$this->isPositiveNumber($item['height'] ?? null)) {
                    $validator->errors()->add("items.{$index}.height", __('La hauteur est obligatoire pour un article en surface.'));
                }
            }

            if ($mode === 'volume') {
                if (!$this->isPositiveNumber($item['length'] ?? null)) {
                    $validator->errors()->add("items.{$index}.length", __('La longueur est obligatoire pour un article en volume.'));
                }

                if (!$this->isPositiveNumber($item['height'] ?? null)) {
                    $validator->errors()->add("items.{$index}.height", __('La hauteur est obligatoire pour un article en volume.'));
                }

                if (!$this->isPositiveNumber($item['width'] ?? null)) {
                    $validator->errors()->add("items.{$index}.width", __('La profondeur est obligatoire pour un article en volume.'));
                }
            }
        }
    }

    protected function isPositiveNumber(mixed $value): bool
    {
        return is_numeric($value) && (float) $value > 0;
    }
}
