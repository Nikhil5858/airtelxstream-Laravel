<div class="category-wrapper py-3 mt-2">
    <div class="container">
        <div class="category-buttons">

            @php
                $visibleLimit = 8;
                $visibleGenres = $genres->take($visibleLimit);
                $moreGenres = $genres->slice($visibleLimit);
            @endphp

            @foreach ($visibleGenres as $g)
                <a href="{{ route('genre.show', $g->id) }}" class="category-btn">
                    {{ $g->name }}
                </a>
            @endforeach

            @if ($moreGenres->isNotEmpty())
                <div class="dropdown">
                    <button class="category-btn dropdown-toggle" data-bs-toggle="dropdown">
                        See More
                    </button>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach ($moreGenres as $g)
                            <li>
                                <a href="{{ route('genre.show', $g->id) }}" class="dropdown-item">
                                    {{ $g->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>
