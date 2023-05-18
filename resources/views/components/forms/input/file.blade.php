@props([
    'name',
    'required' => false
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-5 field']) }}>
    <div class="file-uploads field-uploads">
        <div class="uploads uploads-d-none">
            <input type="file" name="{{ $name }}" id="{{ $name }}"
                   {{ $required ? 'required' : '' }} class="upload-file file"/>
        </div>
        <button class="button slide_from_bottom full-width bold file-button button-uploads text-uppercase"
                type="button">{{ $slot }}
        </button>
    </div>
    <div class="error error-{{ $name }}"></div>
</div>
