@props([
    'name',
    'label',
    'required' => false,
])

<div class="space-y-1.5">
    <label for="{{ $name }}" class="block text-sm font-extrabold text-navy">
        {{ $label }}
        @if ($required)
            <span class="text-error" aria-hidden="true">*</span>
        @endif
    </label>
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @if ($required) required @endif
        aria-invalid="{{ $errors->has($name) ? 'true' : 'false' }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-2xl border-2 border-sunshine bg-white px-4 py-2.5 font-semibold text-ink focus:border-peach focus:ring-4 focus:ring-peach/20 ' . ($errors->has($name) ? 'border-error' : ''),
        ]) }}
    >
        {{ $slot }}
    </select>
    <x-error :name="$name" />
</div>
