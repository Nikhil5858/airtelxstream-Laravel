@extends('frontend.layouts.master')

@section('title', 'All Movies')

@section('content')

    <body class="seeall-page">

        <div class="movie-section mt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="text-white m-0">
                    {{ $title }}
                </h3>
            </div>

            <div class="movie-scroller">

                @if ($movies->isEmpty())
                    <p class="text-white text-center">No movies found</p>
                @endif

                @foreach ($movies as $movie)
                    <div class="movie-card-wrapper">
                        <a href="{{ url('/movie/show/' . $movie->id) }}" class="movie-link">
                            <div class="movie-card">

                                @if ($movie->is_free)
                                    <span class="free-badge">Free</span>
                                @endif

                                <img src="{{ asset($movie->poster_url) }}">

                                <div class="card-overlay">
                                    <h5 class="movie-title">
                                        {{ $movie->title }}
                                    </h5>

                                    <div class="badges">
                                        <span class="badge type">
                                            {{ $movie->type }}
                                        </span>
                                    </div>

                                    @if ($movie->in_watchlist)
                                        <button class="watchlist-btn added" disabled>
                                            ✓ Added
                                        </button>
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

    </body>

@endsection
