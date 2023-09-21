<?php

namespace Database\Factories;

use App\Models\Vente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vente>
 */
class VenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vente::class;
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'heure' => $this->faker->time(),
            'produit' => $this->faker->word(),
            'quantite' => $this->faker->numberBetween(0, 10),
        ];
    }
}
