@extends('layouts.app')

@section('title', $course->name)
@section('heading', 'Course Details')
@section('subtitle', 'A full look at this course.')

@section('content')
    <x-card class="mx-auto max-w-3xl">
        <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
            <h2 class="font-display text-2xl text-navy">{{ $course->name }}</h2>
            <x-badge :tone="$course->is_active ? 'success' : 'warning'">
                {{ $course->is_active ? 'Active' : 'Inactive' }}
            </x-badge>
        </div>

        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-2xl bg-cream/80 p-4 sm:col-span-2">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Description</dt>
                <dd class="mt-1 whitespace-pre-line font-semibold text-navy">{{ $course->description }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Duration</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $course->duration }} weeks</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Fee</dt>
                <dd class="mt-1 font-semibold text-navy">{{ number_format((float) $course->fee, 2) }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Difficulty</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $course->difficulty }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Course ID</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $course->id }}</dd>
            </div>
        </dl>

        <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
            <x-button-outline :href="route('courses.index')">Back to Courses</x-button-outline>
            <x-button :href="route('courses.edit', $course)">Edit Course</x-button>
        </div>
    </x-card>
@endsection
