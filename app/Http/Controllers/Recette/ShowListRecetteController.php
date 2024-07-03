<?php

namespace App\Http\Controllers\Recette;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowListRecetteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('recette.list', [
            'recettes' => auth()->user()->recettes
        ]);
    }
}
