@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">➕ Add New Movie</h2>

        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            @include('movies.form')
            <button type="submit" class="btn btn-success">Save Movie</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
