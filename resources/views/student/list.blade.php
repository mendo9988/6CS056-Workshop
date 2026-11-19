@extends('layouts.app')

@section('title', 'Students')
@section('heading', 'Student Record')
@section('subtitle', 'Browse, edit, and keep student details in one place.')

@section('content')
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <x-button-outline href="/students/create">Create Student →</x-button-outline>
        <x-badge tone="sunshine">{{ $students->count() }} {{ \Illuminate\Support\Str::plural('student', $students->count()) }}</x-badge>
    </div>

    @if ($students->isEmpty())
        <x-empty-state title="No students found." message="Create the first student record to fill this table.">
            <x-button href="/students/create">Create Student →</x-button>
        </x-empty-state>
    @else
        <div class="space-y-4 md:hidden">
            @foreach ($students as $student)
                <x-card>
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="font-display text-lg text-navy">{{ $student->name }}</p>
                            <p class="text-sm font-semibold text-navy/70">{{ $student->email }}</p>
                            <p class="mt-1 text-sm font-semibold text-navy/70">{{ $student->phone }}</p>
                        </div>
                        <x-badge>ID {{ $student->id }}</x-badge>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <x-button-outline href="/students/{{ $student->id }}">View</x-button-outline>
                        <x-button href="/students/{{ $student->id }}/edit">Edit →</x-button>
                        <form action="/students/{{ $student->id }}" method="POST" class="inline" onsubmit="return confirm('Delete this student record?')">
                            @csrf
                            @method('DELETE')
                            <x-button variant="danger" type="submit">Delete →</x-button>
                        </form>
                    </div>
                </x-card>
            @endforeach
        </div>

        <x-table class="hidden md:block">
            <thead>
                <tr class="bg-sunshine text-navy">
                    <th class="px-4 py-3 font-extrabold">ID</th>
                    <th class="px-4 py-3 font-extrabold">Name</th>
                    <th class="px-4 py-3 font-extrabold">Email</th>
                    <th class="px-4 py-3 font-extrabold">Phone</th>
                    <th class="px-4 py-3 font-extrabold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border-t-2 border-sunshine/70 odd:bg-cream/40 even:bg-white hover:bg-mint/20">
                        <td class="px-4 py-3 font-bold text-navy">{{ $student->id }}</td>
                        <td class="px-4 py-3 font-extrabold text-navy">{{ $student->name }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $student->email }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $student->phone }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <x-button-outline href="/students/{{ $student->id }}">View</x-button-outline>
                                <x-button href="/students/{{ $student->id }}/edit">Edit →</x-button>
                                <form action="/students/{{ $student->id }}" method="POST" class="inline" onsubmit="return confirm('Delete this student record?')">
                                    @csrf
                                    @method('DELETE')
                                    <x-button variant="danger" type="submit">Delete →</x-button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    @endif
@endsection
