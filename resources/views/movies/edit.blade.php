@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">✏️ Edit Movie</h2>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf @method('PUT')
            @include('movies.form', ['movie' => $movie])
            <button type="submit" class="btn btn-primary">Update Movie</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
