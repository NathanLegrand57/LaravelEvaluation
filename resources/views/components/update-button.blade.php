@props(['property', 'model'])

<a href="{{ route($property.'.edit', [$property => $model->id]) }}"
    class="btn btn-sm btn-warning m-1">{{ __('Modifier') }}</a>
