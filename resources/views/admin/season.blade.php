@extends('admin.layouts.master')

@section('title', 'Seasons')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Seasons</h3>
                    <p class="text-muted">Manage seasons</p>
                </div>

                <button class="btn btn-primary d-flex align-items-center mt-2" data-bs-toggle="modal"
                    data-bs-target="#addSeasonModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Season
                </button>
            </div>

            <!-- SEARCH -->
            <div class="card p-3 mt-3">
                <div class="search-input-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="seasonSearch" class="form-control search-input"
                        placeholder="Search seasons...">
                </div>
            </div>

            <!-- TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Season Name</th>
                            <th>Season No</th>
                            <th>Total Episodes</th>
                            <th>Ott</th>
                            <th>Genre</th>
                            <th>Release Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="seasonTable">
                        @foreach ($seasons as $s)
                            <tr>
                                <td>
                                    <strong>{{ $s->movie?->title ?? '-' }}</strong>
                                </td>
                                <td>{{ $s->season_number }}</td>
                                <td>{{ $s->episode_number }}</td>
                                <td>{{ $s->ott?->name ?? '-' }}</td>
                                <td>{{ $s->genre?->name ?? '-' }}</td>
                                <td>{{ $s->release_year }}</td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $s->id }}"
                                        data-movie="{{ $s->movie_id }}" data-season="{{ $s->season_number }}"
                                        data-episodes="{{ $s->episode_number }}" data-genre="{{ $s->genre_id }}"
                                        data-ott="{{ $s->ott_id }}" data-year="{{ $s->release_year }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $s->id }}"
                                        data-name="Season {{ $s->season_number }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ADD MODAL -->
            <div class="modal fade" id="addSeasonModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add Season</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="POST" action="{{ route('admin.season.store') }}">
                            @csrf
                            <div class="modal-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Series</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>

                                <select name="movie_id" class="form-select mb-3" data-required="true"
                                    data-error="Series is required">
                                    <option value="">Select Series</option>
                                    @foreach ($movies as $m)
                                        <option value="{{ $m->id }}" data-genre="{{ $m->genre_id }}"
                                            data-ott="{{ $m->ott_id }}">
                                            {{ $m->title }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Season Number</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <input type="number" name="season_number" class="form-control mb-3" data-required="true"
                                    min="1">

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Total Episodes</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <input type="number" name="episode_number" class="form-control mb-3" data-required="true"
                                    min="1">

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Genre</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <select name="genre_id" class="form-select mb-3">
                                    <option value="">Select Genre</option>
                                    @foreach ($genres as $g)
                                        <option value="{{ $g->id }}">{{ $g->name }}</option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">OTT Provider</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <select name="ott_id" class="form-select mb-3">
                                    <option value="">Select OTT</option>
                                    @foreach ($otts as $o)
                                        <option value="{{ $o->id }}">{{ $o->name }}</option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Release Year</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <input type="number" name="release_year" class="form-control" min="1900"
                                    max="{{ date('Y') + 5 }}">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary">Add Season</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- EDIT MODAL -->
            <div class="modal fade" id="editSeasonModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Season</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="POST" id="editSeasonForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">

                                <input type="hidden" name="id" id="editSeasonId">

                                <label class="form-label">Series</label>
                                <select name="movie_id" id="editMovieId" class="form-select mb-3">
                                    @foreach ($movies as $m)
                                        <option value="{{ $m->id }}">{{ $m->title }}</option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Season Number</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <input type="number" name="season_number" id="editSeasonNumber" data-required="true"
                                    data-error="Season Season Number is required" class="form-control mb-3"
                                    min="1">

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Total Episodes</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <input type="number" name="episode_number" id="editEpisodes" data-required="true"
                                    data-error="Season Total Episodes is required" class="form-control mb-3"
                                    min="1">

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Genre</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <select name="genre_id" id="editGenreId" class="form-select mb-3" data-required="true"
                                    data-error="Season Genre is required">
                                    <option value="">Select Genre</option>
                                    @foreach ($genres as $g)
                                        <option value="{{ $g->id }}">{{ $g->name }}</option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">OTT Provider</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <select name="ott_id" id="editOttId" class="form-select mb-3" data-required="true"
                                    data-error="Season OTT Provider is required">
                                    <option value="">Select OTT</option>
                                    @foreach ($otts as $o)
                                        <option value="{{ $o->id }}">{{ $o->name }}</option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between align-items-center">
                                    <label class="form-label">Release Year</label>
                                    <span class="error-message text-danger small d-none"></span>
                                </div>
                                <input type="number" name="release_year" id="editReleaseYear" data-required="true"
                                    data-error="Season Release Year is required" class="form-control">
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
            <div class="modal fade" id="deleteSeasonModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title text-danger">Delete Season</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form method="POST" id="deleteSeasonForm" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">

                                <input type="hidden" name="id" id="deleteSeasonId">

                                <p>Are you sure you want to delete this season?</p>
                                <p class="fw-bold text-danger mb-0" id="deleteSeasonName"></p>

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
        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", () => {

                const id = btn.dataset.id;

                editSeasonId.value = id;
                editMovieId.value = btn.dataset.movie;
                editSeasonNumber.value = btn.dataset.season;
                editEpisodes.value = btn.dataset.episodes;
                editGenreId.value = btn.dataset.genre || '';
                editOttId.value = btn.dataset.ott || '';
                editReleaseYear.value = btn.dataset.year;

                document.getElementById('editSeasonForm').action =
                    `/admin/season/${id}`;

                new bootstrap.Modal(editSeasonModal).show();
            });
        });


        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", () => {

                const id = btn.dataset.id;

                deleteSeasonId.value = id;
                deleteSeasonName.innerText = btn.dataset.name;

                document.getElementById('deleteSeasonForm').action =
                    `/admin/season/${id}`;

                new bootstrap.Modal(deleteSeasonModal).show();
            });
        });

        /* SEARCH */
        document.getElementById("seasonSearch").addEventListener("keyup", function() {
            const keyword = this.value.toLowerCase().trim();
            document.querySelectorAll("#seasonTable tr").forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(keyword) ? "" : "none";
            });
        });

        document.querySelector('select[name="movie_id"]').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];

            const genreId = selected.dataset.genre;
            const ottId = selected.dataset.ott;

            if (genreId) {
                document.querySelector('select[name="genre_id"]').value = genreId;
            }

            if (ottId) {
                document.querySelector('select[name="ott_id"]').value = ottId;
            }
        });
    </script>

    </div>
    </div>

@endsection
