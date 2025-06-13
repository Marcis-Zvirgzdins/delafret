<x-layout>
    <x-slot name="title">
        Delafret: Izveidot rakstu
    </x-slot>

    <div class="create-container-container mw14 p142 center">
        <div class="create-container ds center">
            <p class="wt font1 ct title ds2">Rediģēt rakstu</p>
            <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="Virsraksts" type="text" id="title" name="title" value="{{ $article->title }}s" required>
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="Autors" type="text" id="author" name="author" value="{{ $article->author }}" required>
                    @error('author')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="ds" id="thumbnail-preview">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}">
                </div>
                <div class="create-element-container">
                    <input class="ri font1 wt ds" placeholder="Sīkattēla apraksts" type="text" id="thumbnail_text" name="thumbnail_text" value="{{ $article->thumbnail_text }}">
                    @error('thumbnail_text')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <textarea class="ri rit font1 wt ds" placeholder="Raksta saturs" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="create-element-container">
                    <button class="font1 button ds button-create-article" type="submit">Apstiprināt izmaiņas</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/edit-article.js') }}"></script>
</x-layout>