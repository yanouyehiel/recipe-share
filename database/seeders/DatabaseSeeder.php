<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Etape;
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
        //User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Yehiel Yanou',
            'email' => 'yehiel.yanou@dev.com',
            'password' => 'azerty123'
        ]);

        $recette = Recette::factory()->create([
            'user_id' => $user->id
        ]);

        $commentaire = Commentaire::factory()->create([
            'recette_id' => $recette->id,
            'user_id' => $user->id
        ]);

        $etape = Etape::factory(5)->create([
            'recette_id' => $recette->id
        ]);
    }
}
