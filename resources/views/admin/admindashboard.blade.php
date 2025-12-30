@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="main-content">

        <div class="container-fluid">
            <h3 class="mt-1">Dashboard</h3>
            <p class="text-muted">Welcome back! Here's what's happening today.</p>

            <div class="row g-3">

                <div class="col-md-4 col-lg-2">
                    <div class="card stat-card">
                        <div class="card-body text-center">
                            <div class="stat-icon bg-primary-light">
                                <i class="bi bi-film text-primary"></i>
                            </div>
                            <h3><?= $stats['totalMovies'] ?></h3>
                            <p>Total Movies</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="card stat-card">
                        <div class="card-body text-center">
                            <div class="stat-icon bg-success-light">
                                <i class="bi bi-people text-success"></i>
                            </div>
                            <h3><?= $stats['totalUsers'] ?></h3>
                            <p>Total Users</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="card stat-card">
                        <div class="card-body text-center">
                            <div class="stat-icon bg-warning-light">
                                <i class="bi bi-credit-card text-warning"></i>
                            </div>
                            <h3><?= $stats['activeSubs'] ?></h3>
                            <p>Active Subscriptions</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="card stat-card">
                        <div class="card-body text-center">
                            <div class="stat-icon bg-info-light">
                                <i class="bi bi-tv text-info"></i>
                            </div>
                            <h3><?= $stats['totalOtts'] ?></h3>
                            <p>Total OTTs</p>
                        </div>
                    </div>
                </div>

            </div>

            <h3 class="mt-4">Recent Movies</h3>

            <div class="card mt-3">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Poster</th>
                            <th>Title</th>
                            <th>Release Year</th>
                            <th>OTT</th>
                            <th>Added On</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($recentMovies as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>
                                    <img src="{{ $m->poster_url }}" width="50" class="rounded">
                                </td>
                                <td>{{ $m->title }}</td>
                                <td>{{ $m->release_year ?? '-' }}</td>
                                <td>{{ $m->ott?->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($m->created_at)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
