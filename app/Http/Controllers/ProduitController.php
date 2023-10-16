<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProduitRepository;
use App\Models\Marque;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $produitRepository;
    public function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
        // $this->middleware('auth')->except(['index', 'show']);
    }
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
        $this->produitRepository->store($request);
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
        $this->produitRepository->update($request, $produit);
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
