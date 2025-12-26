@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="main-content">
        <div class="container-fluid">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Subscriptions</h3>
                    <p class="text-muted">Manage subscription plans</p>
                </div>

                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addPlanModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Plan
                </button>
            </div>

            <!-- CARDS -->
            <div class="row mt-4">
                @forelse ($plans as $p)
                    <div class="col-md-4">
                        <div class="card h-100">

                            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-wallet2 text-primary"></i>
                                    <strong>{{ $p->plan_name }}</strong>
                                </div>

                                <span
                                    class="badge {{ $p->is_active ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-dark' }}">
                                    {{ $p->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                            <div class="p-3">
                                <p class="mb-1 fw-bold">₹{{ number_format($p->price, 2) }}</p>
                                <small class="text-muted">
                                    Valid for {{ $p->duration_days }} days
                                </small>
                            </div>

                            <div class="p-3 border-top d-flex justify-content-end gap-2">
                                <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $p->id }}"
                                    data-name="{{ $p->plan_name }}" data-price="{{ $p->price }}"
                                    data-days="{{ $p->duration_days }}" data-active="{{ $p->is_active }}">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $p->id }}"
                                    data-name="{{ $p->plan_name }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        No subscription plans found
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <div class="modal fade" id="addPlanModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{ route('admin.subscriptions.store') }}">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Add Subscription Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <label class="form-label">Plan Name</label>
                        <input type="text" name="plan_name" class="form-control mb-3">

                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control mb-3">

                        <label class="form-label">Duration (Days)</label>
                        <input type="number" name="duration_days" class="form-control mb-3">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1">
                            <label class="form-check-label">Active</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Save Plan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editPlanModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Subscription Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="text" name="plan_name" id="editName" class="form-control mb-3">
                        <input type="number" step="0.01" name="price" id="editPrice" class="form-control mb-3">
                        <input type="number" name="duration_days" id="editDays" class="form-control mb-3">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="editActive" value="1">
                            <label class="form-check-label">Active</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update Plan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deletePlanModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Delete Subscription</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p>Are you sure you want to delete this plan?</p>
                        <p class="fw-bold text-danger mb-0" id="deleteName"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                editName.value = btn.dataset.name;
                editPrice.value = btn.dataset.price;
                editDays.value = btn.dataset.days;
                editActive.checked = btn.dataset.active == 1;

                document.getElementById('editForm').action =
                    `/admin/subscriptions/${btn.dataset.id}`;

                new bootstrap.Modal(editPlanModal).show();
            });
        });

        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                deleteName.innerText = btn.dataset.name;
                document.getElementById('deleteForm').action =
                    `/admin/subscriptions/${btn.dataset.id}`;

                new bootstrap.Modal(deletePlanModal).show();
            });
        });
    </script>


@endsection
