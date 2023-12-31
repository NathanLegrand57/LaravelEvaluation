@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __("Création d'un produit") }}</h2>
        <form action="{{ route('produit.store') }}" method="post">

            @csrf

            <div class="form-group">
                <x-input-text property="nom" maxlength="75" label="{{ __('Nom') }}" />
            </div>

            <div class="form-group">
                <x-input-number property="prix" maxlength="20" label="{{ __('Prix') }}" />
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
