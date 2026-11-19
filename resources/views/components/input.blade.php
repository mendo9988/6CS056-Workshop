@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'autocomplete' => null,
])

<div class="space-y-1.5">
    <label for="{{ $name }}" class="block text-sm font-extrabold text-navy">
        {{ $label }}
        @if ($required)
            <span class="text-error" aria-hidden="true">*</span>
        @endif
    </label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        aria-invalid="{{ $errors->has($name) ? 'true' : 'false' }}"
        aria-describedby="{{ $errors->has($name) ? $name . '-error' : '' }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-2xl border-2 border-sunshine bg-white px-4 py-2.5 font-semibold text-ink shadow-inner placeholder:text-navy/40 focus:border-peach focus:ring-4 focus:ring-peach/20 ' . ($errors->has($name) ? 'border-error' : ''),
        ]) }}
    >
    <x-error :name="$name" />
</div>
