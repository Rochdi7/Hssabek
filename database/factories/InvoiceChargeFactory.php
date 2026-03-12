<?php

namespace Database\Factories;

use App\Models\Sales\InvoiceCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceChargeFactory extends Factory
{
    protected $model = InvoiceCharge::class;

    public function definition(): array
    {
        return [
            'invoice_id' => InvoiceFactory::new(),
            'label' => fake()->randomElement(['Frais de livraison', 'Frais de dossier', 'Emballage']),
            'amount' => fake()->randomFloat(2, 5, 200),
            'tax_rate' => 20.0000,
            'position' => 1,
        ];
    }
}
