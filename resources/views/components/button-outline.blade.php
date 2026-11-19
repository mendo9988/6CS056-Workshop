@props([
    'href' => null,
    'type' => 'button',
])

<x-button :href="$href" variant="outline" :type="$type" {{ $attributes }}>
    {{ $slot }}
</x-button>
