@extends('layouts.app')

@section('content')
    <h2>Liste des produits</h2>
    <a href="{{ route('produit.create') }}" class="btn btn-primary">Ajouter</a>
    @forelse ($produits as $produit)
        <div class="mb-2">
            <ul>
                {{ $produit->nom }}
                <a href="{{ route('produit.edit', ['produit' => $produit->id]) }}" class="btn btn-sm btn-warning">Modifier</a>
                <a href="{{ route('produit.destroy', ['produit' => $produit->id]) }}"
                    class="btn btn-sm btn-warning">Supprimer</a>
            </ul>
        </div>

    @empty
        <li>
            Aucun produit connu
        </li>
    @endforelse
@endsection
