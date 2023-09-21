@extends('layouts.app')

@section('title')

@section('content')

<h2>Liste des marques</h2>
@forelse ($marques as $marque)
        <div class="mb-2">
          {{ $marque->nom }}
        </div>
    @empty
      <li>
        Aucune marque connue
      </li>
    @endforelse
