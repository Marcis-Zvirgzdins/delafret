<x-layout>
    <x-slot name="title">
        Delafret: {{ __('messages.create_article') }}
    </x-slot>

    <div class="create-container-container mw14 p142 center">
        <div class="create-container ds center">
            <p class="wt font1 ct title ds2">{{ __('messages.create_article') }}</p>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="lang-dropdown ds create-element-container cat-container">
                    <label class="wt font1" for="language">{{ __('messages.language') }}</label>
                    <select class="font1 wt" id="language" name="language" required>
                        <option value="lv" {{ old('language') == 'lv' ? 'selected' : '' }}>{{ __('messages.latvian') }}</option>
                        <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>{{ __('messages.english') }}</option>
                    </select>
                    <div class="end-container"></div>
                    @error('language')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{ __('messages.title') }}" type="text" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{ __('messages.author') }}" type="text" id="author" name="author" value="{{ old('author') }}" required>
                    @error('author')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="ds" id="thumbnail-preview">
                    <img class="ds2 blank-img" src="{{ asset('icons/add-photo-w-32.svg') }}" alt="Add image">
                </div>
                <div class="create-element-container">
                    <div>
                        <button type="button" class="font1 button ds button-create-article" id="custom-thumbnail-button">{{ __('messages.upload_thumbnail') }}</button>
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" style="display: none;" required>
                    </div>
                    @error('thumbnail')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{ __('messages.thumbnail_desc') }}" type="text" id="thumbnail_text" name="thumbnail_text" value="{{ old('thumbnail_text') }}">
                    @error('thumbnail_text')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="ds create-element-container cat-container">
                    <label class="wt font1" for="category">{{ __('messages.category') }}</label>
                    <select class="font1 wt" id="category" name="category" required>
                        <option value="games" {{ old('category') == 'games' ? 'selected' : '' }}>{{ __('messages.games') }}</option>
                        <option value="tech" {{ old('category') == 'tech' ? 'selected' : '' }}>{{ __('messages.tech') }}</option>
                        <option value="movies" {{ old('category') == 'movies' ? 'selected' : '' }}>{{ __('messages.movies') }}</option>
                        <option value="entertainment" {{ old('category') == 'entertainment' ? 'selected' : '' }}>{{ __('messages.entertainment') }}</option>
                    </select>
                    @error('category')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="end-container"></div>
                </div>
                <div class="create-element-container">
                    <textarea class="ri rit font1 wt ds" placeholder="{{ __('messages.article') }}" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <button class="font1 button ds button-create-article" type="submit">{{ __('messages.create_article') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/create-article.js') }}"></script>
</x-layout>