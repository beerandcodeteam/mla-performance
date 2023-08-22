<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->numberBetween(100, 10000),
            'created_at' => $this->faker->dateTime,
            'status' => $this->faker->numberBetween(1,4),
            'history' => json_encode([
                'product_id' => $this->faker->name(),
                'description' => $this->faker->paragraph(3, true),
                'price' => $this->faker->numberBetween(100, 10000),
            ])
        ];
    }
}
