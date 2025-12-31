    <div class="sidebar">
        <div class="logo mt-2">
            <img src="{{ asset('assets/images/xsteamplay.png') }}" class="brand">
        </div>

        <ul class="menu">
            <li><a type="button" href="{{ route('dashboard') }}"><i class="bi bi-house"></i><span>Home</span></a></li>
            <li><a type="button" href="{{ route('search') }}"><i class="bi bi-search"></i><span>Search</span></a></li>
            <li><a type="button" href="{{ url('ott') }}"><i class="bi bi-layers"></i><span>OTTs</span></a></li>
            <li><a type="button" href="{{ route('free') }}"><i class="bi bi-play-circle"></i><span>Free</span></a></li>
            <li><a type="button" href="{{ route('myplan') }}"><i class="bi bi-play-btn"></i><span>My Plans</span></a>
            </li>

            @guest
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Log In</span>
                    </a>
                </li>
            @endguest

            @auth
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="bi bi-person-circle"></i>
                        <span>Profile</span>
                        {{-- <span>{{ auth()->user()->name }}</span> --}}
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
