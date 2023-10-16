<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VenteRepository;
use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $venteRepository;
    public function __construct(VenteRepository $venteRepository)
    {
        $this->venteRepository = $venteRepository;
        // $this->middleware('auth')->except(['index', 'show']);
    }
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
        $produits = Produit::all();

        return view('vente.create', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->venteRepository->store($request);
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
        $this->venteRepository->update($request, $vente);
        return redirect()->route('vente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        $vente->delete();
        return redirect()->route("vente.index");
    }
}
