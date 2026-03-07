<?php

namespace Database\Factories;

use App\Models\Sales\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    protected $model = PaymentMethod::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Virement bancaire', 'Espèces', 'Chèque', 'Carte bancaire']),
            'provider' => fake()->randomElement(['bank_transfer', 'cash', 'check', 'card']),
            'is_active' => true,
        ];
    }
}
