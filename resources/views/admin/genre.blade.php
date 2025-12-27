@extends('admin.layouts.master')

@section('title', 'Genre')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Genres</h3>
                    <p class="text-muted">Manage movie genres</p>
                </div>

                <button class="btn btn-primary d-flex align-items-center mt-2" data-bs-toggle="modal"
                    data-bs-target="#addGenreModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Genre
                </button>
            </div>

            <!-- SEARCH -->
            <div class="card p-3 mt-3">
                <div class="search-input-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="genreSearch" class="form-control search-input" placeholder="Search genres...">
                </div>
            </div>

            <!-- TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Genre Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="genreTable">
                        @foreach ($genres as $g)
                            <tr>
                                <td>{{ $g->id }}</td>
                                <td><strong>{{ $g->name }}</strong></td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $g->id }}"
                                        data-name="{{ $g->name }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $g->id }}"
                                        data-name="{{ $g->name }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ADD MODAL -->
            <div class="modal fade" id="addGenreModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add Genre</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="POST" action="{{ route('admin.genre.store') }}">
                            @csrf

                            <div class="modal-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Genre Name</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>

                                <input type="text" name="name" class="form-control" data-required="true"
                                    data-error="Genre name is required">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    Cancel
                                </button>

                                <button class="btn btn-primary">Add Genre</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- EDIT MODAL -->
            <div class="modal fade" id="editGenreModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Genre</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="POST" action="{{ route('admin.genre.update', '__ID__') }}" id="editGenreForm">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                <input type="hidden" name="id" id="editGenreId">

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Genre Name</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>

                                <input type="text" name="name" id="editGenreName" class="form-control"
                                    data-required="true" data-error="Genre name is required">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    Cancel
                                </button>

                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- DELETE MODAL -->
            <div class="modal fade" id="deleteGenreModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title text-danger">Delete Genre</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="POST" action="{{ route('admin.genre.delete', '__ID__') }}" id="deleteGenreForm">
                            @csrf
                            @method('DELETE')

                            <div class="modal-body">
                                <input type="hidden" name="id" id="deleteGenreId">

                                <p>Are you sure you want to delete this genre?</p>
                                <p class="fw-bold text-danger mb-0" id="deleteGenreName"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    Cancel
                                </button>

                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        /* EDIT */
        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                const id = btn.dataset.id;
                const name = btn.dataset.name;

                document.getElementById("editGenreId").value = id;
                document.getElementById("editGenreName").value = name;

                const form = document.getElementById("editGenreForm");
                form.action = form.action.replace('__ID__', id);

                new bootstrap.Modal(document.getElementById("editGenreModal")).show();
            });
        });

        /* DELETE */
        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                const id = btn.dataset.id;
                const name = btn.dataset.name;

                document.getElementById("deleteGenreId").value = id;
                document.getElementById("deleteGenreName").innerText = name;

                const form = document.getElementById("deleteGenreForm");
                form.action = form.action.replace('__ID__', id);

                new bootstrap.Modal(document.getElementById("deleteGenreModal")).show();
            });
        });

        /* SEARCH */
        const searchInput = document.getElementById("genreSearch");
        const rows = document.querySelectorAll("#genreTable tr");

        searchInput.addEventListener("keyup", function() {
            const keyword = this.value.toLowerCase().trim();

            rows.forEach(row => {
                const name = row.querySelector("td:nth-child(2)").innerText.toLowerCase();
                row.style.display = name.includes(keyword) ? "" : "none";
            });
        });
    </script>


@endsection
