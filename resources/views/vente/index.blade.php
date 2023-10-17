@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">{{ __('Liste des ventes') }}</h2>
    @can('vente-create')
        <a href="{{ route('vente.create') }}" class="btn btn-success ms-3 mt-2">{{ __('Ajouter') }}</a>
    @endcan

    @forelse ($ventes as $vente)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom du produit') }} : {{ $vente->produit->nom }}</h5>
                <div class="btn-toolbar">
                    <a href="{{ route('vente.show', ['vente' => $vente->id]) }}"
                        class="btn btn-sm btn-primary m-1">{{ __('Détails') }}</a>
                    @can('vente-update')
                        <a href="{{ route('vente.edit', ['vente' => $vente->id]) }}"
                            class="btn btn-sm btn-warning m-1">{{ __('Modifier') }}</a>
                    @endcan
                    <form method="POST" action="{{ route('vente.destroy', ['vente' => $vente->id]) }}">
                        @csrf
                        @method('DELETE')
                        @can('vente-retrieve')
                            <button type="submit" class="btn btn-sm btn-danger delete-user m-1">{{ __('Supprimer') }}</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">Aucune vente connue</p>
    @endforelse
@endsection
