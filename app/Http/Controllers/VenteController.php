<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventes = Vente::all();
        return view('vente.index', compact('ventes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $vente = new Vente();

        $vente->produit = $data['produit'];
        $vente->quantite = $data['quantite'];

        $vente->save();

        return redirect()->route('vente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        $marques = Vente::all();

        return view('vente.edit', compact('vente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        $data = $request->all();

        $vente->produit = $data['produit'];
        $vente->quantite = $data['quantite'];

        $vente->save();

        return redirect()->route('vente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
