@extends('admin.layouts.master')

@section('title', 'Movie')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Movies</h3>
                    <p class="text-muted">Manage movies and OTT content</p>
                </div>

                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addMovieModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Movie
                </button>
            </div>

            <!-- MOVIES TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Poster</th>
                            <th>Title</th>  
                            <th>Description</th>
                            <th>Year</th>
                            <th>Ott</th>
                            <th>Language</th>
                            <th>Type</th>
                            <th>Genre</th>
                            <th>Free</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($movies) && count($movies))
                            @foreach ($movies as $m)
                                <tr>
                                    <td>
                                        @if ($m->poster_url)
                                            <img src="{{ $m->poster_url }}" width="45" class="rounded">
                                        @else
                                            —
                                        @endif
                                    </td>

                                    <td><strong>{{ $m->title }}</strong></td>

                                    @php
                                        $desc = strip_tags($m->description);
                                        $limit = 130;
                                        if (strlen($desc) > $limit) {
                                            $desc = substr($desc, 0, $limit) . '...';
                                        }
                                    @endphp

                                    <td>{{ $desc }}</td>
                                    <td>{{ $m->release_year }}</td>
                                    <td>{{ $m->ott?->name }}</td>
                                    <td>{{ $m->language }}</td>
                                    <td>{{ ucfirst($m->type) }}</td>
                                    <td>{{ $m->genre?->name }}</td>

                                    <td>
                                        {!! $m->is_free ? '<span class="badge bg-success-subtle text-success">Yes</span>' : 'No' !!}
                                    </td>

                                    <td>
                                        <button class="btn btn-outline-primary btn-sm edit-btn"
                                            data-id="{{ $m->id }}" data-title="{{ $m->title }}"
                                            data-description="{{ $m->description }}" data-year="{{ $m->release_year }}"
                                            data-language="{{ $m->language }}" data-type="{{ $m->type }}"
                                            data-genre="{{ $m->genre_id }}"
                                            data-poster="{{ $m->getRawOriginal('poster_url') }}"
                                            data-banner="{{ $m->getRawOriginal('banner_url') }}"
                                            data-free="{{ $m->is_free }}" data-new="{{ $m->is_new_release }}"
                                            data-feature="{{ $m->is_feature }}" data-ott="{{ $m->ott_id }}"
                                            data-bannerflag="{{ $m->is_banner }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <form method="POST" action="{{ route('admin.movie.delete', $m->id) }}"
                                            class="d-inline">
                                            @csrf

                                            <button type="button" class="btn btn-outline-danger btn-sm delete-btn"
                                                data-id="{{ $m->id }}" data-title="{{ $m->title }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center text-muted">
                                    No movies found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- ================= ADD MOVIE MODAL ================= -->
    <div class="modal fade" id="addMovieModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form method="POST" action="{{ route('admin.movie.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Movie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- ===== MODAL BODY ===== -->
                    <div class="modal-body row g-3">

                        <!-- TITLE -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Title *</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="text" name="title" class="form-control" data-required="true"
                                data-error="Movie Title is required">
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Description</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <textarea name="description" class="form-control" data-required="true" data-error="Movie Description is required"></textarea>
                        </div>

                        <!-- YEAR -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Release Year</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="number" name="release_year" class="form-control" data-required="true"
                                data-error="Movie Release Year is required">
                        </div>

                        <!-- LANGUAGE -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Language</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="text" name="language" class="form-control" data-required="true"
                                data-error="Movie Language is required">
                        </div>

                        <!-- TYPE -->
                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-select">
                                <option value="movie">Movie</option>
                                <option value="series">Series</option>
                            </select>
                        </div>

                        <!-- OTT -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">OTT Platform</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <select name="ott_id" class="form-select" data-required="true"
                                data-error="Movie Ott is required">
                                <option value="">-- Select OTT --</option>
                                @foreach ($otts as $o)
                                    <option value="{{ $o->id }}">{{ $o->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- GENRE -->
                        <div class="col-md-6">
                            <label class="form-label">Genre</label>
                            <select name="genre_id" class="form-select">
                                @foreach ($genres as $g)
                                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- POSTER -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Poster Image</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="file" name="poster_file" accept="image/*" class="form-control"
                                data-required="true" data-error="Movie Poster Image is required"
                                onchange="previewImage(this,'posterPreview')">
                            <img id="posterPreview" class="mt-2 rounded" width="80">
                        </div>

                        <!-- BANNER -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Banner Image</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="file" name="banner_file" accept="image/*" class="form-control"
                                data-required="true" data-error="Movie Banner Image is required"
                                onchange="previewImage(this,'bannerPreview')">
                            <img id="bannerPreview" class="mt-2 rounded" width="120">
                        </div>

                        <!-- MOVIE VIDEO -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Movie Video</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="file" name="movie_file" accept="video/*" class="form-control"
                                data-required="true" data-error="Movie Video is required">
                        </div>

                        <!-- TRAILER VIDEO -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Trailer Video</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="file" name="trailer_file" accept="video/*" class="form-control"
                                data-required="true" data-error="Movie Trailer Video is required">
                        </div>

                        <!-- FLAGS -->
                        <div class="col-md-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="is_free" value="1">
                                <label class="form-check-label">Free</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="is_new_release" value="1">
                                <label class="form-check-label">New Release</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="is_feature" value="1">
                                <label class="form-check-label">Featured</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="is_banner" value="1">
                                <label class="form-check-label">Show in Banner</label>
                            </div>
                        </div>

                    </div>

                    <!-- ===== MODAL FOOTER ===== -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary">
                            Save Movie
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- ================= EDIT MOVIE MODAL ================= -->
    <div class="modal fade" id="editMovieModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form method="POST" action="{{ route('admin.movie.update', ['movie' => '__ID__']) }}"
                    enctype="multipart/form-data" id="editMovieForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Movie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <input type="hidden" name="id" id="editId">
                    <input type="hidden" name="old_poster" id="editOldPoster">
                    <input type="hidden" name="old_banner" id="editOldBanner">

                    <div class="modal-body row g-3">

                        <!-- TITLE -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Title</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="text" name="title" id="editTitle" class="form-control"
                                data-required="true" data-error="Movie Title is required">
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Description</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <textarea name="description" id="editDescription" class="form-control" data-required="true"
                                data-error="Movie Description is required"></textarea>
                        </div>

                        <!-- YEAR -->
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Release Year</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="number" name="release_year" id="editYear" class="form-control"
                                data-required="true" data-error="Movie Release Year is required">
                        </div>

                        <!-- LANGUAGE -->
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">Language</label>
                                <span class="error-message text-danger small d-none"></span>
                            </div>
                            <input type="text" name="language" id="editLanguage" class="form-control"
                                data-required="true" data-error="Movie Language is required">
                        </div>

                        <!-- TYPE -->
                        <div class="col-md-4">
                            <label class="form-label">Type</label>
                            <select name="type" id="editType" class="form-select">
                                <option value="movie">Movie</option>
                                <option value="series">Series</option>
                            </select>
                        </div>

                        <!-- OTT -->
                        <div class="col-md-6">
                            <label class="form-label">OTT Platform</label>
                            <select name="ott_id" id="editOtt" class="form-select">
                                <option value="">-- Select OTT --</option>
                                @foreach ($otts as $o)
                                    <option value="{{ $o->id }}">{{ $o->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- GENRE -->
                        <div class="col-md-6">
                            <label class="form-label">Genre</label>
                            <select name="genre_id" id="editGenre" class="form-select">
                                @foreach ($genres as $g)
                                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- FLAGS -->
                        <div class="col-md-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="editFree" name="is_free"
                                    value="1">
                                <label class="form-check-label">Free</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="editNew" name="is_new_release"
                                    value="1">
                                <label class="form-check-label">New</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="editFeature" name="is_feature"
                                    value="1">
                                <label class="form-check-label">Featured</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="editBanner" name="is_banner"
                                    value="1">
                                <label class="form-check-label">Banner</label>
                            </div>
                        </div>

                        <!-- POSTER -->
                        <div class="col-md-6">
                            <label class="form-label">Poster</label><br>
                            <img id="editPosterPreview" width="80" class="rounded mb-2"><br>
                            <input type="file" name="poster_file" accept="image/*" class="form-control">
                        </div>

                        <!-- BANNER -->
                        <div class="col-md-6">
                            <label class="form-label">Banner</label><br>
                            <img id="editBannerPreview" width="120" class="rounded mb-2"><br>
                            <input type="file" name="banner_file" accept="image/*" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary">Update Movie</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- ================= DELETE MOVIE MODAL ================= -->
    <div class="modal fade" id="deleteMovieModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Movie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" id="deleteMovieForm"
                    action="{{ route('admin.movie.delete', ['movie' => '__ID__']) }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <input type="hidden" name="id" id="deleteMovieId">

                        <p>Are you sure you want to delete this season?</p>
                        <p class="fw-bold text-danger mb-0" id="deleteMovieName"></p>
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
    <script>
        const deleteMovieModal = document.getElementById('deleteMovieModal');
        const deleteMovieId = document.getElementById('deleteMovieId');
        const deleteMovieName = document.getElementById('deleteMovieName');
        const deleteForm = document.getElementById('deleteMovieForm');
        const editForm = document.getElementById('editMovieForm');

        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                deleteMovieId.value = btn.dataset.id;
                deleteMovieName.innerText = btn.dataset.title;
                deleteForm.action = "{{ route('admin.movie.delete', ':id') }}".replace(':id', btn.dataset
                    .id);
                new bootstrap.Modal(deleteMovieModal).show();
            });
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {

                editId.value = btn.dataset.id;
                editTitle.value = btn.dataset.title;
                editDescription.value = btn.dataset.description;
                editYear.value = btn.dataset.year;
                editLanguage.value = btn.dataset.language;
                editType.value = btn.dataset.type;
                editOtt.value = btn.dataset.ott;
                editGenre.value = btn.dataset.genre;

                editFree.checked = btn.dataset.free === '1';
                editNew.checked = btn.dataset.new === '1';
                editFeature.checked = btn.dataset.feature === '1';
                editBanner.checked = btn.dataset.bannerflag === '1';

                editOldPoster.value = btn.dataset.poster;
                editOldBanner.value = btn.dataset.banner;

                editPosterPreview.src = "{{ asset('assets/images') }}/" + btn.dataset.poster;
                editBannerPreview.src = "{{ asset('assets/images') }}/" + btn.dataset.banner;

                editForm.action = "{{ route('admin.movie.update', ':id') }}".replace(':id', btn.dataset
                .id);

                new bootstrap.Modal(document.getElementById('editMovieModal')).show();
            });
        });
    </script>
@endsection
