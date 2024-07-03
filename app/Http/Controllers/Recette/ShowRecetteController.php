<?php

namespace App\Http\Controllers\Recette;

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

        return view('recette.show', [
            'recette' => $recette
        ]);
    }
}
