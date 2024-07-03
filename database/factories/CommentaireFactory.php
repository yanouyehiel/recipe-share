<?php

namespace Database\Factories;

use App\Models\Recette;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(
                $this->faker->numberBetween(5, 30)
            ),
            'recette_id' => Recette::factory(),
            'user_id' => User::factory()
        ];
    }
}
