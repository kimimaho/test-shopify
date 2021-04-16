<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    public function ajouterProduit()
    {
        //dd("hello");
        $produit=Produit::create([
            "designation"=>"cahier",
            "description"=>"la description du cahier",
            "prix"=>500
        ]);

        dd($produit);
    }

    Public function createCategory(){

        $category = Category::create([
            "libelle" => "vetement",
        ]);

        $produit = Produit::create([
            "category_id"=> $category->id,
            "designation" => "pantalon",
            "description" => "La description du cahier",
            "prix" => 500,
        ]);
    }
    public function getProduit(Produit $produit)

    {

        $category = Category::first();


       // dd($category, $category->produits);

    }

    public function updateProduit(Produit $produit)
    {
        dd($produit);
       /* $produit= Produit::findorFail(Produit $produit);
        dump($produit); */
        $produit->designation="Chemise";
        $produit->description="La description de chemise";
        $produit->prix=600;
        $produit->save();
        dd($produit);

    }
    public function updateProduit2(int $id)
    {
        $produit= Produit::findorFail($id);
        //dd($produit);
        $result=Produit::where("id", $id)->update([
            "designation"=>"Tricot",
            "description"=>"La description de Tricot",
            "prix"=> 1500
            ]);
            dd($result);
    }
    public function suppressionProduit(int $id)
    {
        $result=Produit::destroy($id);
        dd($result);
    }
    public function commande(){
       /* $user=user::create([
            "name"=>"Abdramane SANOU",
            "email"=>"abdramane3.sanou@gmail.com",
            "password"=>Hash::make("admin123")
        ]); */
        $user=user::first();
        $produit1=Produit::first();
        $produit2=Produit::findOrFail(2);

        //$user->produits()->attach($produit1);
        $user->produits()->sync($produit1);
       // $user->produits()->sync($produit2);

        dd($user->produits);
    }
    public function accueil(){

        $produits=Produit::orderByDesc("id")->take(9)->get();
        return view("welcome",[
            "produits"=> $produits
        ]);
    }
    public function collection(){
        $collection1= collect([
            [
            "titles"=>"Mon super livre",
            "price"=>5000,
            "description"=>"La description du livre"
            ],
            [
                "titles"=>"Mon super livre1",
                "price"=>6000,
                "description"=>"La description du livre1"
            ]
        ]);
        //$nouvelleCollection=$collection1->filter(function($livre,));
        dd($collection1->avg("price"));
    }

    public function exportProduits()
    {
        return Excel::download(new ProduitsExport,"produits.xlsx");

    }


}
