@extends('layouts.app')

@section('title', 'Create Course')
@section('heading', 'Create Course')
@section('subtitle', 'Add a course to the institute catalogue.')

@section('content')
    <x-card class="mx-auto max-w-2xl">
        @include('course._form')
    </x-card>
@endsection
