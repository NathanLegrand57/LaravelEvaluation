<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VenteRepository;
use App\Http\Requests\VenteRequest;
use App\Mail\InfoMail;
use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        if (Auth::user()->can('vente-update')) {
            return view('vente.create', compact('produits'));

        }

        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenteRequest $request)
    {
        $this->venteRepository->store($request);

        return redirect()->route('vente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        return view('vente.show', compact('vente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        $produits = Produit::all();

        if (Auth::user()->can('vente-update')) {
            return view('vente.edit', compact('vente', 'produits'));
        }

        abort(401);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenteRequest $request, Vente $vente)
    {
        $this->venteRepository->update($request, $vente);

        Mail::to(Auth::user()->email)->send(new InfoMail($vente));
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
