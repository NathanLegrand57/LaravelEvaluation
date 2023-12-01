@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __("Création d'une vente") }}</h2>
        <form action="{{ route('vente.store') }}" method="post">

            @csrf

            <div class="form-group">
                <x-input-number property="quantite" maxlength="100" label="{{ __('Quantité') }}" />
            </div>

            <div class="form-group">
                {{-- <label for="produit_id">{{ __('Produit') }}</label>
                <select class="form-control" name="produit_id" id="produit_id">
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                    @endforeach
                </select> --}}
                <x-select-list property="produit_id" label="{{ __('Produit') }}" :models="$produits"/>
            </div>

            <div class="form-group">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
