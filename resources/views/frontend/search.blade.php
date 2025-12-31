@extends('frontend.layouts.master')

@section('title', 'Search')

@section('content')

    <div class="search-container">
        <i class="search-icon bi bi-search"></i>
        <input type="text" id="searchInput" placeholder="Search for movies, shows, channels..." autocomplete="off" />
    </div>

    <hr>

    <div class="live-section mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-white m-0">
                <i class="bi bi-arrow-up-right"></i> Trending
            </h3>
        </div>

        <div class="live-scroll-container">
            <button class="scroll-btn left-btn">❮</button>

            <div class="live-scroller">
                <div id="searchLoader" class="text-center my-4 d-none">
                    <div class="spinner-border text-light" role="status"></div>
                </div>

                <div class="live-scroll-inner" id="searchResults">

                    @foreach ($trending as $movie)
                        <div class="live-card-wrapper">
                            <a href="{{ url('/movie/show/' . $movie->id) }}" class="movie-link">
                                <div class="live-card">
                                    <img src="{{ asset($movie->banner_url) }}">

                                    <div class="live-overlay">
                                        <h5 class="live-title">{{ $movie->title }}</h5>

                                        <div class="live-badges">
                                            <span class="badge live">Trending</span>
                                            <span class="badge type">{{ $movie->type }}</span>
                                        </div>
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

    <div class="tempmargin" style="margin-top: 500px;"></div>


    @include('frontend.includes.upper_footer')

    <script>
        const input = document.getElementById("searchInput");
        const resultsBox = document.getElementById("searchResults");
        const loader = document.getElementById("searchLoader");

        const defaultHTML = resultsBox.innerHTML;
        let timer = null;

        input.addEventListener("keyup", () => {
            clearTimeout(timer);

            const q = input.value.trim();

            if (q.length === 0) {
                loader.classList.add("d-none");
                resultsBox.innerHTML = defaultHTML;
                return;
            }

            if (q.length < 2) return;

            loader.classList.remove("d-none");
            resultsBox.innerHTML = "";

            timer = setTimeout(() => {
                fetch("{{ route('search.results') }}?q=" + encodeURIComponent(q))
                    .then(res => res.json())
                    .then(data => {

                        loader.classList.add("d-none");
                        resultsBox.innerHTML = "";

                        if (data.length === 0) {
                            resultsBox.innerHTML =
                                "<p class='text text-center'>No results found</p>";
                            return;
                        }

                        data.forEach(movie => {
                            resultsBox.innerHTML += `
                            <a href="{{ url('/movie/show') }}/${movie.id}" class="movie-link">
                                <div class="live-card-wrapper">
                                    <div class="live-card">
                                        <img src="{{ asset($movie->banner_url) }}">
                                        <div class="live-overlay">
                                            <h5 class="live-title">${movie.title}</h5>
                                            <div class="live-badges">
                                                <span class="badge type">${movie.type}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `;
                        });
                    })
                    .catch(() => {
                        loader.classList.add("d-none");
                        resultsBox.innerHTML =
                            "<p class='text-danger text-center'>Search failed</p>";
                    });
            }, 300);
        });
    </script>

@endsection
