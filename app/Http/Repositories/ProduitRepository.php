<?php

namespace App\Http\Repositories;

use App\Models\Produit;

class ProduitRepository
{
    protected $produit;

    public function store($request)
    {
        $data = $request->all();

        $produit = new Produit();

        $produit->nom = $data['nom'];
        $produit->prix = $data['prix'];
        $produit->reference = $data['reference'];
        $produit->marque_id = $data['marque_id'];

        $produit->save();

    }

    public function update($request, $produit)
    {
        $data = $request->all();

        $produit->nom = $data['nom'];
        $produit->prix = $data['prix'];
        $produit->reference = $data['reference'];
        $produit->marque_id = $data['marque_id'];

        $produit->save();
    }
}
