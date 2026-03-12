<?php

namespace Database\Factories;

use App\Models\Sales\CreditNoteItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditNoteItemFactory extends Factory
{
    protected $model = CreditNoteItem::class;

    public function definition(): array
    {
        $quantity = fake()->randomFloat(3, 1, 5);
        $unitPrice = fake()->randomFloat(2, 50, 500);
        $taxRate = 20.0000;
        $lineTotal = round($quantity * $unitPrice * (1 + $taxRate / 100), 2);

        return [
            'credit_note_id' => CreditNoteFactory::new(),
            'label' => fake()->words(3, true),
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'tax_rate' => $taxRate,
            'line_total' => $lineTotal,
            'position' => 1,
        ];
    }
}
