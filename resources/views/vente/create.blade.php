@extends('layouts.app')

@section('content')
    <h2>Création d'une vente</h2>
    <form action="{{ route('vente.store') }}" method="post">

        @csrf

        <div>
            <label for="produit">Produit</label>
            <input type="text" name="produit" id="produit" value="{{ old('produit') }}" required maxlength="75">
            @error('produit')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="quantite">Quantite</label>
            <input type="number" name="quantite" id="quantite" value="{{ old('quantite') }}" required maxlength="100">
            @error('quantite')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="submit" value="Valider" class="btn btn-success">
        </div>

    </form>
@endsection
