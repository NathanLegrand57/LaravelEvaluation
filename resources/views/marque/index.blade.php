@extends('layouts.app')

@section('content')
    <h2 class="ms-3 mt-2">{{ __('Liste des marques') }}</h2>
    @can('marque-create')
        <a href="{{ route('marque.create') }}" class="btn btn-success ms-3 mt-2">{{ __('Ajouter') }}</a>
    @endcan
    @forelse ($marques as $marque)
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nom de la marque') }} : {{ $marque->nom }}</h5>
                <div class="btn-toolbar">
                    <div class="btn-group">
                    </div>
                    <a href="{{ route('marque.show', ['marque' => $marque->id]) }}"
                        class="btn btn-sm btn-primary m-1">{{ __('Détails') }}</a>
                    @can('marque-update')
                        <a href="{{ route('marque.edit', ['marque' => $marque->id]) }}"
                            class="btn btn-sm btn-warning m-1">{{ __('Modifier') }}</a>
                    @endcan
                    <form method="POST" action="{{ route('marque.destroy', ['marque' => $marque->id]) }}">
                        @csrf
                        @method('DELETE')
                        @can('marque-retrieve')
                            <button type="submit" class="btn btn-danger delete-user btn-sm m-1">{{ __('Supprimer') }}</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="ms-3">
            Aucune marque connue
        </p>
    @endforelse
@endsection
