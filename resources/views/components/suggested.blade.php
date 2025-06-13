<div class="suggested-articles p142 mw14 center center16">
    <div class="suggested-main">
        @if($articles->isEmpty())
            <p class="wt font1 ct no-articles">Nav raksti</p>
            <style>
                .suggested-main {
                    justify-content: center;
                    background-color: #3A3A3A;
                }
            </style>
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
                                <p class="gt font1 date-author ds transparent">{{ $article->created_at ? $article->created_at->format('d.m.Y') : 'No Date' }}  •  {{ $article->author }}</p>
                            </a>
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
                </div>
            @endforeach
        @endif
    </div>
</div>