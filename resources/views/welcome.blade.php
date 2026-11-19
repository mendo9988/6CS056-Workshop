@extends('layouts.app')

@section('title', 'Home')
@section('heading', 'Training Institute')
@section('subtitle', 'A friendly place to manage students and courses.')

@section('content')
    <div class="space-y-8">
        <x-card class="bg-white/80 text-center sm:text-left">
            <div class="grid items-center gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div>
                    <p class="font-display text-3xl text-navy sm:text-4xl">Keep students and courses in one cheerful place.</p>
                    <p class="mt-3 max-w-xl font-semibold text-navy/70">
                        Create, view, edit, and delete student and course records with clear forms and lists.
                    </p>
                    <div class="mt-6 flex flex-col flex-wrap gap-3 sm:flex-row">
                        <x-button href="/students">View students →</x-button>
                        <x-button-outline href="/students/create">Create Student →</x-button-outline>
                        <x-button href="{{ route('courses.index') }}" variant="secondary">View courses →</x-button>
                        <x-button-outline href="{{ route('courses.create') }}">Create Course →</x-button-outline>
                    </div>
                </div>
                <div class="rounded-3xl border-2 border-sunshine bg-cream p-6 text-center">
                    <p class="font-display text-5xl text-peach">✎</p>
                    <p class="mt-2 font-extrabold text-navy">Ready when you are</p>
                    <p class="mt-1 text-sm font-semibold text-navy/70">Open either list to work with existing records, or add a new one.</p>
                </div>
            </div>
        </x-card>

        <div class="grid gap-4 md:grid-cols-3">
            <x-card title="Create">
                <p class="font-semibold text-navy/70">Keep student contact details in one organized record.</p>
            </x-card>
            <x-card title="Review">
                <p class="font-semibold text-navy/70">Review student and course details on desktop or a phone.</p>
            </x-card>
            <x-card title="Update">
                <p class="font-semibold text-navy/70">Edit a record or remove one that is no longer needed.</p>
            </x-card>
        </div>

        <x-card title="How it works">
            <ol class="grid gap-4 md:grid-cols-3">
                <li class="rounded-2xl bg-cream/80 p-4">
                    <p class="font-display text-xl text-navy">1. Add</p>
                    <p class="mt-1 font-semibold text-navy/70">Choose a student or course form and enter its details.</p>
                </li>
                <li class="rounded-2xl bg-cream/80 p-4">
                    <p class="font-display text-xl text-navy">2. Check</p>
                    <p class="mt-1 font-semibold text-navy/70">Open a student or course to see its full record.</p>
                </li>
                <li class="rounded-2xl bg-cream/80 p-4">
                    <p class="font-display text-xl text-navy">3. Keep tidy</p>
                    <p class="mt-1 font-semibold text-navy/70">Edit details or delete a record when needed.</p>
                </li>
            </ol>
        </x-card>

        <x-card class="text-center">
            <p class="font-display text-2xl text-navy">Open a record list</p>
            <p class="mt-2 font-semibold text-navy/70">Manage the student and course records in your institute catalogue.</p>
            <div class="mt-5 flex flex-col justify-center gap-3 sm:flex-row">
                <x-button href="/students">Go to Students →</x-button>
                <x-button-outline :href="route('courses.index')">Go to Courses →</x-button-outline>
            </div>
        </x-card>
    </div>
@endsection
