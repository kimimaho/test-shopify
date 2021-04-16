<?php

namespace Database\Seeders;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::create([
            "designation"=>"sac à main",
            "description"=>"description du sac à main",
            "prix"=> 15000
        ]);

        Produit::create([
            "designation"=>"ordinateur",
            "description"=>"description de l'ordinateur",
            "prix"=> 300000
        ]);
        
        Produit::create([
            "designation"=>"Telephone",
            "description"=>"description du stelephone",
            "prix"=> 100000
        ]);


    }
}
