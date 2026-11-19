@props([
    'name',
    'label',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'rows' => 4,
])

<div class="space-y-1.5">
    <label for="{{ $name }}" class="block text-sm font-extrabold text-navy">
        {{ $label }}
        @if ($required)
            <span class="text-error" aria-hidden="true">*</span>
        @endif
    </label>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        aria-invalid="{{ $errors->has($name) ? 'true' : 'false' }}"
        aria-describedby="{{ $errors->has($name) ? $name . '-error' : '' }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-2xl border-2 border-sunshine bg-white px-4 py-2.5 font-semibold text-ink shadow-inner placeholder:text-navy/40 focus:border-peach focus:ring-4 focus:ring-peach/20 ' . ($errors->has($name) ? 'border-error' : ''),
        ]) }}
    >{{ $value }}</textarea>
    <x-error :name="$name" />
</div>
