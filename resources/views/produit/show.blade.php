@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h2 class="mb-4">{{ __('Détails du produit') }}</h2>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom du produit') }} : {{ $produit->nom }}</h5>
                <h5 class="card-text">{{ __("Prix à l'unité") }} : {{ $produit->prix }} €</h5>
                <h5 class="card-text">{{ __("Référence") }} : {{ $produit->reference }} </h5>
                <h5 class="card-text">{{ __("Marque") }} : {{ $produit->marque->nom }} </h5>
            </div>
        </div>
    </div>
@endsection
