@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center fw-bold">🎬 Movie Gallery</h2>

        <!-- Toast -->
        @if (session('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div class="toast align-items-center text-bg-success border-0 show" role="alert">
                    <div class="d-flex">
                        <div class="toast-body">{{ session('success') }}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Search using Scout Package -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <form action="" method="GET">
                <label for="">Search using Scout Package</label>
                <input type="text" name="search" class="form-control w-50" placeholder="🔍 Search movies...">
            </form>
        </div>

        <!-- Search + Add -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <input type="text" class="form-control w-50" id="searchInput" placeholder="🔍 Search movies...">
            <a href="{{ route('movies.create') }}" class="btn btn-outline-primary ms-3">➕ Add Movie</a>
        </div>

        <!-- Movie Grid -->
        <div class="row g-4" id="movieGrid">
            @forelse($movies as $movie)
                <div class="col-md-4 movie-item">
                    <div class="card h-100 shadow-sm border-0 movie-card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold text-primary">{{ $movie->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($movie->description, 100) }}</p>
                            <ul class="list-unstyled small">
                                <li><i class="bi bi-person-fill"></i> <strong>Author:</strong> {{ $movie->author }}</li>
                                <li><i class="bi bi-calendar-event"></i> <strong>Year:</strong> {{ $movie->release_year }}
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-outline-warning">✏️
                                Edit</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this movie?')">🗑️ Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <p>No movies found. Try adding one!</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $movies->links() }}
        </div>
    </div>

    <!-- Live Search Script -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            document.querySelectorAll('.movie-item').forEach(item => {
                const title = item.querySelector('.card-title').textContent.toLowerCase();
                item.style.display = title.includes(query) ? 'block' : 'none';
            });
        });
    </script>
@endsection
