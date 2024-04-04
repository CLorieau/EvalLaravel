<?php

use Illuminate\Support\Facades\Route;
use App\Models\Recette;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/accueil', function () {
    return view('accueil');
});


Route::get('liste', function (Request $request) {
    // -- Liste des recettes (toutes les infos) :
    $recettes = Recette::get();
    return view('liste_recettes',["recettes"=>$recettes]);

});

Route::get('/recherche', function (Request $request) {
    $mc = $request->input('Search');
    $recettes = Recette::where('ingredients', "like", "%$mc%")->get();
    return view('resultat_recherche',["recettes"=>$recettes]);
});

Route::get('/ajouter', function () {
    return view('ajout_recette');
});

Route::post('/ajout', function (Request $request) {
    $recette = new Recette;
    $recette->titre = $request->titre;
    $recette->ingredients = $request->ingredients;
    $recette->duree = $request->duree;
    $recette->photo = $request->photo;
    $recette->save(); // sauvegarde dans la BD Insert into
    $recettes = Recette::get();
    $message = "La recette a été ajouté";
    return view('ajout_recette',["recette"=>$recettes,"message"=>$message]);
});
