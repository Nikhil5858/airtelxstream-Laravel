<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Airtel Xstream')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/xsteamplay.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @stack('styles')
</head>

<body>

    <div class="page-bg">

        {{-- Sidebar --}}
        @include('frontend.includes.sidebar')

        <div class="sidebar-fade"></div>
        <div class="main-content">

            <main class="frontend-content">
                @yield('content')
            </main>

            {{-- Upper footer --}}
            @include('frontend.includes.upper_footer')

        </div>

        {{-- Footer --}}
        @include('frontend.includes.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @stack('scripts')
</body>

</html>
