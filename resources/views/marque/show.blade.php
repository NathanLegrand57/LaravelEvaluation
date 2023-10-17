@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h2 class="mb-4">{{ __('Détails de la marque') }}</h2>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom de la marque') }} : {{ $marque->nom }}</h5>
                <h5>
                    {{ __('Pays') }} : {{ $marque->pays }}
                </h5>
            </div>
        </div>
    </div>
@endsection
