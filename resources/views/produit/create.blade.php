@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Création d'un produit</h2>
        <form action="{{ route('produit.store') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}" required maxlength="75">
                @error('nom')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" name="prix" id="prix" value="{{ old('prix') }}" required maxlength="20">
                @error('prix')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" class="form-control" name="marque" id="marque" value="{{ old('marque') }}" required maxlength="75">
                @error('marque')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="marque_id">Marque</label>
                <select class="form-control" name="marque_id" id="marque_id">
                    @foreach ($marques as $marque)
                        <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reference">Référence</label>
                <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference') }}" required maxlength="10">
                @error('reference')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="Valider" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
