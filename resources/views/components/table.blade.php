<div {{ $attributes->merge(['class' => 'w-full overflow-x-auto rounded-3xl border-2 border-sunshine bg-white/95 shadow-sm']) }}>
    <table class="w-full min-w-[640px] border-collapse text-left">
        {{ $slot }}
    </table>
</div>
