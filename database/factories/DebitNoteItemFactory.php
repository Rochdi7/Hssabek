<?php

namespace Database\Factories;

use App\Models\Purchases\DebitNoteItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebitNoteItemFactory extends Factory
{
    protected $model = DebitNoteItem::class;

    public function definition(): array
    {
        $quantity = fake()->randomFloat(3, 1, 5);
        $unitCost = fake()->randomFloat(2, 50, 500);
        $taxRate = 20.0000;
        $lineTotal = round($quantity * $unitCost * (1 + $taxRate / 100), 2);

        return [
            'debit_note_id' => DebitNoteFactory::new(),
            'label' => fake()->words(3, true),
            'quantity' => $quantity,
            'unit_cost' => $unitCost,
            'tax_rate' => $taxRate,
            'line_total' => $lineTotal,
            'position' => 1,
        ];
    }
}
