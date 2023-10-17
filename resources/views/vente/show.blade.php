@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h2 class="mb-4">{{ __('Détails de la vente') }}</h2>

        <div class="card mb-3">
            <div class="card-body">
                <h5>
                    {{ __('Nom du produit') }} : {{ $vente->produit->nom }}
                </h5>
                <h5>
                    {{ __('Quantité') }} : {{ $vente->quantite }}
                </h5>
                <h5>
                    {{ __('Prix total') }} : {{ $vente->quantite * $vente->produit->prix }} €
                </h5>
                <h5>
                    {{ __('Date et heure de vente') }} : {{ $vente->created_at }}
                </h5>
            </div>
        </div>
    </div>
@endsection
