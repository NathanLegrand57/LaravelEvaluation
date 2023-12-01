
<label for="{{ $property }}">{{ $label }}</label>
<select class="form-control" name="{{ $property }}" id="{{ $property }}">
    @foreach ($models as $model)
        <option value="{{ $model->id }}">{{ $model->nom }}</option>
    @endforeach
</select>

