@props(['tone' => 'mint'])

@php
$tones = [
    'mint' => 'bg-mint/40 text-navy',
    'peach' => 'bg-peach/20 text-peach-dark',
    'sunshine' => 'bg-sunshine/70 text-navy',
    'success' => 'bg-green-100 text-green-800',
    'warning' => 'bg-amber-100 text-amber-800',
    'error' => 'bg-red-100 text-red-700',
];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full px-3 py-1 text-xs font-extrabold ' . ($tones[$tone] ?? $tones['mint'])]) }}>
    {{ $slot }}
</span>
