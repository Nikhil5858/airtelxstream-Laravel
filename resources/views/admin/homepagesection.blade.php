@extends('admin.layouts.master')

@section('title', 'Homepage-Section')

@section('content')
    <div class="main-content">
        <div class="container-fluid">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-start mt-1">
                <div>
                    <h3>Homepage Sections</h3>
                    <h2 class="text-muted mt-5">Drag & Reorder homepage sections</h2>
                </div>

                <button class="btn btn-primary d-flex align-items-center mt-2" data-bs-toggle="modal"
                    data-bs-target="#addSectionModal">
                    <i class="bi bi-plus-lg me-2"></i> Add Section
                </button>
            </div>

            <!-- TABLE -->
            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="sectionSortable">

                        <div class="text-end mt-2 mb-2 ms-2 me-2">
                            <button id="saveOrderBtn" class="btn btn-primary">
                                Save Order
                            </button>
                        </div>

                        @foreach ($sections as $s)
                            <tr draggable="true" data-id="{{ $s->id }}">

                                <td class="text-muted" style="cursor:grab">
                                    <i class="bi bi-grip-vertical"></i>
                                </td>

                                <td><strong>{{ $s->title }}</strong></td>

                                <td>{{ ucfirst($s->type) }}</td>

                                <td>
                                    @if ($s->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Disabled</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.homepagesection.movies', ['section' => $s->slug]) }}"
                                        class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-film"></i>
                                    </a>

                                    <button class="btn btn-outline-primary btn-sm edit-btn" data-id="{{ $s->id }}"
                                        data-title="{{ $s->title }}" data-type="{{ $s->type }}"
                                        data-position="{{ $s->position }}" data-active="{{ $s->is_active }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $s->id }}"
                                        data-title="{{ $s->title }}">
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

    <div class="modal fade" id="addSectionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Homepage Section</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('admin.homepagesection.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Title *</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <input type="text" name="title" class="form-control mb-2" data-required="true"
                            data-error="Movie Title is required">

                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="slider">Slider</option>
                            <option value="top10">Top 10</option>
                        </select>


                        <label>
                            <input type="checkbox" name="is_active" checked> Active
                        </label>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary">Add Section</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editSectionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Section</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">

                        <input type="hidden" name="id" id="editSectionId">
                        <input type="hidden" name="position" id="editSectionPosition">

                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Title *</label>
                            <span class="error-message text-danger small d-none"></span>
                        </div>
                        <input type="text" name="title" id="editSectionTitle" class="form-control mb-2"
                            data-required="true" data-error="Movie Title is required">

                        <label class="form-label">Type</label>
                        <select name="type" id="editSectionType" class="form-control mb-2">
                            <option value="slider">Slider</option>
                            <option value="top10">Top 10</option>
                        </select>
                        <label>
                            <input type="checkbox" name="is_active" id="editSectionActive">
                            Active
                        </label>

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
    <div class="modal fade" id="deleteSectionModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Section</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">

                        <input type="hidden" name="id" id="deleteSectionId">

                        <p>Are you sure you want to delete this section?</p>
                        <p class="fw-bold text-danger mb-0" id="deleteSectionTitle"></p>

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
        /* EDIT */
        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", () => {

                const id = btn.dataset.id;

                editSectionId.value = id;
                editSectionTitle.value = btn.dataset.title;
                editSectionType.value = btn.dataset.type;
                editSectionActive.checked = btn.dataset.active === "1";
                editSectionPosition.value = btn.dataset.position;


                editForm.action = `/admin/homepagesection/${id}`;

                new bootstrap.Modal(editSectionModal).show();
            });
        });


        /* DELETE */
        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", () => {

                const id = btn.dataset.id; 

                deleteSectionId.value = id;
                deleteSectionTitle.innerText = btn.dataset.title;

                deleteForm.action = `/admin/homepagesection/${id}`;

                new bootstrap.Modal(deleteSectionModal).show();
            });
        });


        const tbody = document.getElementById("sectionSortable");
        let draggedRow = null;

        if (tbody) {

            tbody.addEventListener("dragstart", (e) => {
                draggedRow = e.target.closest("tr");
                if (!draggedRow) return;

                draggedRow.classList.add("opacity-50");
            });

            tbody.addEventListener("dragend", () => {
                if (draggedRow) {
                    draggedRow.classList.remove("opacity-50");
                    draggedRow = null;
                }
            });

            tbody.addEventListener("dragover", (e) => {
                e.preventDefault();

                const target = e.target.closest("tr");
                if (!target || target === draggedRow) return;

                const rect = target.getBoundingClientRect();
                const next = (e.clientY - rect.top) > rect.height / 2;

                tbody.insertBefore(
                    draggedRow,
                    next ? target.nextSibling : target
                );
            });
        }

        /* SAVE ORDER BUTTON */
        const saveBtn = document.getElementById("saveOrderBtn");

        if (saveBtn) {
            saveBtn.addEventListener("click", () => {

                const order = [];

                document.querySelectorAll("#sectionSortable tr").forEach((row, index) => {
                    order.push({
                        id: row.dataset.id,
                        position: index + 1
                    });
                });

                fetch("{{ route('admin.homepagesection.reorder') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(order)
                    })
                    .then(() => {
                        location.reload();
                    });

            });
        }
    </script>
@endsection
