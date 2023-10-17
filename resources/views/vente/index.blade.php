@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">Liste des ventes</h2>
    @can('vente-create')
        <a href="{{ route('vente.create') }}" class="btn btn-success ms-3 mt-2">Ajouter</a>
    @endcan

    @forelse ($ventes as $vente)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">Nom du produit : {{ $vente->produit->nom }} | Quantité : {{ $vente->quantite }} | Prix
                    total : {{ $vente->quantite * $vente->produit->prix }} € | Date et heure de vente :
                    {{ $vente->created_at }}</h5>
                <div class="btn-toolbar">
                    @can('vente-update')
                        <a href="{{ route('vente.edit', ['vente' => $vente->id]) }}"
                            class="btn btn-sm btn-warning m-1">Modifier</a>
                    @endcan
                    <form method="POST" action="{{ route('vente.destroy', ['vente' => $vente->id]) }}">
                        @csrf
                        @method('DELETE')
                        @can('vente-retrieve')
                            <button type="submit" class="btn btn-sm btn-danger delete-user m-1">Supprimer</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">Aucune vente connue</p>
    @endforelse
@endsection
