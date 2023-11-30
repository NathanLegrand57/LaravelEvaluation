@props(['property', 'model'])
<a href="{{ route($property . '.show', [ $property => $model->id]) }}"
    class="btn btn-sm btn-primary m-1">{{ __('Détails') }}</a>
