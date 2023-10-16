@extends('layouts.app')

@section('content')
    <h2>Liste des produits</h2>
    <a href="{{ route('produit.create') }}" class="btn btn-primary mb-3">Ajouter</a>
    @forelse ($produits as $produit)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $produit->nom }}</h5>
            <div class="btn-toolbar">
                <a href="{{ route('produit.edit', ['produit' => $produit->id]) }}" class="btn btn-sm btn-warning m-1">Modifier</a>
                <form method="POST" action="{{ route('produit.destroy', ['produit' => $produit->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger delete-user m-1">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    @empty
        <li>
            Aucun produit connu
        </li>
    @endforelse
@endsection
