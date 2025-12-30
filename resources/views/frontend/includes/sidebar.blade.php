<div class="sidebar">
    <div class="logo mt-2">
        <img src="{{ asset('assets/images/xsteamplay.png') }}" class="brand">
    </div>

    <ul class="menu">
        <li><a href="{{ url('/') }}"><i class="bi bi-house"></i><span>Home</span></a></li>
        <li><a href="{{ url('/search') }}"><i class="bi bi-search"></i><span>Search</span></a></li>
        <li><a href="{{ url('/ott') }}"><i class="bi bi-layers"></i><span>OTTs</span></a></li>
        <li><a href="{{ url('/free') }}"><i class="bi bi-play-circle"></i><span>Free</span></a></li>
        <li><a href="{{ url('/myplan') }}"><i class="bi bi-play-btn"></i><span>My Plans</span></a></li>

        @auth
            <li>
                <a href="{{ url('/profile') }}">
                    <i class="bi bi-person-circle"></i><span>Profile</span>
                </a>
            </li>
        @else
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="bi bi-box-arrow-in-right"></i><span>Log In</span>
                </a>
            </li>
        @endauth

        <li>
            <a href="https://play.google.com/store/apps/details?id=tv.accedo.airtel.wynk" target="_blank">
                <i class="bi bi-phone"></i><span>Get App</span>
            </a>
        </li>
    </ul>
</div>
