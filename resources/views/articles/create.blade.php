<x-layout>
    <x-slot name="title">
        Delafret: Izveidot rakstu
    </x-slot>

    <div class="create-container-container mw14 p142 center">
        <div class="create-container ds center">
            <p class="wt font1 ct title ds2">Izveidot rakstu</p>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="Virsraksts" type="text" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="Autors" type="text" id="author" name="author" value="{{ old('author') }}" required>
                    @error('author')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="ds" id="thumbnail-preview">
                    <img class="ds2 blank-img" src="{{ asset('icons/add-photo-w-32.svg') }}" alt="Add image">
                </div>
                <div class="create-element-container">
                    <div>
                        <button type="button" class="font1 button ds button-create-article" id="custom-thumbnail-button">Augšupielādējiet sīkattēlu</button>
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" style="display: none;" required>
                    </div>
                    @error('thumbnail')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="Sīkattēla apraksts" type="text" id="thumbnail_text" name="thumbnail_text" value="{{ old('thumbnail_text') }}">
                    @error('thumbnail_text')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="ds create-element-container cat-container">
                    <label class="wt font1" for="category">Kategorija</label>
                    <select class="font1 wt" id="category" name="category" required>
                        <option value="games" {{ old('category') == 'games' ? 'selected' : '' }}>Games</option>
                        <option value="tech" {{ old('category') == 'tech' ? 'selected' : '' }}>Tech</option>
                        <option value="movies" {{ old('category') == 'movies' ? 'selected' : '' }}>Movies And TV</option>
                        <option value="entertainment" {{ old('category') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
                    </select>
                    @error('category')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="end-container"></div>
                </div>
                <div class="create-element-container">
                    <textarea class="ri rit font1 wt ds" placeholder="Raksta saturs" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <button class="font1 button ds button-create-article" type="submit">Izveidot rakstu</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/create-article.js') }}"></script>
</x-layout>