@extends('admin.layouts.master')

@section('title', 'Cast-Role')

@section('content')

    <div class="main-content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Cast Roles</h3>
                    <p class="text-muted">Manage cast role types</p>
                </div>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                    <i class="bi bi-plus-lg"></i> Add Role
                </button>
            </div>

            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($castrole as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td><strong>{{ $r->name }}</strong></td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $r->id }}"
                                        data-name="{{ $r->name }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $r->id }}"
                                        data-name="{{ $r->name }}">
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
    <div class="modal fade" id="addRoleModal">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.castrole.store') }}" class="modal-content">
                @csrf

                <div class="modal-header">
                    <h5>Add Cast Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Role Name</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>

                    <input type="text" name="name" class="form-control" data-required="true"
                        data-error="Role name is required">
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

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editRoleModal">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.castrole.update', '__ID__') }}" id="editRoleForm"
                class="modal-content">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5>Edit Cast Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="editRoleId">

                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">Role Name</label>
                        <span class="error-message text-danger small d-none"></span>
                    </div>

                    <input type="text" name="name" id="editRoleName" class="form-control" data-required="true"
                        data-error="Role name is required">
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
    <div class="modal fade" id="deleteRoleModal">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('admin.castrole.delete', '__ID__') }}" id="deleteRoleForm"
                class="modal-content">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="text-danger">Delete Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteRoleId">
                    <p>Are you sure you want to delete:</p>
                    <p class="fw-bold text-danger mb-0" id="deleteRoleName"></p>
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
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const name = btn.dataset.name;

                editRoleId.value = id;
                editRoleName.value = name;

                const form = document.getElementById('editRoleForm');
                form.action = form.action.replace('__ID__', id);

                new bootstrap.Modal(editRoleModal).show();
            });
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const name = btn.dataset.name;

                deleteRoleId.value = id;
                deleteRoleName.innerText = name;

                const form = document.getElementById('deleteRoleForm');
                form.action = form.action.replace('__ID__', id);

                new bootstrap.Modal(deleteRoleModal).show();
            });
        });
    </script>

@endsection
