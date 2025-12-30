@extends('admin.layouts.master')

@section('title', 'Cast-Content')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Movie Cast</h3>
                    <p class="text-muted">Assign cast & roles to movies</p>
                </div>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCastContentModal">
                    <i class="bi bi-plus-lg"></i> Add Cast
                </button>
            </div>

            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Movie</th>
                            <th>Cast</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($items as $i)
                            <tr>
                                <td>{{ $i->movie->title }}</td>
                                <td>{{ $i->cast->name }}</td>
                                <td>{{ $i->role->name }}</td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $i->id }}"
                                        data-movie="{{ $i->movie_id }}" data-cast="{{ $i->cast_id }}"
                                        data-role="{{ $i->cast_roles_id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $i->id }}"
                                        data-name="{{ $i->cast->name }}">
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

    {{-- ================= ADD MODAL ================= --}}
    <div class="modal fade" id="addCastContentModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.castcontent.store') }}" class="modal-content">

                @csrf

                <div class="modal-header">
                    <h5>Add Movie Cast</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <select name="movie_id" class="form-select mb-3" required>
                        <option value="">Select Movie</option>
                        @foreach ($movies as $m)
                            <option value="{{ $m->id }}">{{ $m->title }}</option>
                        @endforeach
                    </select>

                    <select name="cast_id" class="form-select mb-3" required>
                        <option value="">Select Cast</option>
                        @foreach ($casts as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>

                    <select name="cast_roles_id" class="form-select" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>

    {{-- ================= EDIT MODAL ================= --}}
    <div class="modal fade" id="editCastContentModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="editForm" class="modal-content">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5>Edit Movie Cast</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <select name="movie_id" id="editMovie" class="form-select mb-3" required>
                        @foreach ($movies as $m)
                            <option value="{{ $m->id }}">{{ $m->title }}</option>
                        @endforeach
                    </select>

                    <select name="cast_id" id="editCast" class="form-select mb-3" required>
                        @foreach ($casts as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>

                    <select name="cast_roles_id" id="editRole" class="form-select" required>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save Changes</button>
                </div>

            </form>
        </div>
    </div>

    {{-- ================= DELETE MODAL ================= --}}

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteCastContentModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" id="deleteForm" class="modal-content">

                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Cast Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this entry?</p>
                    <p class="fw-bold text-danger mb-0" id="deleteItemText"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </div>

            </form>
        </div>
    </div>


    <script>
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {

                const id = btn.dataset.id;

                document.getElementById('editForm').action =
                    "{{ url('admin/castcontent') }}/" + id;

                document.getElementById('editMovie').value = btn.dataset.movie;
                document.getElementById('editCast').value = btn.dataset.cast;
                document.getElementById('editRole').value = btn.dataset.role;

                new bootstrap.Modal(
                    document.getElementById('editCastContentModal')
                ).show();
            });
        });

        const deleteModal = document.getElementById('deleteCastContentModal');
        const deleteForm = document.getElementById('deleteForm');
        const deleteItemText = document.getElementById('deleteItemText');

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', () => {

                const id = btn.dataset.id;
                const name = btn.dataset.name;

                deleteForm.action = "{{ url('admin/castcontent') }}/" + id;
                deleteItemText.innerText = name;

                new bootstrap.Modal(deleteModal).show();
            });
        });
    </script>


@endsection
