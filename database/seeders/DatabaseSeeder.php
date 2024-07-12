<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Etape;
use App\Models\Ingredient;
use App\Models\Link;
use App\Models\Recette;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Yehiel Yanou',
            'email' => 'yehiel.yanou@dev.com',
            'password' => 'azerty123'
        ]);

        $recette = Recette::factory(4)->create([
            'user_id' => $user->id
        ]);

        Commentaire::factory()->create([
            'recette_id' => $recette->id,
            'user_id' => $user->id
        ]);

        Etape::factory(5)->create([
            'recette_id' => $recette->id,
            'sort' => 1
        ]);

        Link::factory(3)->create([
            'recette_id' => $recette->id
        ]);

        Ingredient::factory(10)->create([
            'recette_id' => $recette->id
        ]);
    }
}
