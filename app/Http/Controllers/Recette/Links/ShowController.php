<?php

namespace App\Http\Controllers\Recette\Links;

use App\Http\Controllers\Controller;
use App\Models\Recette;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('recette.links.show', [
            'user' => auth()->user()->load('recettes.links'),
        ]);
    }
}
