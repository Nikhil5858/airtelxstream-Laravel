@if ($banners->isNotEmpty())
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-inner">

            @foreach ($banners as $index => $movie)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                    <img src="{{ $movie->banner_url }}" class="d-block w-100 hero-slide-img">

                    <div class="hero-overlay"></div>

                    <div class="hero-content">
                        <div class="hero-left">
                            <h2 class="hero-title">{{ $movie->title }}</h2>

                            <div class="hero-tags">
                                @if ($movie->language)
                                    <span class="hero-tag">{{ $movie->language }}</span>
                                    <span class="hero-dot">•</span>
                                @endif

                                @if ($movie->genre)
                                    <span class="hero-tag">{{ $movie->genre->name }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="hero-right">
                            @if ($movie->in_watchlist > 0)
                                <button class="watchlist-btn added" disabled>
                                    ✓ Added
                                </button>
                            @else
                                <button class="watchlist-btn" data-movie-id="{{ $movie->id }}">
                                    <span>+</span> Add To Watchlist
                                </button>
                            @endif

                            @if ($movie->movie_url)
                                <a href="{{ $movie->movie_url }}">
                                    <button class="hero-watchnow-btn">▶ Watch Now</button>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

        <button class="hero-arrow hero-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <i>&lt;</i>
        </button>

        <button class="hero-arrow hero-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <i>&gt;</i>
        </button>
    </div>
@endif
