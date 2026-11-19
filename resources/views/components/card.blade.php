@props(['title' => null])

<section {{ $attributes->merge(['class' => 'rounded-3xl border-2 border-sunshine bg-white/90 p-5 shadow-sm sm:p-6']) }}>
    @if ($title)
        <h2 class="mb-4 font-display text-xl font-semibold text-navy">{{ $title }}</h2>
    @endif
    {{ $slot }}
</section>
