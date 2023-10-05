@extends('layouts.app')

@section('content')
  <h2>Mise à jour</h2>
  <form action="{{ route('marque.update', ['marque' => $marque->id]) }}" method="post">

    @csrf
    @method('put')

    <div>
      <label for="nom">Nom</label>
      <input type="text" name="nom" id="nom" value="{{ old('nom', $marque->nom) }}" required maxlength="75">
      @error('nom')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="pays">Pays</label>
      <input type="texte" name="pays" id="pays" value="{{ old('pays', $marque->pays) }}" required maxlength="75">
      @error('pays')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <input type="submit" value="Valider" class="btn btn-success">
    </div>

  </form>
@endsection
