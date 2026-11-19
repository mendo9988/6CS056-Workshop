@extends('layouts.app')

@section('title', 'Student Details')
@section('heading', 'Student Details')
@section('subtitle', 'A full look at this student record.')

@section('content')
    <x-card class="mx-auto max-w-2xl">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">ID</dt>
                <dd class="mt-1 font-extrabold text-navy">{{ $student->id }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Name</dt>
                <dd class="mt-1 font-extrabold text-navy">{{ $student->name }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Email</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $student->email }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Phone</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $student->phone }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4 sm:col-span-2">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Address</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $student->address ?: '—' }}</dd>
            </div>
            <div class="rounded-2xl bg-cream/80 p-4 sm:col-span-2">
                <dt class="text-xs font-extrabold uppercase tracking-wide text-navy/60">Date of Birth</dt>
                <dd class="mt-1 font-semibold text-navy">{{ $student->date_of_birth ?: '—' }}</dd>
            </div>
        </dl>

        <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
            <x-button-outline href="/students">Back to Students</x-button-outline>
            <x-button href="/students/{{ $student->id }}/edit">Edit Student</x-button>
        </div>
    </x-card>
@endsection
