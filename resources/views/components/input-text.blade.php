<label for="{{$property}}">{{ $label }}</label>
<input type="text" class="form-control" name="{{ $property }}" id="{{ $property }}">
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
