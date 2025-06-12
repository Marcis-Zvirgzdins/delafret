<x-layout>
    <x-slot name="title">
        Delafret: Izveidot rakstu
    </x-slot>

        <h1>Pagaidu veidlapa raksta izveidei</h1>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Thumbnail -->
        <div>
            <label for="thumbnail">Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" required>
            @error('thumbnail')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="games" {{ old('category') == 'games' ? 'selected' : '' }}>Games</option>
                <option value="tech" {{ old('category') == 'tech' ? 'selected' : '' }}>Tech</option>
                <option value="movies" {{ old('category') == 'movies' ? 'selected' : '' }}>Movies And TV</option>
                <option value="entertainment" {{ old('category') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
            </select>
            @error('category')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Author -->
        <div>
            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" required>
            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Create Article</button>
        </div>
    </form>
</x-layout>