@extends('layouts.app')

@section('content')
  <h2>Création d'une marque</h2>
  <form action="{{ route('marque.store') }}" method="post">

    @csrf

    <div>
      <label for="nom">Nom</label>
      <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required maxlength="75">
      @error('nom')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="pays">Pays</label>
      <input type="texte" name="pays" id="pays" value="{{ old('pays') }}" required maxlength="75">
      @error('pays')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <input type="submit" value="Valider" class="btn btn-success">
    </div>

  </form>
@endsection
