@props([
    'name',
    'required' => false
    ])

<div class="col-12 col-lg-10 offset-lg-1 field">
    <input class="checkbox" type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}>
    <label for="{{ $name }}" class="label-checkbox">
        {{ $slot }}
    </label>
    <div class="error error-{{ $name }}"></div>
</div>
