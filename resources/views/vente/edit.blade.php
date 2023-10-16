@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mise à jour</h2>
        <form action="{{ route('vente.update', ['vente' => $vente->id]) }}" method="post">

            @csrf
            @method('put')

            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" name="quantite" id="quantite" value="{{ old('quantite', $vente->quantite) }}" required maxlength="100">
                @error('quantite')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="produit_id">Produit</label>
                <select class="form-control" name="produit_id" id="produit_id">
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}"{{ $vente->produit_id == $produit->id ? 'selected' : '' }}>
                            {{ $produit->nom }}
                        </option>
                    @endforeach
                </select>
                @error('produit_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="Valider" class="btn btn-success mt-3">
            </div>

        </form>
    </div>
@endsection
