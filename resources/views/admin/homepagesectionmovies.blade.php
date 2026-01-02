@extends('admin.layouts.master')

@section('title', 'Homepage-Section')

@section('content')
    <div class="main-content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h3>{{ $section->title }}</h3>
                    <p class="text-muted">Add and reorder movies for this section</p>
                </div>

                <a href="{{ route('admin.homepagesection') }}" class="btn btn-light">← Back</a>
            </div>

            <form method="POST" action="{{ route('admin.homepagesection.movies.save') }}">
                @csrf

                <input type="hidden" name="section_id" value="{{ $section->id }}">

                <div class="row">

                    <!-- ALL MOVIES -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header fw-bold">All Movies</div>
                            <div class="card-body" style="max-height:400px; overflow:auto">

                                @foreach ($allMovies as $m)
                                    <button type="button" class="btn btn-sm btn-outline-secondary w-100 mb-1 add-movie"
                                        data-id="{{ $m->id }}" data-title="{{ $m->title }}">
                                        + {{ $m->title }}
                                    </button>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <!-- SELECTED MOVIES -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header fw-bold">Selected Movies (Drag to reorder)</div>
                            <div class="card-body">

                                <ul class="list-group" id="movieSortable">
                                    @foreach ($sectionMovies as $movie)
                                        <li class="list-group-item d-flex align-items-center" draggable="true"
                                            data-id="{{ $movie->id }}">

                                            <input type="hidden" name="movies[]" value="{{ $movie->id }}">

                                            <i class="bi bi-grip-vertical me-2 text-muted"></i>
                                            <span class="flex-grow-1">{{ $movie->title }}</span>

                                            <button type="button"
                                                class="btn btn-sm btn-danger remove-movie ms-2">×</button>
                                        </li>
                                    @endforeach
                                </ul>

                                <p id="emptyMessage" class="text-muted mt-2"
                                    style="{{ $sectionMovies->isEmpty() ? '' : 'display:none' }}">
                                    No movies selected yet.
                                </p>

                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary mt-3">Save Movies</button>
            </form>

        </div>
    </div>
    <script>
        /* ADD MOVIE */
        document.querySelectorAll(".add-movie").forEach(btn => {
            btn.addEventListener("click", () => {
                const id = btn.dataset.id;
                const title = btn.dataset.title;

                if (document.querySelector(`#movieSortable li[data-id="${id}"]`)) {
                    return; // prevent duplicate
                }

                const li = document.createElement("li");
                li.className = "list-group-item d-flex align-items-center";
                li.draggable = true;
                li.dataset.id = id;

                li.innerHTML = `
                <input type="hidden" name="movies[]" value="${id}">
                <i class="bi bi-grip-vertical me-2 text-muted"></i>
                <span class="flex-grow-1">${title}</span>
                <button type="button" class="btn btn-sm btn-danger remove-movie ms-2">×</button>
            `;

                document.getElementById("movieSortable").appendChild(li);
                bindDrag(li);
                bindRemove(li);
                toggleEmptyMessage();
            });
        });

        /* REMOVE MOVIE */
        function bindRemove(li) {
            li.querySelector(".remove-movie").addEventListener("click", () => {
                li.remove();
                toggleEmptyMessage();
            });
        }


        function toggleEmptyMessage() {
            const list = document.getElementById("movieSortable");
            const msg = document.getElementById("emptyMessage");

            if (!msg) return;

            msg.style.display = list.children.length === 0 ? "block" : "none";
        }


        /* DRAG & DROP */
        let dragged = null;
        const list = document.getElementById("movieSortable");

        function bindDrag(li) {
            li.addEventListener("dragstart", () => {
                dragged = li;
                li.classList.add("opacity-50");
            });

            li.addEventListener("dragend", () => {
                li.classList.remove("opacity-50");
                dragged = null;
            });
        }

        list.addEventListener("dragover", e => {
            e.preventDefault();
            const target = e.target.closest("li");
            if (!target || target === dragged) return;

            const rect = target.getBoundingClientRect();
            const next = (e.clientY - rect.top) > rect.height / 2;
            list.insertBefore(dragged, next ? target.nextSibling : target);
        });

        /* INIT EXISTING ITEMS */
        document.querySelectorAll("#movieSortable li").forEach(li => {
            bindDrag(li);
            bindRemove(li);
        });
        toggleEmptyMessage();
    </script>
@endsection
