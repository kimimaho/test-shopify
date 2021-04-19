<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\Role;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        $this->call([

            ProduitSeeder::class,
            RoleSeeder::class,
           // CategorySeeder::class,
        ]);

        /*Produit::factory(100)->create();
        Category::factory(20)->create(); */

    }
}
