@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">{{ __('Liste des produits') }}</h2>
    @can('produit-create')
        <a href="{{ route('produit.create') }}" class="btn btn-success ms-3 mt-2">{{ __('Ajouter') }}</a>
    @endcan
    @forelse ($produits as $produit)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom du produit') }} : {{ $produit->nom }}</h5>
                <div class="btn-toolbar">
                    <a href="{{ route('produit.show', ['produit' => $produit->id]) }}"
                        class="btn btn-sm btn-primary m-1">{{ __('Détails') }}</a>
                    @can('produit-update')
                        <a href="{{ route('produit.edit', ['produit' => $produit->id]) }}"
                            class="btn btn-sm btn-warning m-1">{{ __('Modifier') }}</a>
                    @endcan
                    <form method="POST" action="{{ route('produit.destroy', ['produit' => $produit->id]) }}">
                        @csrf
                        @method('DELETE')
                        @can('produit-retrieve')
                            <button type="submit" class="btn btn-sm btn-danger delete-user m-1">{{ __('Supprimer') }}</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">
            Aucun produit connu
        </p>
    @endforelse
@endsection
