@extends('frontend.layouts.master')

@section('title', 'Ott')

@section('content')
    <div class="ott-hero">
        <img src="{{ asset('assets/images/ott/singleott1.webp') }}" class="ott-hero-bg">

        <div class="ott-hero-overlay">
            <img src="{{ asset($ott->logo_url) }}" class="ott-hero-logo">

            <h1 class="ott-hero-title">
                Get {{ $ott->name }}<br>Subscription to Watch
            </h1>

            <a href="{{ route('myplan') }}">
                <button class="ott-hero-btn">See Subscription Plans</button>
            </a>
        </div>
    </div>

    @if ($movies->isEmpty())
        <p class="text-white text-center mt-5 mb-5">No movies available</p>
    @else
        <div class="movie-section mt-3">

            <h3 class="text-white m-0">{{ $ott->name }} Movies</h3>

            <div class="movie-scroll-container">
                <button class="scroll-btn left-btn">❮</button>

                <div class="movie-scroller">
                    <div class="movie-scroll-inner">

                        @foreach ($movies as $movie)
                            <div class="movie-card-wrapper">
                                <a href="{{ url('/movie/show?id=' . $movie->id) }}" class="movie-link">
                                    <div class="movie-card">

                                        @if ($movie->is_free)
                                            <span class="free-badge">Free</span>
                                        @endif

                                        <img src="{{ asset($movie->poster_url) }}">

                                        <div class="card-overlay">
                                            <h5 class="movie-title">{{ $movie->title }}</h5>

                                            <div class="badges">
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

                <button class="scroll-btn right-btn">❯</button>
            </div>
        </div>

    @endif
@endsection
