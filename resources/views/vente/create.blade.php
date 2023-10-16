@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Création d'une vente</h2>
        <form action="{{ route('vente.store') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" name="quantite" id="quantite" value="{{ old('quantite') }}" required maxlength="100">
                @error('quantite')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="produit_id">Produit</label>
                <select class="form-control" name="produit_id" id="produit_id">
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Valider" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
