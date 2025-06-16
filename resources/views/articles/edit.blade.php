<x-layout>
    <x-slot name="title">
        Delafret: {{__('messages.create_article')}}
    </x-slot>

    <div class="create-container-container mw14 p142 center">
        <div class="create-container ds center">
            <p class="wt font1 ct title ds2">{{ __('messages.edit_article') }}</p>
            <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="lang-dropdown ds create-element-container cat-container">
                    <label class="wt font1" for="language">{{ __('messages.language') }}</label>
                    <select class="font1 wt" id="language" name="language" required>
                        <option value="en" {{ $article->language === 'en' ? 'selected' : '' }}>{{ __('messages.english') }}</option>
                        <option value="lv" {{ $article->language === 'lv' ? 'selected' : '' }}>{{ __('messages.latvian') }}</option>
                    </select>
                    <div class="end-container"></div>
                </div>


                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{ __('messages.title') }}" type="text" id="title" name="title" value="{{ $article->title }}" required>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{ __('messages.author') }}" type="text" id="author" name="author" value="{{ $article->author }}" required>
                    @error('author')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="ds" id="thumbnail-preview">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}">
                </div>
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{ __('messages.thumbnail_desc') }}" type="text" id="thumbnail_text" name="thumbnail_text" value="{{ $article->thumbnail_text }}">
                    @error('thumbnail_text')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <textarea class="ri rit font1 wt ds" placeholder="{{ __('messages.article') }}" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <button class="font1 button ds button-create-article" type="submit">{{ __('messages.confirm_edit') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/edit-article.js') }}"></script>
</x-layout>