@extends('admin.layouts.auth')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-sm border-0 rounded-3" style="max-width: 420px; width:100%">

            <div class="card-body p-4">

                <div class="text-center">
                    <img src="{{ asset('assets/images/logo.png') }}" style="max-width:150px">
                </div>

                <h4 class="text-center fw-semibold">Admin Login</h4>
                <p class="text-center text-muted mb-4">Enter your credentials</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <label class="mb-2">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    <label class="mb-2 mt-2">Password:</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    <button class="btn btn-primary w-100 mt-3">Login</button>
                </form>

            </div>
        </div>
    </div>
@endsection
