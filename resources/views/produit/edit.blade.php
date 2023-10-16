@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mise à jour</h2>
        <form action="{{ route('produit.update', ['produit' => $produit->id]) }}" method="post">

            @csrf
            @method('put')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom', $produit->nom) }}" required maxlength="75">
                @error('nom')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" name="prix" id="prix" value="{{ old('prix', $produit->prix) }}" required maxlength="20">
                @error('prix')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="reference">Référence</label>
                <input type="text" class="form-control" name="reference" id="reference" value="{{ old('reference', $produit->reference) }}" required maxlength="10">
                @error('reference')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="marque_id">Marque</label>
                <select class="form-control" name="marque_id" id="marque_id">
                    @foreach ($marques as $marque)
                        <option value="{{ $marque->id }}"{{ $produit->marque_id == $marque->id ? 'selected' : '' }}>
                            {{ $marque->nom }}
                        </option>
                    @endforeach
                </select>
                @error('marque_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="Valider" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
