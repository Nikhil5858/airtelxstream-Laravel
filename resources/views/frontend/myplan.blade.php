@extends('frontend.layouts.master')

@section('title', 'My Plans')

@section('content')

    <div class="myplan-page p-5 ms-5">
        <div class="main-plan-wrapper p-4 mb-5">
            <h3 class="text-light fw-bold mb-1">My Plans</h3>
            <p class="text-secondary small mb-4">
                One Stop For All Your Favourite OTT Subscription
            </p>

            <div class="text-center mb-5">
                <a
                    href="https://www.airtel.in/new-connection/broadband/?price=499&utm_source=xstream&utm_campaign=bb_acq_xstream_continue_watch_web">
                    <img src="{{ asset('assets/images/myplan/wifi-banner.webp') }}" class="img-fluid rounded-2 wifi-banner" />
                </a>
            </div>

            <h3 class="text-light fw-bold">Choose Your Plan</h3>

            @if ($plans->isEmpty())
                <p class="text-light">No plans available</p>
            @endif

            <div class="inner-plan-cards">

                @foreach ($plans as $plan)
                    <div class="plan-card d-flex justify-content-center mt-2">
                        <div class="plan-card p-4">

                            <span class="badge trending-badge mb-3">
                                TRENDING OFFER
                            </span>

                            <h4 class="text-light fw-bold mb-2">
                                {{ $plan->plan_name }}
                                for
                                <span class="new-price">₹{{ $plan->price }}</span>
                            </h4>

                            <p class="text-secondary small mb-3">
                                Valid for {{ $plan->duration_days }} days • Auto Renews • Cancel Anytime
                            </p>

                            {{-- ICONS (UNCHANGED) --}}
                            <div class="d-flex gap-3 align-items-center mb-3">
                                <img src="{{ asset('assets/images/myplan/plan1.webp') }}" class="ott-icon" />
                                <img src="{{ asset('assets/images/myplan/plan2.webp') }}" class="ott-icon" />
                                <img src="{{ asset('assets/images/myplan/plan3.webp') }}" class="ott-icon" />
                            </div>

                            <h6 class="text-secondary text-uppercase small mb-2">
                                + XSTREAM PLAY (21+ OTTs)
                            </h6>

                            {{-- GRID (UNCHANGED) --}}
                            <div class="ott-grid mb-4">
                                @for ($i = 4; $i <= 19; $i++)
                                    <img src="{{ asset('assets/images/myplan/plan' . $i . '.webp') }}">
                                @endfor
                            </div>

                            <form method="POST" action="{{ url('/myplan/subscribe') }}">
                                @csrf
                                <input type="hidden" name="subscription_id" value="{{ $plan->id }}">
                                <button class="subscribe-btn w-100 py-2">
                                    Subscribe Now for ₹{{ $plan->price }}
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('frontend.includes.upper_footer')

@endsection
