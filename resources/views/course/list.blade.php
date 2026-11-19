@extends('layouts.app')

@section('title', 'Courses')
@section('heading', 'Course Catalogue')
@section('subtitle', 'Browse and manage the courses offered by the institute.')

@section('content')
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <x-button-outline :href="route('courses.create')">Create Course →</x-button-outline>
        <x-badge tone="sunshine">{{ $courses->count() }} {{ \Illuminate\Support\Str::plural('course', $courses->count()) }}</x-badge>
    </div>

    @if ($courses->isEmpty())
        <x-empty-state title="No courses found." message="Create the first course to start the catalogue.">
            <x-button :href="route('courses.create')">Create Course →</x-button>
        </x-empty-state>
    @else
        <div class="space-y-4 md:hidden">
            @foreach ($courses as $course)
                <x-card>
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="font-display text-lg text-navy">{{ $course->name }}</p>
                            <p class="mt-1 text-sm font-semibold text-navy/70">{{ \Illuminate\Support\Str::limit($course->description, 120) }}</p>
                        </div>
                        <x-badge :tone="$course->is_active ? 'success' : 'warning'">
                            {{ $course->is_active ? 'Active' : 'Inactive' }}
                        </x-badge>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <x-badge>{{ $course->duration }} weeks</x-badge>
                        <x-badge tone="peach">{{ $course->difficulty }}</x-badge>
                        <x-badge tone="sunshine">Fee {{ number_format((float) $course->fee, 2) }}</x-badge>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <x-button-outline :href="route('courses.show', $course)">View</x-button-outline>
                        <x-button :href="route('courses.edit', $course)">Edit →</x-button>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline" onsubmit="return confirm('Delete this course?')">
                            @csrf
                            @method('DELETE')
                            <x-button variant="danger" type="submit">Delete →</x-button>
                        </form>
                    </div>
                </x-card>
            @endforeach
        </div>

        <div class="hidden overflow-x-auto md:block">
            <x-table>
                <thead>
                    <tr class="bg-sunshine text-navy">
                        <th scope="col" class="px-4 py-3 font-extrabold">ID</th>
                        <th scope="col" class="px-4 py-3 font-extrabold">Course</th>
                        <th scope="col" class="px-4 py-3 font-extrabold">Duration</th>
                        <th scope="col" class="px-4 py-3 font-extrabold">Fee</th>
                        <th scope="col" class="px-4 py-3 font-extrabold">Difficulty</th>
                        <th scope="col" class="px-4 py-3 font-extrabold">Status</th>
                        <th scope="col" class="px-4 py-3 font-extrabold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr class="border-t-2 border-sunshine/70 odd:bg-cream/40 even:bg-white hover:bg-mint/20">
                            <td class="px-4 py-3 font-bold text-navy">{{ $course->id }}</td>
                            <td class="px-4 py-3">
                                <p class="font-extrabold text-navy">{{ $course->name }}</p>
                                <p class="max-w-xs text-sm font-semibold text-navy/70">{{ \Illuminate\Support\Str::limit($course->description, 90) }}</p>
                            </td>
                            <td class="px-4 py-3 font-semibold">{{ $course->duration }} weeks</td>
                            <td class="px-4 py-3 font-semibold">{{ number_format((float) $course->fee, 2) }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $course->difficulty }}</td>
                            <td class="px-4 py-3">
                                <x-badge :tone="$course->is_active ? 'success' : 'warning'">
                                    {{ $course->is_active ? 'Active' : 'Inactive' }}
                                </x-badge>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap gap-2">
                                    <x-button-outline :href="route('courses.show', $course)">View</x-button-outline>
                                    <x-button :href="route('courses.edit', $course)">Edit →</x-button>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline" onsubmit="return confirm('Delete this course?')">
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
        </div>
    @endif
@endsection
