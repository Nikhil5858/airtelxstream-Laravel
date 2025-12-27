@extends('admin.layouts.master')

@section('title', 'Ott')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>OTT Providers</h3>
                    <p class="text-muted">Manage OTT platforms</p>
                </div>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOttModal">
                    <i class="bi bi-plus-lg"></i> Add OTT
                </button>
            </div>

            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($otts as $o)
                            <tr>
                                <td>{{ $o->id }}</td>
                                <td><strong>{{ $o->name }}</strong></td>
                                <td>
                                    @if ($o->logo_url)
                                        <img src="{{ $o->logo_url }}" alt="{{ $o->name }}" style="height:40px">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $o->is_active ? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $o->id }}"
                                        data-name="{{ $o->name }}" data-logo="{{ $o->getRawOriginal('logo_url') }}"
                                        data-active="{{ $o->is_active ? 1 : 0 }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $o->id }}"
                                        data-name="{{ $o->name }}">
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

    <!-- ADD MODAL -->
    <div class="modal fade" id="addOttModal">
        <div class="modal-dialog">

            <form method="POST" action="{{ route('admin.ott.store') }}" enctype="multipart/form-data"
                class="modal-content">
                @csrf

                <div class="modal-header">
                    <h5>Add OTT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Name</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>

                    <input type="text" name="name" class="form-control mb-3" data-required="true"
                        data-error="Ott Name is required">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Logo</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>

                    <input type="file" name="logo" class="form-control mb-3" data-required="true"
                        data-error="Ott Image is required" accept="image/*">

                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editOttModal" tabindex="-1">
        <div class="modal-dialog">

            <form method="POST" action="{{ route('admin.ott.update', '__ID__') }}" enctype="multipart/form-data"
                class="modal-content" id="editOttForm">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit OTT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <input type="hidden" id="editOttExistingLogo">

                <div class="modal-body">
                    <input type="hidden" name="id" id="editOttId">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Name</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>

                    <input type="text" name="name" id="editOttName" data-required="true"
                        data-error="Ott Name is required" class="form-control mb-3">

                    <label class="form-label">Logo</label>

                    <img id="editOttPreview" style="max-height:60px; display:none;" class="mb-2">

                    <input type="file" name="logo" class="form-control mb-3" accept="image/*">

                    <div class="form-check">
                        <input type="checkbox" name="is_active" id="editOttActive" class="form-check-input">
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteOttModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">

            <form method="POST" action="{{ route('admin.ott.delete', '__ID__') }}" class="modal-content"
                id="deleteOttForm">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete OTT</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteOttId">

                    <p>Are you sure you want to delete this OTT platform?</p>
                    <p class="fw-bold text-danger mb-0" id="deleteOttName"></p>
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
        // Edit
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {

                const id = btn.dataset.id;
                const logo = btn.dataset.logo;

                document.getElementById('editOttId').value = id;
                document.getElementById('editOttName').value = btn.dataset.name;
                document.getElementById('editOttActive').checked = btn.dataset.active == 1;

                const preview = document.getElementById('editOttPreview');

                if (logo) {
                    preview.src = "{{ asset('assets/images') }}/" + logo;
                    preview.style.display = "block";
                } else {
                    preview.style.display = "none";
                }

                const form = document.getElementById('editOttForm');
                form.action = form.action.replace('__ID__', id);

                new bootstrap.Modal(document.getElementById('editOttModal')).show();
            });
        });

        // Delete
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', () => {

                const id = btn.dataset.id;

                document.getElementById('deleteOttId').value = id;
                document.getElementById('deleteOttName').innerText = btn.dataset.name;

                const form = document.getElementById('deleteOttForm');
                form.action = form.action.replace('__ID__', id);

                new bootstrap.Modal(document.getElementById('deleteOttModal')).show();
            });
        });
    </script>


@endsection
