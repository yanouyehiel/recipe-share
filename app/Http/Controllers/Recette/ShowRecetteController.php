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

    public function recette($idRecette)
    {
        $recette = Recette::find((int) $idRecette);

        return view('recette', [
            'recette' => $recette
        ]);
    }

    public function modify($idRecette)
    {
        $recette = Recette::find((int) $idRecette);

        if ($recette->user_id == auth()->user()->id) {
            return view('recette.show', [
                'recette' => $recette
            ]);
        } else {
            return redirect("recettes");
        }
    }
}
