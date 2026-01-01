@extends('frontend.layouts.master')

@section('title', 'Ott')

@section('content')

    <div class="text-center mx-3 mt-3 mb-3">
        <a href="{{ route('myplan') }}">
            <img src="{{ asset('assets/images/index/lionsgateselect.webp') }}" class="img-fluid rounded-2 wifi-banner">
        </a>
    </div>

    @foreach ($otts as $ott)
        <div class="ott-block mb-5 mt-4">

            <div class="d-flex align-items-center mb-4 ms-3">
                <img src="{{ asset($ott->logo_url) }}" class="section-icon" alt="{{ $ott->name }}">
                <h3 class="text-white ms-3 mb-0">
                    {{ $ott->name }}
                </h3>
            </div>

            <div class="movie-section mt-3">
                <div class="movie-scroll-inner">

                    @foreach ($ott->movies as $movie)
                        <div class="movie-card-wrapper">
                            <a href="{{ url('/movie/show?id=' . $movie->id) }}" class="movie-link">
                                <div class="movie-card">

                                    <img
                                        src="{{ asset(($movie->poster_url ?? 'default-poster.webp')) }}">

                                    <div class="card-overlay">
                                        <h5 class="movie-title">{{ $movie->title }}</h5>

                                        <div class="badges">
                                            <span class="badge age">U/A 13+</span>
                                            <span class="badge type">{{ $movie->type }}</span>
                                        </div>

                                        @if ($movie->in_watchlist)
                                            <button class="watchlist-btn added" disabled>✓ Added</button>
                                        @else
                                            <button class="watchlist-btn" data-movie-id="{{ $movie->id }}">
                                                <span>+</span> Add To Watchlist
                                            </button>
                                        @endif
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    @endforeach
@endsection
