<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventes = Vente::all();
        return view('vente.index', compact('ventes' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Produit::all();

        return view('vente.create', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $vente = new Vente();

        $vente->quantite = $data['quantite'];
        $vente->produit_id = $data['produit_id'];

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
        $produits = Produit::all();

        return view('vente.edit', compact('vente', 'produits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        $data = $request->all();

        $vente->quantite = $data['quantite'];
        $vente->produit_id = $data['produit_id'];

        $vente->save();

        return redirect()->route('vente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        $vente -> delete();
        return redirect()->route("vente.index");
    }
}
