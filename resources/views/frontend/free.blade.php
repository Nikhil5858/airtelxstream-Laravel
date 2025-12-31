@extends('frontend.layouts.master')

@section('title', 'Free')

@section('content')

    @include('frontend.includes.hero_slider', ['banners' => $banners])
    @include('frontend.includes.ott')
    @include('frontend.includes.wifi_banner')

    @foreach ($sections as $section)
        @if ($section->movies->isEmpty())
            @continue
        @endif

        <div class="movie-section mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-white m-0">
                    {{ $section->title }}
                </h3>

                <a href="{{ url('/seeall/section/' . $section->id) }}" class="text-white">
                    See All
                </a>
            </div>

            <div class="movie-scroll-container">
                <button class="scroll-btn left-btn">❮</button>

                <div class="movie-scroller">
                    <div class="movie-scroll-inner">

                        @foreach ($section->movies as $movie)
                            <div class="movie-card-wrapper">
                                <a href="{{ url('/movie/show/' . $movie->id) }}" class="movie-link">
                                    <div class="movie-card">

                                        <span class="free-badge">Free</span>

                                        <img src="{{ asset($movie->poster_url) }}">

                                        <div class="card-overlay">
                                            <h5 class="movie-title">
                                                {{ $movie->title }}
                                            </h5>

                                            <div class="badges">
                                                <span class="badge age">U/A 13+</span>
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

                <button class="scroll-btn right-btn">❯</button>
            </div>
        </div>
    @endforeach

@endsection
