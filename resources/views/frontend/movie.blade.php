@extends('frontend.layouts.master')

@section('title', 'Movie')

@section('content')
    <!-- ================= HERO ================= -->
    <div class="smv-hero">

        <div class="smv-bg" style="background-image: url('{{ asset($movie->banner_url) }}')">
        </div>

        <video class="smv-video" muted preload="none">
            <source src="{{ asset($movie->movie_url) }}" type="video/mp4">
        </video>

        <div class="smv-overlay"></div>

        <div class="container smv-content text-light">
            <h1 class="fw-bold display-4">{{ $movie->title }}</h1>

            <p class="smv-meta small text-white-50 mb-1">
                {{ $movie->certificate ?? 'U' }} |
                {{ $movie->genre->name ?? '' }} |
                {{ $movie->language }} |
                {{ $movie->release_year }}
            </p>

            @php
                $desc = \Illuminate\Support\Str::limit(strip_tags($movie->description), 180);
            @endphp

            <p class="smv-desc w-50 fs-6">
                {{ $desc }}
            </p>

            <p class="smv-audio small text-white-50">
                Audio Available in: {{ $movie->language }}
            </p>

            <div class="smv-actions d-flex gap-3 mt-3">
                <div class="hero-right">

                    @if ($movie->in_watchlist)
                        <button class="watchlist-btn added" disabled>
                            ✓ Added
                        </button>
                    @else
                        <button class="watchlist-btn" data-movie-id="{{ $movie->id }}">
                            <span>+</span> Add To Watchlist
                        </button>
                    @endif

                    @if ($movie->movie_url)
                        <a href="{{ asset($movie->movie_url) }}">
                            <button class="hero-watchnow-btn">▶ Watch Now</button>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- ================= TABS ================= -->
    <div class="smv-tabs-container mt-4">

        <div class="smv-tabs">
            @if ($movie->type === 'series')
                <button class="smv-tab active" data-target="#episodes">Episodes</button>
                <button class="smv-tab" data-target="#cast">Cast & More</button>
            @else
                <button class="smv-tab active" data-target="#about">About</button>
                <button class="smv-tab" data-target="#cast">Cast</button>
            @endif
        </div>

        <div class="smv-tab-underline mb-4"></div>

        <div class="smv-content-area">

            @if ($movie->type === 'series')
                <div id="episodes" class="smv-tab-content active">

                    <div class="eps-header">
                        <div class="eps-dropdown">
                            <div class="eps-selected">
                                Season {{ $seasons->first()->season_number }}
                                <i class="bi bi-caret-down-fill"></i>
                            </div>

                            <ul class="eps-list">
                                @foreach ($seasons as $s)
                                    <li data-season="{{ $s->id }}">
                                        Season {{ $s->season_number }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="eps-grid mt-4 mb-5">
                        @foreach ($episodes as $e)
                            <a href="{{ $e->video_url }}" class="eps-link" data-season="{{ $e->season_id }}">

                                <div class="eps-card">
                                    <img src="{{ asset($e->poster_img) }}">
                                    <div class="eps-info">
                                        <h5>Ep {{ $e->episode_number }}. {{ $e->title }}</h5>
                                    </div>
                                </div>

                            </a>
                        @endforeach
                    </div>

                </div>
            @endif
        </div>

    </div>

    <script>
        const tabs = document.querySelectorAll('.smv-tab');
        const contents = document.querySelectorAll('.smv-tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                tab.classList.add('active');
                document.querySelector(tab.dataset.target).classList.add('active');
            });
        });

        /* ================= HERO VIDEO ================= */
        const hero = document.querySelector('.smv-hero');
        const video = document.querySelector('.smv-video');
        const bg = document.querySelector('.smv-bg');

        if (hero && video && bg) {
            hero.addEventListener('mouseenter', () => {
                video.style.opacity = "1";
                bg.style.opacity = "0";
                video.currentTime = 0;
                video.play();
            });

            video.addEventListener('ended', () => {
                video.style.opacity = "0";
                bg.style.opacity = "1";
            });
        }

        const epsSelected = document.querySelector('.eps-selected');
        const seasonItems = document.querySelectorAll('.eps-list li');
        const epsLinks = document.querySelectorAll('.eps-link');

        function showSeason(seasonId) {
            epsLinks.forEach(link => {
                link.style.display =
                    link.dataset.season === seasonId ? 'block' : 'none';
            });
        }

        /* DEFAULT → FIRST SEASON */
        const firstSeason = seasonItems[0];
        epsSelected.innerHTML =
            firstSeason.textContent + ' <i class="bi bi-caret-down-fill"></i>';

        showSeason(firstSeason.dataset.season);

        /* DROPDOWN */
        const epsList = document.querySelector('.eps-list');
        epsList.style.display = 'none';

        epsSelected.addEventListener('click', e => {
            e.stopPropagation();
            epsList.style.display =
                epsList.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', () => {
            epsList.style.display = 'none';
        });

        /* SEASON SWITCH */
        seasonItems.forEach(item => {
            item.addEventListener('click', () => {
                epsSelected.innerHTML =
                    item.textContent + ' <i class="bi bi-caret-down-fill"></i>';

                showSeason(item.dataset.season);
                epsList.style.display = 'none';
            });
        });
    </script>

    @include('frontend.includes.upper_footer')
@endsection
