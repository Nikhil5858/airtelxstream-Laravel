@extends('frontend.layouts.master')

@section('title', 'Profile')

@section('content')

    <div class="container py-4 profile-page">

        <div class="d-flex align-items-center gap-2 mb-4 phone-bar">
            <i class="bi bi-pencil fs-4"></i>
            <span class="phone-number">User Name : {{ $user->name }}</span>
        </div>

        <div class="row g-4 mb-1 justify-content-center">

            <div class="col-6 col-md-3">
                <a href="{{ route('myplan') }}">
                    <div class="profile-option-card">
                        <i class="bi bi-percent icon"></i>
                        <p class="title">Plans & Offers</p>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="{{ route('profile.help') }}">
                    <div class="profile-option-card">
                        <i class="bi bi-headset icon"></i>
                        <p class="title">Help Center</p>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="{{ route('profile.language') }}">
                    <div class="profile-option-card">
                        <i class="bi bi-translate icon"></i>
                        <p class="title">Language</p>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <form method="POST" action="{{ route('profile.logout') }}">
                    @csrf
                    <button class="profile-option-card w-100 border-0">
                        <i class="bi bi-box-arrow-right icon"></i>
                        <p class="title">Logout</p>
                    </button>
                </form>
            </div>

        </div>
    </div>

    @if ($watchlist->isNotEmpty())

        <div class="movie-section mt-4">
            <h3 class="text-white m-0">My Watchlist</h3>

            <div class="movie-scroll-container">
                <button class="scroll-btn left-btn">❮</button>

                <div class="movie-scroller">
                    <div class="movie-scroll-inner">

                        @foreach ($watchlist as $movie)
                            <div class="movie-card-wrapper">
                                <div class="movie-card">

                                    @if ($movie->is_free)
                                        <span class="free-badge">Free</span>
                                    @endif

                                    <img src="{{ asset($movie->poster_url) }}">

                                    <div class="card-overlay">
                                        <h5 class="movie-title">{{ $movie->title }}</h5>

                                        <div class="badges">
                                            <span class="badge age">U/A 13+</span>
                                            <span class="badge type">{{ $movie->type }}</span>
                                        </div>

                                        <button class="remove-watchlist-btn" data-id="{{ $movie->id }}">
                                            <i class="bi bi-x-lg"></i> Remove
                                        </button>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <button class="scroll-btn right-btn">❯</button>
            </div>
        </div>
    @else
        <!-- EMPTY WATCHLIST -->
        <div class="watchlist-empty text-center mt-4">
            <div class="watchlist-graphic mb-2">
                <i class="bi bi-tv watchlist-icon"></i>
                <i class="bi bi-plus-circle-fill watchlist-icon plus-icon"></i>
            </div>
            <h4 class="text-light mb-2">Your Watchlist will appear here</h4>
            <p class="text-secondary fs-6">
                Find movies & shows and add them to your Watchlist.
            </p>
        </div>

    @endif

    @include('frontend.includes.upper_footer')

    <script>
        document.querySelectorAll('.remove-watchlist-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();

                fetch("{{ route('watchlist.remove') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            movie_id: btn.dataset.id
                        })
                    })
                    .then(() => {
                        btn.closest('.movie-card-wrapper').remove();
                        if (!document.querySelector('.movie-card-wrapper')) {
                            location.reload();
                        }
                    });
            });
        });
    </script>

@endsection
