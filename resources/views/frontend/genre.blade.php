@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('content')

    <h2 class="text-white px-4 mt-3">
        {{ $genre->name }} Movies
    </h2>

    @foreach ($sections as $section)
        @if ($section->movies->isEmpty())
            @continue
        @endif

        @include('frontend.includes.section_slider', [
            'section' => $section,
            'movies' => $section->movies
        ])
    @endforeach

@endsection
