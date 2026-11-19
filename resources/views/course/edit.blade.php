@extends('layouts.app')

@section('title', 'Edit Course')
@section('heading', 'Edit Course')
@section('subtitle', 'Update the information for this course.')

@section('content')
    <x-card class="mx-auto max-w-2xl">
        @include('course._form', ['course' => $course])
    </x-card>
@endsection
