@extends('layouts.app')

@section('title')

@section('content')

    <h2>Liste des ventes</h2>
    @forelse ($ventes as $vente)
        {{-- @forelse ($produits as $produit) --}}
        <div class="mb-2">
            {{ $vente->produit }} {{ $produit->$prix }}
        </div>
    @empty
        <li>
            Aucune vente connue
        </li>
    @endforelse
