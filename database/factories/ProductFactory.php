<?php

namespace Database\Factories;

use App\Models\Catalog\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'item_type' => 'product',
            'name' => fake()->words(3, true),
            'code' => fake()->unique()->bothify('PRD-####'),
            'sku' => fake()->optional()->bothify('SKU-####'),
            'slug' => fake()->unique()->slug(2),
            'selling_price' => fake()->randomFloat(2, 10, 1000),
            'purchase_price' => fake()->randomFloat(2, 5, 500),
            'track_inventory' => false,
            'quantity' => 0,
            'is_active' => true,
        ];
    }

    public function service(): static
    {
        return $this->state([
            'item_type' => 'service',
            'track_inventory' => false,
        ]);
    }

    public function withInventory(int $qty = 100): static
    {
        return $this->state([
            'track_inventory' => true,
            'quantity' => $qty,
        ]);
    }
}
