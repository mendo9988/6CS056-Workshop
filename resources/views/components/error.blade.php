@props(['name'])

@error($name)
    <p id="{{ $name }}-error" class="text-sm font-bold text-error" role="alert">
        {{ $message }}
    </p>
@enderror
