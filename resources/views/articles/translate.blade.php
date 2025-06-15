<x-layout>
    <x-slot name="title">
        Delafret: {{__('messages.create_article')}}
    </x-slot>

    <div class="create-container-container translate-container-container mw14 p142 center">
        <div class="create-container ds center">
            <p class="wt font1 ct title ds2">{{__('messages.original_article')}}</p>
            <form>
                <div class="lang-dropdown ds create-element-container cat-container">
                    <label class="wt font1" for="category">{{__('messages.language')}}</label>
                    <select class="font1 wt" id="category" name="category" disabled>
                        <option value="latvian">{{__('messages.latvian')}}</option>
                    </select>
                    <div class="end-container"></div>
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{__('messages.title')}}" type="text" id="title" name="title" value="{{ $article->title }}" disabled>
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{__('messages.author')}}" type="text" id="author" name="author" value="{{ $article->author }}" disabled>
                </div>

                <div class="ds" id="thumbnail-preview">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}">
                </div>
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{__('messages.thumbnail_desc')}}" type="text" id="thumbnail_text" name="thumbnail_text" value="{{ $article->thumbnail_text }}" disabled>
                </div>
                <div class="create-element-container">
                    <textarea class="ri rit font1 wt ds" placeholder="{{__('messages.article')}}" id="content" name="content" rows="5" disabled>{{ $article->content }}</textarea>
                </div>
            </form>
        </div>

        <div class="create-container ds center">
            <p class="wt font1 ct title ds2">{{__('messages.article_translate')}}</p>
            <form>
            @csrf
                <div class="lang-dropdown ds create-element-container cat-container">
                    <label class="wt font1" for="category">{{__('messages.language')}}</label>
                    <select class="font1 wt" id="category" name="category" required>
                        <option value="english">{{__('messages.english')}}</option>
                    </select>
                    @error('category')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="end-container"></div>
                </div>
                
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{__('messages.title')}}" type="text" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{__('messages.author')}}" type="text" id="author" name="author" value="{{ old('author') }}" required>
                    @error('author')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="ds" id="thumbnail-preview">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}">
                </div>
                
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="{{__('messages.thumbnail_desc')}}" type="text" id="thumbnail_text" name="thumbnail_text" value="{{ old('thumbnail_text') }}">
                    @error('thumbnail_text')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="create-element-container">
                    <textarea class="ri rit font1 wt ds" placeholder="{{__('messages.article')}}" id="content2" name="content" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <button class="font1 button ds button-create-article" type="submit">{{__('messages.create_translate')}}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/translate-article.js') }}"></script>
</x-layout>