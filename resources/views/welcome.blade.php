@extends('layouts.app')

@section('title', 'Home')
@section('heading', 'Student Record')
@section('subtitle', 'A friendly notebook for names, emails, and phone numbers.')

@section('content')
    <div class="space-y-8">
        <x-card class="bg-white/80 text-center sm:text-left">
            <div class="grid items-center gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div>
                    <p class="font-display text-3xl text-navy sm:text-4xl">Keep every student on one cheerful page.</p>
                    <p class="mt-3 max-w-xl font-semibold text-navy/70">
                        Create, view, edit, and delete student records with a simple form and a clear table. Nothing extra — just the details you already store.
                    </p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <x-button href="/students">View students →</x-button>
                        <x-button-outline href="/students/create">Create Student →</x-button-outline>
                    </div>
                </div>
                <div class="rounded-3xl border-2 border-sunshine bg-cream p-6 text-center">
                    <p class="font-display text-5xl text-peach">✎</p>
                    <p class="mt-2 font-extrabold text-navy">Ready when you are</p>
                    <p class="mt-1 text-sm font-semibold text-navy/70">Open the list to work with existing records, or add a new student.</p>
                </div>
            </div>
        </x-card>

        <div class="grid gap-4 md:grid-cols-3">
            <x-card title="Create">
                <p class="font-semibold text-navy/70">Add a name, email, phone, and optional address or date of birth.</p>
            </x-card>
            <x-card title="Review">
                <p class="font-semibold text-navy/70">Scan the table on desktop, or stacked cards on a phone.</p>
            </x-card>
            <x-card title="Update">
                <p class="font-semibold text-navy/70">Edit a record or remove one you no longer need.</p>
            </x-card>
        </div>

        <x-card title="How it works">
            <ol class="grid gap-4 md:grid-cols-3">
                <li class="rounded-2xl bg-cream/80 p-4">
                    <p class="font-display text-xl text-navy">1. Add</p>
                    <p class="mt-1 font-semibold text-navy/70">Use Create Student and fill in the form.</p>
                </li>
                <li class="rounded-2xl bg-cream/80 p-4">
                    <p class="font-display text-xl text-navy">2. Check</p>
                    <p class="mt-1 font-semibold text-navy/70">Open a student to see the full record.</p>
                </li>
                <li class="rounded-2xl bg-cream/80 p-4">
                    <p class="font-display text-xl text-navy">3. Keep tidy</p>
                    <p class="mt-1 font-semibold text-navy/70">Edit details or delete a record when needed.</p>
                </li>
            </ol>
        </x-card>

        <x-card class="text-center">
            <p class="font-display text-2xl text-navy">Start with the student list</p>
            <p class="mt-2 font-semibold text-navy/70">No extra accounts or invented workshop data — this site uses the student records you already have.</p>
            <div class="mt-5 flex justify-center">
                <x-button href="/students">Go to Student Record →</x-button>
            </div>
        </x-card>
    </div>
@endsection
