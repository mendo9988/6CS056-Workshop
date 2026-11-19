@if (session('success'))
    <div class="mb-5 rounded-2xl border-2 border-green-300 bg-green-50 px-4 py-3 font-bold text-green-800" role="status">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-5 rounded-2xl border-2 border-red-300 bg-red-50 px-4 py-3 font-bold text-red-700" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-5 rounded-2xl border-2 border-red-300 bg-red-50 px-4 py-3 text-red-700" role="alert">
        <p class="font-extrabold">Please fix the following errors:</p>
        <ul class="mt-2 list-disc space-y-1 pl-5 font-semibold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
