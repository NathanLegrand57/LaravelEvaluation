@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Mise à jour') }}</h2>
        <form action="{{ route('produit.update', ['produit' => $produit->id]) }}" method="post">

            @csrf
            @method('put')

            <div class="form-group">
                <x-input-text property="nom" title="nom" label="{{ __('Nom') }}" />
            </div>

            <div class="form-group">
                <x-input-number property="prix" maxlength="20" max="10" label="{{ __('Prix') }}" />
            </div>

            <div class="form-group">
                <x-input-text property="reference" maxlength="10" label="{{ __('Reference') }}" />
            </div>

            <div class="form-group">
                <x-select-list property="marque_id" label="{{ __('Marque') }}" :models="$marques" />
            </div>

            <div class="form-group">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
