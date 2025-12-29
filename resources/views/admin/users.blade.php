@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')
    <div class="main-content">
        <div class="container-fluid">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Users</h3>
                    <p class="text-muted">Manage platform users</p>
                </div>

                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bi bi-plus-lg me-2"></i> Add User
                </button>
            </div>

            <!-- TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Subscription</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $u)
                            <tr>
                                <td><strong>{{ $u->name }}</strong></td>
                                <td>
                                    @if ($u->role === 'admin')
                                        <span class="badge bg-danger-subtle text-danger">Admin</span>
                                    @else
                                        <span class="badge bg-primary-subtle text-primary">User</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($u->is_subscription_active)
                                        <span class="badge bg-success-subtle text-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-dark">Inactive</span>
                                    @endif
                                </td>

                                <td>{{ $u->created_at->format('d M Y') }}</td>

                                <td>
                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $u->id }}"
                                        data-name="{{ $u->name }}" data-role="{{ $u->role }}"
                                        data-sub="{{ $u->is_subscription_active }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $u->id }}"
                                        data-name="{{ $u->name }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- ================= ADD USER MODAL ================= -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Name *</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <input type="text" name="name" class="form-control mb-3" data-required="true"
                            data-error="User name is required">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Role *</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <select name="role" class="form-select mb-3" data-required="true" data-error="Role is required">
                            <option value="">Select role</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>


                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Email *</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <input type="email" name="email" class="form-control mb-3" data-required="true"
                            data-error="Email is required">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Password *</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <input type="password" name="password" class="form-control mb-3" data-required="true"
                            data-error="Password is required">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_subscription_active" value="1">
                            <label class="form-check-label">Subscription Active</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary">Save User</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- ================= EDIT USER MODAL ================= -->
    <div class="modal fade" id="editUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="editId">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Name</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <input type="text" name="name" id="editName" class="form-control mb-3"
                            data-required="true" data-error="User name is required">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Role</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <select name="role" id="editRole" class="form-select mb-3">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_subscription_active"
                                id="editSubscription" value="1">
                            <label class="form-check-label">Subscription Active</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary">Update User</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- ================= DELETE USER MODAL ================= -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete User</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="deleteUserId">
                        <p>Are you sure you want to delete this user?</p>
                        <p class="fw-bold text-danger mb-0" id="deleteUserName"></p>
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
        function validateForm(form) {
            let valid = true;
            form.querySelectorAll("[data-required='true']").forEach(input => {
                const errorSpan = input.previousElementSibling.querySelector(".error-message");
                if (!input.value.trim()) {
                    errorSpan.textContent = input.dataset.error;
                    errorSpan.classList.remove("d-none");
                    valid = false;
                } else {
                    errorSpan.classList.add("d-none");
                }
            });
            return valid;
        }

        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", e => {
                if (!validateForm(form)) e.preventDefault();
            });
        });

        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                editForm.action = `/admin/users/${btn.dataset.id}`;
                editId.value = btn.dataset.id;
                editName.value = btn.dataset.name;
                editRole.value = btn.dataset.role;
                editSubscription.checked = btn.dataset.sub === "1";
                new bootstrap.Modal(editUserModal).show();
            });
        });

        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                deleteForm.action = `/admin/users/${btn.dataset.id}`;
                deleteUserId.value = btn.dataset.id;
                deleteUserName.innerText = btn.dataset.name;
                new bootstrap.Modal(deleteUserModal).show();
            });
        });
    </script>
@endsection
