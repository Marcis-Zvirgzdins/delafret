<x-layout>
    <x-slot name="title">
        Delafret: {{ $article->title }}
    </x-slot>

    <div class="mw14 center p142 article-container-container">
        <div class="article-container-main-container">
            <div class="article-container-main ds">
                <a href="{{ route('articles.category', strtolower($article->category)) }}" class="cat font1 {{ strtolower($article->category) }}-text">{{ ucfirst($article->category) }}</a>

                <p class="wt title font1 ds2">{{ $article->title }}</p>

                @guest
                    <a class="bookmark-container transparent ds" href="{{ route('login') }}">
                        <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                    </a>
                @else
                    <a class="bookmark-container transparent ds">
                        <img src="{{ asset('icons/bookmark-w-32.svg') }}" alt="Bookmark">
                    </a>
                @endif

                <div class="aditional-info transparent ds">
                    <p class="font1 gt">Autors: {{ $article->author }}</p>
                    @if($article->updated_at && $article->updated_at != $article->created_at)
                        <p class="font1 gt">Atjaunināts: {{ $article->updated_at->format('M d, Y, H:i') }}</p>
                    @else
                        <p class="font1 gt">Publicēts: {{ $article->created_at ? $article->created_at->format('M d, Y, H:i') : 'No Date' }}</p>
                    @endif
                </div>

                @if($article->thumbnail)
                <div class="banner-img">
                    <img class="ds" src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail for {{ $article->title }}" style="max-width: 100%; height: auto;">
                    @if(!empty($article->thumbnail_text))
                        <p class="gt font1 transparent ds">{{ $article->thumbnail_text }}</p>
                    @endif
                </div>
                @endif

                <div>
                    <p class="font1 wt ds2 nowrap article-contents">{{ $article->content }}</p>
                </div>
            </div>

        </div>
        <div class="side-container">
            @auth
                <div class="comment-sub-container ds">
                    <form action="{{ route('comments.store', $article->id) }}" method="POST">
                        @csrf
                        <div class="comments-profile">   
                            @if (auth()->user()->profile_picture)
                                <img class="ds" src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile">
                            @else
                                <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                            @endif
                            <span class="wt font1 ds2">{{ auth()->user()->username }}</span>
                            @if(auth()->user()->role === 'admin')
                                    <p class="admin-badge font1 wt ds">Admin</p>
                            @endif
                        </div>
                        <textarea class="font1 wt ds" id="content" name="content" rows="3" required></textarea>
                        <button class="button font1 ds" type="submit">Publicēt</button>
                    </form>
                </div>
            @else 
                <div class="register-container">
                </div>
            @endauth

            <div class="comment-container ds">
                <p class="font1 wtl ct comment-title">Komentāri</p>
                @if($article->comments->isEmpty())
                <div class="comment empty">
                    <p class="font1 gt ct">Nav komentāru.</p>
                </div>
                @else
                    @foreach($article->comments as $comment)
                        <div class="comment ds">
                            <div class="comment-profile">
                                @if($comment->user->profile_picture)
                                    <img class="ds" src="{{ asset('storage/' . $comment->user->profile_picture) }}" alt="Profile Picture">
                                @else
                                    <img class="ds" src="{{ asset('assets/user-icon-blank-512.png') }}" alt="Profile Picture">
                                @endif
                                <p class="font1 wt profile-name ds2">{{ $comment->user->username }}</p>
                                @if($comment->user->role === 'admin')
                                    <p class="admin-badge font1 wt ds">Admin</p>
                                @endif
                            </div>

                            <p class="font1 wt comment-main">{{ $comment->content }}</p>
                            <p class="font1 date gt pub-date-comment">{{ $article->created_at ? $article->created_at->format('M d, Y, H:i') : 'No Date' }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>