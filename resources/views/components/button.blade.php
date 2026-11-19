@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'submit',
])

@php
$variants = [
    'primary' => 'bg-peach text-white shadow-[0_4px_0_#f06e18] hover:bg-peach-dark active:translate-y-0.5 active:shadow-none',
    'secondary' => 'bg-sunshine text-navy shadow-[0_4px_0_#f5c400] hover:bg-sunshine-dark active:translate-y-0.5 active:shadow-none',
    'outline' => 'border-2 border-navy bg-white text-navy hover:bg-cream',
    'danger' => 'bg-error text-white shadow-[0_4px_0_#b91c1c] hover:bg-red-600 active:translate-y-0.5 active:shadow-none',
    'ghost' => 'bg-transparent text-navy hover:bg-cream',
];
$classes = 'cartoon-btn ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
