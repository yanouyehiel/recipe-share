<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //$recettes = Recette::all();
        $recettes = DB::table('recettes')
            ->join('users', 'recettes.user_id', '=', 'users.id')
            ->select('recettes.*', 'users.name as user_nom')
            ->get();
        
        return view('welcome', [
            'recettes' => $recettes
        ]);
    }
    public function addRecette()
    {
        return view('recette.add-recette');
    }
}
