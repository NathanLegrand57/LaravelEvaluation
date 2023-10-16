<?php

namespace App\Http\Repositories;

use App\Models\Marque;

class MarqueRepository
{
    protected $marque;

    public function store($request)
    {
        $data = $request->all();

        $marque = new Marque();

        $marque->nom = $data['nom'];
        $marque->pays = $data['pays'];

        $marque->save();
    }

    public function update($request, $marque)
    {
        $data = $request->all();

        $marque->nom = $data['nom'];
        $marque->pays = $data['pays'];

        $marque->save();
    }
}
