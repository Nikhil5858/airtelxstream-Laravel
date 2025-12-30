@extends('admin.layouts.master')

@section('title', 'Cast')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Cast People</h3>
                    <p class="text-muted">Manage actors & directors</p>
                </div>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCastModal">
                    <i class="bi bi-plus-lg"></i> Add Cast
                </button>
            </div>

            <!-- SEARCH -->
            <div class="card p-3 mt-3">
                <div class="search-input-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="castSearch" class="form-control search-input" placeholder="Search cast...">
                </div>
            </div>

            <!-- TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="castTable">
                        @foreach ($casts as $c)
                            <tr>
                                <td>
                                    @if ($c->getRawOriginal('profile_image_url'))
                                        <img src="{{ asset('assets/images/' . $c->getRawOriginal('profile_image_url')) }}"
                                            style="height:45px;width:45px;border-radius:50%;object-fit:cover">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td><strong>{{ $c->name }}</strong></td>
                                <td>{{ $c->date_of_birth ?? '-' }}</td>

                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $c->id }}"
                                        data-name="{{ $c->name }}" data-bio="{{ $c->bio }}"
                                        data-dob="{{ $c->date_of_birth }}"
                                        data-img="{{ $c->getRawOriginal('profile_image_url') }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $c->id }}"
                                        data-name="{{ $c->name }}">
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
    <div class="modal fade" id="addCastModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.cast.store') }}" enctype="multipart/form-data"
                class="modal-content">

                @csrf

                <div class="modal-header">
                    <h5>Add Cast</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Name</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <input type="text" name="name" class="form-control mb-3" data-required="true"
                        data-error="Cast name is required">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Profile Image</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <input type="file" name="image" class="form-control mb-3" accept="image/*" data-required="true"
                        data-error="Cast Image is required">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Date of Birth</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <input type="date" name="date_of_birth" class="form-control mb-3" data-required="true"
                        data-error="Cast Date of Birth is required">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Bio</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <textarea name="bio" class="form-control" data-required="true" data-error="Cast Bio is required"></textarea>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>

    <!-- ================= EDIT MODAL ================= -->
    <div class="modal fade" id="editCastModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" id="editCastForm" enctype="multipart/form-data" class="modal-content">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5>Edit Cast</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id" id="editCastId">
                    <input type="hidden" name="old_image" id="editCastOldImage">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Name</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <input type="text" name="name" id="editCastName" class="form-control mb-3"
                        data-required="true" data-error="Cast name is required">

                    <label class="form-label">Profile Image</label>
                    <input type="file" name="image" class="form-control mb-2" accept="image/*">

                    <img id="editCastPreview" style="height:60px;border-radius:50%;display:none">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Date of Birth</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <input type="date" name="date_of_birth" id="editCastDob" class="form-control mb-3"
                        data-required="true" data-error="Cast Date of Birth is required">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Bio</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>
                    <textarea name="bio" id="editCastBio" class="form-control" data-required="true"
                        data-error="Cast Bio is required"></textarea>

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

    <!-- ================= DELETE MODAL ================= -->
    <div class="modal fade" id="deleteCastModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" id="deleteCastForm" class="modal-content">

                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Cast</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteCastId">
                    <p>Are you sure you want to delete this cast?</p>
                    <p class="fw-bold text-danger mb-0" id="deleteCastName"></p>
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

    <script>
        /* SEARCH */
        document.getElementById('castSearch').addEventListener('keyup', function() {
            const k = this.value.toLowerCase();
            document.querySelectorAll('#castTable tr').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(k) ? '' : 'none';
            });
        });

        /* EDIT */
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                editCastForm.action = `/admin/cast/${btn.dataset.id}`;

                editCastId.value = btn.dataset.id;
                editCastName.value = btn.dataset.name;
                editCastBio.value = btn.dataset.bio;
                editCastDob.value = btn.dataset.dob || '';
                editCastOldImage.value = btn.dataset.img;

                if (btn.dataset.img) {
                    editCastPreview.src = "{{ asset('assets/images') }}/" + btn.dataset.img;
                    editCastPreview.style.display = "block";
                } else {
                    editCastPreview.style.display = "none";
                }

                new bootstrap.Modal(editCastModal).show();
            });
        });

        /* DELETE */
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                deleteCastForm.action = `/admin/cast/${btn.dataset.id}`;
                deleteCastId.value = btn.dataset.id;
                deleteCastName.innerText = btn.dataset.name;
                new bootstrap.Modal(deleteCastModal).show();
            });
        });
    </script>

@endsection
