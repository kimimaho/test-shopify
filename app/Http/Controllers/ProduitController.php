<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use App\Mail\ProduitAjoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProduitFormRequest;
use App\Notifications\ModificationProduit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits=Produit::paginate(7);
       //dd($produits);
       // $produit=new Produit();
        //dd($produit);

      /*  $produit->designation="Livre";
        $produit->description="La description du livre";
        $produit->prix=1000; */
       // $produit->save();

        //dd($produit);
       // $produits=Produit::all();
     //   $produits500=Produit::where(["prix"=>500, "designation"=>"Cahier"])->get();
      /*  $produit=Produit::findorFail(5);
        dd($produit); */
      //  dd($produits500);
       // dd($produits);
        return view("front-office.produits.index",[
            "produits"=>$produits

        ]);
        //dd($produit); .;;:;:;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $produit=new Produit();
        $categories = Category::all();
        return view("front-office.produits.create",
        [
            "categories" => $categories,
            "produit" => $produit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName=  null;

        if($request->file('image')){
            $imageName= time().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs("public/upload/produits",$imageName);
        }
            $request->session()->put('imageName',$imageName);
        $request->validate([
            "designation" => "required|min:3|max:50|unique:produits",
            "prix" => "required|numeric|between:500,100000",
            "description" => "required|max:200",
            "category_id" => "required|numeric",
           // "image" => $imageName
        ]);

        Produit::create([
            "designation" => $request->designation,
            "prix" => $request->prix,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "image" => $imageName

        ]);

        $user = User::first();

        Mail::to($user)->send(new ProduitAjoute);


        return redirect()->route("produits.index")->with('statut','Le produit a bien été ajouté!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
            $categories= Category::all();
        return view("front-office.produits.edit",
         [
             "produit" => $produit,
             "categories" => $categories
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        // $request->validate([
        //     "designation" => "required|min:3|max:50|unique:produits",
        //     "prix" => "required|numeric|between:500,100000",
        //     "description" => "required|max:200",
        //     "category_id" => "required|numeric"
        // ]);

        Produit::where('id', $id)->update([
            "designation" => $request->designation,
            "prix" => $request->prix,
            "category_id" => $request->category_id,
            "description" => $request->description

        ]);
        $user=User::first();
        $user->notify(new ModificationProduit);

        return redirect()->route("produits.index")->with('statut','Le produit a bien été mis à jour!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Produit::destroy($id);
        return redirect()->route("produits.index")->with('statut','Le produit a bien été supprimé');
    }

}
