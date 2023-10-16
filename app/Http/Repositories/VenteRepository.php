<?php

namespace App\Http\Repositories;

use App\Models\Vente;

class VenteRepository
{
    protected $vente;

    public function store($request)
    {
        $data = $request->all();

        $vente = new Vente;
        $vente->quantite = $data['quantite'];
        $vente->produit_id = $data['produit_id'];

        $vente->save();
    }

    public function update($request, $vente)
    {
        $data = $request->all();
        $vente->quantite = $data['quantite'];
        $vente->produit_id = $data['produit_id'];

        $vente->save();
    }
}
