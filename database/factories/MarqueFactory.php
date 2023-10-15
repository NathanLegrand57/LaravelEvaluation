<?php

namespace Database\Factories;

use App\Models\Marque;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marque>
 */
class MarqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Marque::class;
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(1),
            'pays' => $this->faker->name(2),
        ];
    }
}
