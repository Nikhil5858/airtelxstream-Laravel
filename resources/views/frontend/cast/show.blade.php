@extends('frontend.layouts.master')

@section('title', 'Movie cast')

@section('content')

    <div class="person-details-section mt-4">

        <div class="container d-flex align-items-start justify-content-between person-details-wrapper">

            <div class="person-left">

                <a href="javascript:history.back()" class="back-btn">
                    <i class="bi bi-arrow-left text-white"></i>
                </a>

                <h1 class="person-name">
                    {{ $cast->name }}
                </h1>

                <p class="person-dob">
                    Born: {{ \Carbon\Carbon::parse($cast->date_of_birth)->format('F d, Y') }}
                </p>

                <p class="person-bio">
                    {!! nl2br(e($cast->bio)) !!}
                </p>

            </div>

            <div class="person-right">
                <img src="{{ asset($cast->profile_image_url) }}" class="person-photo"
                    alt="{{ $cast->name }}">
            </div>

        </div>

    </div>
@endsection
