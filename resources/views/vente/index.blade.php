@extends('layouts.app')

@section('title')

@section('content')

    <h2>Liste des ventes</h2>
    @forelse ($ventes as $vente)
        <div class="mb-2">
            {{ $vente->produit }}
        </div>
    @empty
        <li>
            Aucune vente connue
        </li>
    @endforelse
