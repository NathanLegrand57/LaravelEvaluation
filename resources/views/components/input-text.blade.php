{{-- @props(['property', 'label', 'max']) --}}

<label for="{{ $property }}">{{ $label }}</label>
<input type="text" class="form-control" name="{{ $property }}" id="{{ $property }}"
    placeholder="{{ $label }}" value="{{ old($property) }}">
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
