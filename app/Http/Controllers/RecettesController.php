<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function list(Request $request)
    {
        if ($request->has("search")) {
            $recette = Recette::with('user')->where('nom', 'like', '%' . $request->search . '%')->get();
            return response()->json($recette);
        }
        $recettes = Recette::with('user')->get();
        return response()->json($recettes);
    }
}
