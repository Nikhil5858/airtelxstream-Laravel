@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-6 text-center">

                {{-- Logo --}}
                <div>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="max-width: 160px;">
                </div>

                {{-- Error Code --}}
                <h1 class="display-1 fw-bold text-danger">404</h1>

                {{-- Message --}}
                <h4 class="mb-3">Page Not Found</h4>
                <p class="text mb-4">
                    The page you are looking for doesn’t exist or may have been moved.
                </p>

                {{-- Actions --}}
                <div class="d-flex justify-content-center gap-3" style="margin-bottom:500px;">
                    <a href="{{ url('/') }}" class="btn btn-primary px-4">
                        Go to Home
                    </a>

                    <button onclick="history.back()" class="btn btn-outline-secondary px-4">
                        Go Back
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
