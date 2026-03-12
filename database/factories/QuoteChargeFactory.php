<?php

namespace Database\Factories;

use App\Models\Sales\QuoteCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteChargeFactory extends Factory
{
    protected $model = QuoteCharge::class;

    public function definition(): array
    {
        return [
            'quote_id' => QuoteFactory::new(),
            'label' => fake()->randomElement(['Frais de livraison', 'Frais de dossier', 'Emballage']),
            'amount' => fake()->randomFloat(2, 5, 200),
            'tax_rate' => 20.0000,
            'position' => 1,
        ];
    }
}
