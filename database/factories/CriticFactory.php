<?php

namespace Database\Factories;

use App\Models\Critic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Critic>
 */
class CriticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return ['user_id' => 1,'film_id' => fake()->numberBetween(1, 100),
                  'score' => fake()->randomFloat(1, 0, 10),'comment' => fake()->text(),
                ];    
    }
}
