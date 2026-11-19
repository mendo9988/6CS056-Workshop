@extends('layouts.app')

@section('title', 'Edit Student')
@section('heading', 'Edit Student')
@section('subtitle', 'Update details for this student record.')

@section('content')
    <x-card class="mx-auto max-w-2xl">
        <form action="/students/{{ $student->id }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <x-input name="name" label="Name" :value="old('name', $student->name)" placeholder="Full name" required autocomplete="name" />
            <x-input name="email" label="Email" type="email" :value="old('email', $student->email)" placeholder="name@example.com" required autocomplete="email" />
            <x-input name="phone" label="Phone" :value="old('phone', $student->phone)" placeholder="Phone number" required autocomplete="tel" />
            <x-textarea name="address" label="Address" :value="old('address', $student->address)" placeholder="Street, city (optional)" />
            <x-input name="date_of_birth" label="Date of Birth" type="date" :value="old('date_of_birth', $student->date_of_birth)" />

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
                <x-button-outline href="/students" type="button">Back to Students</x-button-outline>
                <x-button type="submit">Update Student</x-button>
            </div>
        </form>
    </x-card>
@endsection
