<?php

use App\Mail\ProduitAjoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Notifications\ModificationProduit;
use App\Http\Controllers\ProduitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, "accueil"])->name("accueil");


Route::resource("produits", ProduitController::class);

Route::get("ajouter-produit", [MainController::class,"ajouterProduit"]);


Route::get("update-produit/{produit}", [MainController::class, "updateProduit"]);


Route::get("update-produit2/{id}", [MainController::class, "updateProduit2"]);


Route::get("suppression-produit/{id}", [MainController::class, "suppressionProduit"]);
Route::get("create-category", [MainController::class, "createCategory"]);
Route::get("get-produit/{produit}", [MainController::class, "getProduit"]);
Route::get("commande", [MainController::class, "commande"]);
Route::get("test-collection", [MainController::class, "collection"]);
Route::get("test-collection", [MainController::class, "collection"]);
Route::get("test-mail", function(){
    return new ProduitAjoute();
});
Route::get("test-notification", function(){
    return new ModificationProduit();
});

//Route::get("create-produit", [ProduitController::class, "create"]);
//Route::get("edit-produit/{produit}", [ProduitController::class, "edit"])->name("edit-produit");
