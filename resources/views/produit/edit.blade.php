@extends('layouts.app')

@section('content')
    <h2>Mise à jour</h2>
    <form action="{{ route('produit.update', ['produit' => $produit->id]) }}" method="post">

        @csrf
        @method('put')

        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $produit->nom) }}" required maxlength="75">
            @error('nom')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="reference">Prix</label>
            <input type="number" name="reference" id="prix" value="{{ old('prix', $produit->prix) }}" required
                maxlength="20">
            @error('prix')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="marque">Marque</label>
            <input type="texte" name="marque" id="marque" value="{{ old('marque', $produit->marque) }}" required
                maxlength="75">
            @error('marque')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="reference">Reference</label>
            <input type="number" name="reference" id="reference" value="{{ old('reference', $produit->reference) }}" required
                maxlength="10">
            @error('reference')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="submit" value="Valider" class="btn btn-success">
        </div>

    </form>
@endsection
