@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">{{ __('Liste des ventes') }}</h2>
    @can('vente-create')
        <x-create-button property="vente" />
    @endcan

    @forelse ($ventes as $vente)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom du produit') }} : {{ $vente->produit->nom }}</h5>
                <div class="btn-toolbar">
                    <x-details-button property="vente" :model="$vente" />

                    @can('vente-update')
                        <x-update-button property="vente" :model="$vente" />
                    @endcan
                    <x-delete-button property="vente" :model="$vente" />

                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">Aucune vente connue</p>
    @endforelse
@endsection
