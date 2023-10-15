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
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" value="{{ old('prix', $produit->prix) }}" required
                maxlength="20">
            @error('prix')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label for="reference">Reference</label>
            <input type="number" name="reference" id="reference" value="{{ old('reference', $produit->reference) }}"
            required maxlength="10">
            @error('reference')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="marque">Marque</label>
            <select name="marque_id" id="marque_id">
                @foreach ($marques as $marque)
                    <option value="{{ $marque->id }}"{{ $produit->marque_id == $marque->id ? 'selected' : '' }}>
                        {{ $marque->nom }}
                    </option>
                @endforeach
            </select>
            @error('marque')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="Valider" class="btn btn-success">
        </div>

    </form>
@endsection
