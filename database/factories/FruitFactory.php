<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fruit>
 */
class FruitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fruit_name' => $this->faker->firstName,
            'description' => $this->faker->sentence,
            'classification' => $this->faker->word,
            'stocks' => rand(1,100)
        ];
    }
}
