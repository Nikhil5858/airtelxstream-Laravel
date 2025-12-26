<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="icon" href="{{ asset('assets-admin/image/xsteamplay.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">
</head>
<body>

@include('admin.includes.navbar')
@include('admin.includes.sidebar')

<div class="admin-main-content">
    @yield('content')
</div>

<script src="{{ asset('assets-admin/js/main.js') }}"></script>
<script src="{{ asset('assets-admin/js/validation.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
