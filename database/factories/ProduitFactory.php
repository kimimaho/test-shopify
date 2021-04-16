<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                "designation" => $this->faker->unique()->realText(30),
                "description" => $this->faker->realText($maxNbChars = 60, $indexSize = 2),

                "prix" => $this->faker->numberBetween(500, 1000000),
        ];
    }
}
