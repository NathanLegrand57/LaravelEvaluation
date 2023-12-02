@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Mise à jour') }}</h2>
        <form action="{{ route('vente.update', ['vente' => $vente->id]) }}" method="post">

            @csrf
            @method('put')

            <div class="form-group">
                <x-input-number property="quantite" maxlength="100" label="{{ __('Quantité') }}" />
            </div>

            <div class="form-group">
                <x-select-list property="produit_id" label="{{ __('Produit') }}" :models="$produits"/>
            </div>

            <div class="form-group">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
