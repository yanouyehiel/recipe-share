<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Recette;
use Illuminate\Http\Request;

class ShowRecetteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($idRecette)
    {
        $recette = Recette::find((int) $idRecette);

        return view('livewire.welcome.index-form', [
            'recette' => $recette
        ]);
    }
}
