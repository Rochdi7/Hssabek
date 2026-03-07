<?php

namespace Database\Factories;

use App\Models\Catalog\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    protected $model = Unit::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Pièce', 'Kilogramme', 'Litre', 'Mètre', 'Heure']),
            'short_name' => fake()->randomElement(['pcs', 'kg', 'L', 'm', 'h']),
        ];
    }
}
