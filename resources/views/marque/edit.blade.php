@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mise à jour</h2>
        <form action="{{ route('marque.update', ['marque' => $marque->id]) }}" method="post">

            @csrf
            @method('put')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom', $marque->nom) }}" required maxlength="75">
                @error('nom')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" class="form-control" name="pays" id="pays" value="{{ old('pays', $marque->pays) }}" required maxlength="75">
                @error('pays')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="Valider" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
