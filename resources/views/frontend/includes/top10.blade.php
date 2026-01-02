@foreach ($sections as $section)
    @if ($section->type !== 'top10' || $section->movies->isEmpty())
        @continue
    @endif

    <div class="top10-section mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-white m-0">
                {{ $section->title }}
            </h3>

            <a href="{{ url('/seeall/section/' . $section->id) }}" class="text-white">
                See All
            </a>
        </div>

        <div class="top10-scroll-container">
            <div class="top10-scroller">
                <div class="top10-scroll-inner">

                    @foreach ($section->movies as $index => $movie)
                        <div class="top10-card-wrapper ms-4">
                            <a href="{{ url('/movie/show/' . $movie->id) }}" class="movie-link">

                                <div class="top10-number">
                                    {{ $index + 1 }}
                                </div>

                                <div class="top10-card ms-3">
                                    <img src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }}">

                                    <div class="top10-overlay">
                                        <h5 class="top10-title">
                                            {{ $movie->title }}
                                        </h5>

                                        <div class="top10-badges">
                                            <span class="top10-badge age">U/A 13+</span>
                                            <span class="top10-badge type">
                                                {{ ucfirst($movie->type) }}
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
        </div>
    </div>
@endforeach
