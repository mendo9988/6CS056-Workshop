@props([
    'title' => 'Nothing here yet',
    'message' => 'Add a record to get started.',
])

<div {{ $attributes->merge(['class' => 'rounded-3xl border-2 border-dashed border-sunshine bg-cream/70 px-6 py-12 text-center']) }}>
    <p class="font-display text-2xl text-navy">{{ $title }}</p>
    <p class="mt-2 font-semibold text-navy/70">{{ $message }}</p>
    @if ($slot->isNotEmpty())
        <div class="mt-5 flex justify-center">
            {{ $slot }}
        </div>
    @endif
</div>
