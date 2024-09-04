<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'location' => null,
            'stored' => $this->faker->boolean(),
            'hold_reason' => null,
            'code' => $this->faker->ean8(),
            'image' => null,
            'storage_time' => $this->faker->numberBetween(1, 30),
            'priority' => $this->faker->randomDigitNotNull(),
            'acquired_from' => null,
            'acquire_date' => null,
            'warranty_term' => null,
            'receipt_link' => null,
        ];
    }
}
