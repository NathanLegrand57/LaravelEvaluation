@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __("Création d'une marque") }}</h2>
        <form action="{{ route('marque.store') }}" method="post">

            @csrf

            <div class="form-group">
                <x-input-text property="nom" maxlength="75" label="{{ __('Nom') }}" />
            </div>

            <div class="form-group">
                <x-input-text property="pays" maxlength="75" label="{{ __('Pays') }}" />
            </div>

            <div class="form-group">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
