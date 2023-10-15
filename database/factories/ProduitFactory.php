<?php

namespace Database\Factories;

use App\Models\Marque;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produit::class;
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(1),
            'reference' => $this->faker->numberBetween(0, 20000),
            'prix' => $this->faker->randomNumber(2),
            'marque_id' => Marque::factory()->create()
        ];
    }
}
