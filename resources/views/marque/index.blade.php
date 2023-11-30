@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">{{ __('Liste des marques') }}</h2>
    @can('marque-create')
        <x-create-button property="marque" />
    @endcan
    @forelse ($marques as $marque)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom de la marque') }} : {{ $marque->nom }}</h5>
                <div class="btn-toolbar">
                    <div class="btn-group">
                    </div>
                    <x-details-button property="marque" :model="$marque" />

                    @can('marque-update')
                        <x-update-button property="marque" :model="$marque" />
                    @endcan
                    @can('marque-retrieve')
                        <x-delete-button property="marque" :model="$marque" />
                    @endcan
                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">
            Aucune marque connue
        </p>
    @endforelse
@endsection
