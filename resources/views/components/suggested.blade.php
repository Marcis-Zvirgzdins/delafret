<div class="suggested-articles p142 mw14 center center16">
    <div class="suggested-main">
        @if($articles->isEmpty())
            <p class="wt ct">Nav raksti</p>
        @else
            @foreach($articles as $article)
                <div class="article-container wt">
                    <div class="article">
                        <a href="{{ route('articles.show', $article->id) }}">
                            <img class="thumbnail" src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="thumbnail">
                        </a>

                        <div class="overlay-container">
                            <a href="{{ route('articles.category', strtolower($article->category)) }}" class="cat-label ds wt font1 {{ strtolower($article->category) }}">{{ ucfirst($article->category) }}</a>
                            <a class="text" href="{{ route('articles.show', $article->id) }}">
                                <p class="wt font1 title ds2">{{ $article->title }}</p>
                                <p class="gt font1 date-author ds transparent">{{ $article->published_at ? $article->published_at->format('d.m.Y') : 'Not published' }}  •  {{ $article->author }}</p>
                            </a>
                        </div>
                        @guest
                            <a class="bookmark-container transparent ds" href="{{ route('login') }}">
                                <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                            </a>
                        @else
                            <a class="bookmark-container transparent ds">
                                <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>