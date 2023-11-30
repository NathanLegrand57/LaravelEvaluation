{{-- @props(['property', 'label']) --}}

<label for="{{ $property }}"> {{ $label }}</label>
<input type="number" class="form-control" name="{{ $property }}" id="{{ $property }}"
    placeholder="{{ $label }}" value="{{ old($property) }}">
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
