@props(['paginator' => null])

@if ($paginator)
    <div class="mt-6">
        {{ $paginator->links() }}
    </div>
@elseif ($slot->isNotEmpty())
    <div class="mt-6">
        {{ $slot }}
    </div>
@endif
