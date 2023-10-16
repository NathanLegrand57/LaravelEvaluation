<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return view('produit.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marques = Marque::all();

        return view('produit.create', compact('marques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $produit = new Produit();

        $produit->nom = $data['nom'];
        $produit->prix = $data['prix'];
        $produit->reference = $data['reference'];
        $produit->marque_id = $data['marque_id'];

        $produit->save();

        return redirect()->route('produit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $marques = Marque::all();

        return view('produit.edit', compact('produit', 'marques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $data = $request->all();

        $produit->nom = $data['nom'];
        $produit->prix = $data['prix'];
        $produit->reference = $data['reference'];
        $produit->marque_id = $data['marque_id'];

        $produit->save();

        return redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit -> delete();
        return redirect()->route("produit.index");
    }
}
