<div class="sidebar" id="sidebar">

    <div class="sidebar-brand d-flex justify-content-center">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="sidebar-logo">
    </div>

    <ul class="nav flex-column">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('admin.movies.index') }}" class="nav-link">
                <i class="bi bi-film"></i> Movies
            </a>
        </li>

        <li>
            <a href="{{ route('admin.homepage-sections.index') }}" class="nav-link">
                <i class="bi bi-layout-text-window-reverse"></i> Homepage Sections
            </a>
        </li>

        <li>
            <a href="{{ route('admin.seasons.index') }}" class="nav-link">
                <i class="bi bi-tv"></i> Seasons
            </a>
        </li>

        <li>
            <a href="{{ route('admin.episodes.index') }}" class="nav-link">
                <i class="bi bi-collection-play"></i> Episodes
            </a>
        </li>

        <li>
            <a href="{{ route('admin.ott.index') }}" class="nav-link">
                <i class="bi bi-app-indicator"></i> OTT Providers
            </a>
        </li>

        <li>
            <a href="{{ route('admin.genres.index') }}" class="nav-link">
                <i class="bi bi-tags"></i> Genres
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link">
                <i class="bi bi-people"></i> Users
            </a>
        </li> --}}

        <li>
            <a href="{{ route('admin.subscriptions') }}" class="nav-link">
                <i class="bi bi-cash-stack"></i> Subscriptions
            </a>
        </li> 

        {{-- Cast menu --}}
        <li class="nav-item">

            <a href="javascript:void(0)" class="nav-link d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" data-bs-target="#castMenu" aria-expanded="false">
                <span>
                    <i class="bi bi-people me-2"></i> Cast
                </span>
                <i class="bi bi-chevron-down small"></i>
            </a>

            <ul class="collapse nav flex-column ms-3" id="castMenu">
                {{-- <li>
                    <a href="{{ route('admin.cast-roles.index') }}" class="nav-link">
                        Cast Roles
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.cast.index') }}" class="nav-link">
                        Cast People
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.cast-content.index') }}" class="nav-link">
                        Movie Cast
                    </a>
                </li> --}}
            </ul>

        </li>

    </ul>

</div>

<div id="overlay"></div>
