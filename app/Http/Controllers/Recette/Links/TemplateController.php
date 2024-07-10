<?php

namespace App\Http\Controllers\Recette\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Link $link)
    {
        return view("recette.links.templates.{$link->template}", [
            'recette' => $link->recette
        ]);
    }
}
