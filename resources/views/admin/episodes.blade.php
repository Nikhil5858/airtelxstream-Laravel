@extends('admin.layouts.master')

@section('title', 'Episodes')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Episodes</h3>
                    <p class="text-muted">Manage season episodes</p>
                </div>

                <button class="btn btn-primary d-flex align-items-center mt-2" data-bs-toggle="modal"
                    data-bs-target="#addEpisodeModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Episode
                </button>
            </div>

            <!-- SEARCH -->
            <div class="card p-3 mt-3">
                <div class="search-input-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="episodeSearch" class="form-control search-input"
                        placeholder="Search episodes...">
                </div>
            </div>

            <!-- TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Series</th>
                            <th>Image</th>
                            <th>Season</th>
                            <th>Episode</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="episodeTable">
                        @foreach ($episodes as $e)
                            <tr>
                                <td><strong>{{ $e->season->movie->title }}</strong></td>

                                <td>
                                    @if ($e->poster_img)
                                        <img src="{{ $e->poster_img }}" width="50">
                                    @endif
                                </td>

                                <td>{{ $e->season->season_number }}</td>
                                <td>{{ $e->episode_number }}</td>
                                <td>{{ $e->title }}</td>

                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $e->id }}"
                                        data-episode="{{ $e->episode_number }}" data-title="{{ $e->title }}"
                                        data-desc="{{ $e->description }}" data-video="{{ $e->getRawOriginal('video_url') }}"
                                        data-poster="{{ $e->getRawOriginal('poster_img') }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $e->id }}"
                                        data-title="{{ $e->title }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- ================= ADD MODAL ================= -->
    <div class="modal fade" id="addEpisodeModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.episodes.store') }}" enctype="multipart/form-data"
                class="modal-content">

                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add Episode</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <label class="form-label">Season</label>
                    <select name="season_id" class="form-select mb-3">
                        @foreach ($seasons as $s)
                            <option value="{{ $s->id }}">
                                {{ $s->movie->title }} - Season {{ $s->season_number }}
                            </option>
                        @endforeach
                    </select>

                    <label class="form-label">Poster Image</label>
                    <input type="file" name="poster_img" class="form-control mb-3" accept="image/*">

                    <label class="form-label">Episode Video</label>
                    <input type="file" name="video_file" class="form-control mb-3" accept="video/*">

                    <label class="form-label">Episode Number</label>
                    <input type="number" name="episode_number" class="form-control mb-3" min="1">

                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control mb-3">

                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control mb-3"></textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Add Episode</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= EDIT MODAL ================= -->
    <div class="modal fade" id="editEpisodeModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="editEpisodeForm" enctype="multipart/form-data" class="modal-content">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit Episode</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="editEpisodeId">
                    <input type="hidden" name="episode_number" id="editEpisodeNumberHidden">
                    <input type="hidden" name="old_poster" id="oldPoster">


                    <label class="form-label">Episode Number</label>
                    <input type="number" id="editEpisodeNumber" class="form-control mb-3" disabled>

                    <label class="form-label">Title</label>
                    <input type="text" name="title" id="editEpisodeTitle" class="form-control mb-3">
                    
                    <div class="mb-2">
                        <img id="editPosterPreview" src="" width="100" class="rounded d-none">
                    </div>

                    <label class="form-label">Poster Image</label>
                    <input type="file" name="poster_img" class="form-control mb-3" accept="image/*">

                    <label class="form-label">Episode Video</label>
                    <input type="file" name="video_file" class="form-control mb-3" accept="video/*">

                    <label class="form-label">Description</label>
                    <textarea name="description" id="editEpisodeDesc" class="form-control mb-3"></textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= DELETE MODAL ================= -->
    <div class="modal fade" id="deleteEpisodeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" id="deleteEpisodeForm" class="modal-content">

                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Episode</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteEpisodeId">
                    <p>Are you sure you want to delete this episode?</p>
                    <p class="fw-bold text-danger mb-0" id="deleteEpisodeTitle"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("episodeSearch").addEventListener("keyup", function() {
            const k = this.value.toLowerCase();
            document.querySelectorAll("#episodeTable tr").forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(k) ? "" : "none";
            });
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {

                editEpisodeId.value = btn.dataset.id;
                editEpisodeNumber.value = btn.dataset.episode;
                editEpisodeNumberHidden.value = btn.dataset.episode;
                editEpisodeTitle.value = btn.dataset.title;
                editEpisodeDesc.value = btn.dataset.desc;

                // Poster preview
                const img = document.getElementById('editPosterPreview');
                if (btn.dataset.poster) {
                    img.src = `/assets/images/${btn.dataset.poster}`;
                    img.classList.remove('d-none');
                } else {
                    img.classList.add('d-none');
                }

                editEpisodeForm.action = `/admin/episodes/${btn.dataset.id}`;

                new bootstrap.Modal(
                    document.getElementById('editEpisodeModal')
                ).show();
            });
        });


        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                deleteEpisodeId.value = btn.dataset.id;
                deleteEpisodeTitle.innerText = btn.dataset.title;

                deleteEpisodeForm.action = `/admin/episodes/${btn.dataset.id}`;

                new bootstrap.Modal(deleteEpisodeModal).show();
            });
        });
    </script>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal(document.getElementById('addEpisodeModal')).show();
            });
        </script>
    @endif

@endsection
