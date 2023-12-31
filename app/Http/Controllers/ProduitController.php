<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProduitRepository;
use App\Http\Requests\ProduitRequest;
use App\Mail\CreateProduit;
use App\Mail\UpdateProduit;
use App\Models\Marque;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $produitRepository;
    public function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
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

        if (Auth::user()->can('produit-create')) {
            return view('produit.create', compact('marques'));
        }

        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitRequest $request, Produit $produit, Marque $marque)
    {
        $this->produitRepository->store($request);

        $email = (new CreateProduit($produit))->with([
            'produit' => $produit,
            'marque' => $marque,
        ]);

        Mail::to(Auth::user()->email)->send($email);

        return redirect()->route('produit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('produit.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $marques = Marque::all();

        if (Auth::user()->can('produit-update')) {
            return view('produit.edit', compact('produit', 'marques'));
        }

        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduitRequest $request, Produit $produit, Marque $marque)
    {
        $this->produitRepository->update($request, $produit);

        $email = (new UpdateProduit($produit))->with([
            'produit' => $produit,
            'marque' => $marque,
        ]);

        Mail::to(Auth::user()->email)->send($email);

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
