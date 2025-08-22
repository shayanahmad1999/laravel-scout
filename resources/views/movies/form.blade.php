<div class="form-floating mb-3">
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="titleInput"
        placeholder="Title" value="{{ old('title', $movie->title ?? '') }}" required>
    <label for="titleInput">🎬 Title</label>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="descInput"
        placeholder="Description" style="height: 120px;" required>{{ old('description', $movie->description ?? '') }}</textarea>
    <label for="descInput">📝 Description</label>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" id="authorInput"
        placeholder="Author" value="{{ old('author', $movie->author ?? '') }}" required>
    <label for="authorInput">👤 Author</label>
    @error('author')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-floating mb-4">
    <input type="number" name="release_year" class="form-control @error('release_year') is-invalid @enderror"
        id="yearInput" placeholder="Release Year" value="{{ old('release_year', $movie->release_year ?? '') }}"
        required>
    <label for="yearInput">📅 Release Year</label>
    @error('release_year')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
