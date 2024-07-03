<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recette>
 */
class RecetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(5),
            'description' => $this->faker->paragraphs(3, true),
            'preparationTime' => $this->faker->numberBetween(15, 60),
            'cookingTime' => $this->faker->numberBetween(15, 240),
            'nbCalories' => $this->faker->numberBetween(300, 2000),
            'difficulte' => "Moyenne",
            'user_id' => User::factory()
        ];
    }
}
