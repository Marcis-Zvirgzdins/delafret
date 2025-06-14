    <x-layout>
        @php
            $categoryDisplayNames = [
                'games' => 'Videospēles',
                'tech' => 'Tehnoloģija',
                'movies' => 'Filmas & TV',
                'entertainment' => 'Izklaides',
            ];
            $currentCategoryKey = strtolower($category);
            $displayCategoryName = $categoryDisplayNames[$currentCategoryKey] ?? ucfirst($category);
        @endphp
        <x-slot name="title">
            Delafret: {{ $displayCategoryName }}
        </x-slot>

        <div class="suggested-articles p142 mw14 center center16">
            <div class="category-container ds">
                @php
                    $categoryDisplayNames = [
                        'games' => 'Videospēles',
                        'tech' => 'Tehnoloģija',
                        'movies' => 'Filmas & TV',
                        'entertainment' => 'Izklaides',
                    ];
                @endphp
                <p class="font1 ct title ds" id="{{ strtolower($category) }}-cat-text">{{ $displayCategoryName }}</p>

                @if($articles->isEmpty())
                    <div class="no-articles ds">
                        <p class="font1 gt ct">Nav rakstu.</p>
                    </div>
                @else
                    <div class="cat-articles">
                        @foreach($articles as $article)
                            <div class="cat-article ds2">
                                <a href="{{ route('articles.show', $article->id) }}" class="image-container ds">
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="thumbnail">
                                </a>

                                <div class="article-information">
                                    <a class="article-title font1 wt" href="{{ route('articles.show', $article->id) }}">
                                        {{ $article->title }}
                                    </a>

                                    <div class="aditional-info transparent-color ds">
                                        <p class="font1 gt">Autors: {{ $article->author }}</p>
                                        @if($article->updated_at && $article->updated_at != $article->created_at)
                                            <p class="font1 gt">Atjaunināts: {{ $article->updated_at->format('M d, Y, H:i') }}</p>
                                        @else
                                            <p class="font1 gt">Publicēts: {{ $article->created_at ? $article->created_at->format('M d, Y, H:i') : 'No Date' }}</p>
                                        @endif
                                    </div>
                                </div>

                                @guest
                                    <a class="bookmark-container transparent ds" href="{{ route('login') }}">
                                        <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                                    </a>
                                @else
                                    @php
                                        $bookmarked = auth()->user()->bookmarks->contains('article_id', $article->id);
                                    @endphp

                                    <form method="POST" action="{{ route('bookmarks.toggle') }}">
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        
                                        <button type="submit" class="bookmark-container transparent ds" id="bookmark-button">
                                            <img src="{{ asset($bookmarked ? 'icons/bookmark-filled-w-32.svg' : 'icons/bookmark-w-32.svg') }}" alt="Bookmark">
                                        </button>
                                    </form>
                                @endif

                            </div>
                        @endforeach
                    </div>

                    {{ $articles->links() }}
                @endif
            </div>
        </div>
    </x-layout>