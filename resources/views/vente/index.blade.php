@extends('layouts.app')

@section('title')

@section('content')

{{-- <a href="{{ route('vente.create') }}" class="btn btn-primary">Ajouter</a> --}}

@forelse ($ventes as $vente)
      <li>
        <div class="mb-2">
          {{ $vente->produit }}
            {{-- <a href="{{ route('vente.edit', ['vente' => $vente->id]) }}" class="btn btn-sm btn-warning">Modifier</a> --}}
        </div>
      </li>
    @empty
      <li>
        Aucune vente connue
      </li>
    @endforelse
