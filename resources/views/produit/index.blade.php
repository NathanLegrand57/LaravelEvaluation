@extends('layouts.app')

@section('title')

@section('content')

    <h2>Liste des produits</h2>
    @forelse ($produits as $produit)

            <div class="mb-2">
                    {{ $produit->nom }}
            </div>

    @empty
        <li>
            Aucun produit connu
        </li>
    @endforelse
