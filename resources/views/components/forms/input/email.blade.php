@props([
    'name',
    'max' => false,
    'placeholder' => '',
    'value' => '',
    'required' => false
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-5 field']) }}>
    <input class="input" type="email" name="{{ $name }}" id="{{ $name }}"
           {{ $required ? 'required' : '' }} maxlength="{{ $max }}" aria-label="{{ $placeholder }}"
           value="{{ $value }}">
    <div class="placeholder">{{ $placeholder }}*</div>
    <div class="error error-{{ $name }}"></div>
</div>
