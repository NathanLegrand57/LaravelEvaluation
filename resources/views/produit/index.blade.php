@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">{{ __('Liste des produits') }}</h2>
    @can('produit-create')
        <x-create-button property="produit" />
    @endcan
    @forelse ($produits as $produit)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom du produit') }} : {{ $produit->marque->nom }}</h5>
                <div class="btn-toolbar">
                    <x-details-button property="produit" :model="$produit" />

                    @can('produit-update')
                        <x-update-button property="produit" :model="$produit" />
                    @endcan
                    @can('marque-retrieve')
                        <x-delete-button property="produit" :model="$produit" />
                    @endcan
                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">
            Aucun produit connu
        </p>
    @endforelse
@endsection
