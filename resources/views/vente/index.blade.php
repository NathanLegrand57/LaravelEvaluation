@extends('layouts.app')

@section('content')
    <h2>Liste des ventes :</h2>
    <a href="{{ route('vente.create') }}" class="btn btn-primary mb-3">Ajouter</a>

    @forelse ($ventes as $vente)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $vente->produit }}</h5>
                <div class="btn-toolbar">
                    <a href="{{ route('vente.edit', ['vente' => $vente->id]) }}" class="btn btn-sm btn-warning m-1">Modifier</a>
                    <form method="POST" action="{{ route('vente.destroy', ['vente' => $vente->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger delete-user m-1">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>Aucune vente connue</p>
    @endforelse
@endsection
