@extends('layouts.app')

@section('title')

@section('content')

{{-- <a href="{{ route('vente.create') }}" class="btn btn-primary">Ajouter</a> --}}

@forelse ($marques as $marque)
      <li>
        <div class="mb-2">
          {{ $marque->nom }}
            {{-- <a href="{{ route('vente.edit', ['vente' => $vente->id]) }}" class="btn btn-sm btn-warning">Modifier</a> --}}
        </div>
      </li>
    @empty
      <li>
        Aucune marque connue
      </li>
    @endforelse
