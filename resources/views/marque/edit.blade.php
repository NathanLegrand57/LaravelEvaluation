@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Mise à jour') }}</h2>
        <form action="{{ route('marque.update', ['marque' => $marque->id]) }}" method="post">

            @csrf
            @method('put')

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
