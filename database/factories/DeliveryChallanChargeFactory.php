<?php

namespace Database\Factories;

use App\Models\Sales\DeliveryChallanCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryChallanChargeFactory extends Factory
{
    protected $model = DeliveryChallanCharge::class;

    public function definition(): array
    {
        return [
            'delivery_challan_id' => DeliveryChallanFactory::new(),
            'label' => fake()->randomElement(['Frais de livraison', 'Frais de dossier', 'Emballage']),
            'amount' => fake()->randomFloat(2, 5, 200),
            'tax_rate' => 20.0000,
            'position' => 1,
        ];
    }
}
