<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->words(3, true),
            'product_price' => $this->faker->numberBetween(100, 5000),
            'product_description' => $this->faker->sentence(12),
            'category' => $this->faker->randomElement(['Smartphones', 'Laptops', 'Accessories', 'Wearables', 'Smart Home']),
            'product_image' => 'products/placeholder.png', // You can update this to a real image path
        ];
    }
} 