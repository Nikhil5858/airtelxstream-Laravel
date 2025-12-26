<nav class="navbar navbar-light bg-white shadow-sm px-3">
    <h3 class="mb-0">AirtelXstream</h3>

    <div class="ms-auto d-flex align-items-center">
        <span class="me-3 fw-semibold">{{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>
