<?php

namespace Database\Seeders;

use App\Models\Vente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vente::factory() // Permis par l’implémentation de HasFactory
            ->count(5)
            ->create();
    }
}
